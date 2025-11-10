<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog as BlogModel;
use App\Models\Tag;
use App\Models\Category;
use App\Enums\LocaleType;

class Blog extends Component
{
    use WithPagination;

    public $perPage = 9; 
    public $selectedTag = null;
    public $selectedCategory = null;
    public $availableTags = [];

    protected $queryString = [
        'selectedTag' => ['except' => null, 'as' => 'tag'],
        'selectedCategory' => ['except' => null, 'as' => 'category'],
    ];

    public function mount()
    {
        // Initialize from query parameters
        $this->selectedTag = request()->get('tag');
        $this->selectedCategory = request()->get('category');
    }
   
    public function render()
    {
        $locale = app()->getLocale() ?? LocaleType::EN->value;

        $query = BlogModel::where('is_active', true)
            ->with(['translations' => function($q) use ($locale) {
                $q->where('locale', $locale)->with('category.translations');
            }, 'user']);

        // Filter by tag if selected (using tags from blog_translations)
        if ($this->selectedTag) {
            $tagToSearch = trim($this->selectedTag);
            $query->whereHas('translations', function($q) use ($locale, $tagToSearch) {
                $q->where('locale', $locale)
                  ->where('tags', 'LIKE', '%' . $tagToSearch . '%');
            });
        }

        // Filter by category if selected (using category slug/name)
        if ($this->selectedCategory) {
            $query->whereHas('category', function($q) use ($locale) {
                $q->whereHas('translations', function($cq) use ($locale) {
                    $cq->where('locale', $locale)
                       ->where('slug', $this->selectedCategory);
                });
            });
        }

        $blogs = $query->latest()->paginate($this->perPage);

        // Get available tags for filter
        $this->loadAvailableTags($locale);

        return view('livewire.public.blog', compact('blogs'));
    }

    /**
     * Load available tags from blog_translations for filtering
     */
    protected function loadAvailableTags($locale)
    {
        $translations = \App\Models\BlogTranslation::where('locale', $locale)
            ->whereNotNull('tags')
            ->where('tags', '!=', '')
            ->whereHas('blog', function($q) {
                $q->where('is_active', true)->whereNull('deleted_at');
            })
            ->pluck('tags');
            
        $allTags = [];
        foreach ($translations as $tagString) {
            if (!empty($tagString)) {
                $tags = array_map('trim', explode(',', $tagString));
                $allTags = array_merge($allTags, $tags);
            }
        }
        
        // Get unique tags with counts
        $tagCounts = array_count_values($allTags);
        $this->availableTags = [];
        foreach ($tagCounts as $name => $count) {
            if (!empty($name)) {
                $this->availableTags[] = [
                    'name' => $name,
                    'count' => $count
                ];
            }
        }
        
        // Sort by name
        usort($this->availableTags, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
    }
    
    /**
     * Clear tag filter
     */
    public function clearTagFilter()
    {
        $this->selectedTag = null;
        $this->resetPage(); // Reset pagination when clearing filter
        
        // Optionally redirect to clean URL without query parameters
        return redirect()->route('blogs', app()->getLocale());
    }
    
    /**
     * Set tag filter
     */
    public function setTagFilter($tag)
    {
        $this->selectedTag = $tag;
        $this->resetPage(); // Reset pagination when setting new filter
    }

    #[Title('Blogs')]
    public function getTitle()
    {
        return 'Blogs';
    }
}
