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

    protected $queryString = [
        'selectedTag' => ['except' => null, 'as' => 'tag'],
        'selectedCategory' => ['except' => null, 'as' => 'category'],
    ];
   
    public function render()
    {
        $locale = app()->getLocale() ?? LocaleType::EN->value;

        $query = BlogModel::where('is_active', true)
            ->with(['translations' => function($q) use ($locale) {
                $q->where('locale', $locale)->with('category.translations');
            }, 'user']);

        // Filter by tag if selected (using tag name)
        if ($this->selectedTag) {
            $query->whereHas('tags', function($q) use ($locale) {
                $q->whereHas('translations', function($tq) use ($locale) {
                    $tq->where('locale', $locale)
                       ->where('name', $this->selectedTag);
                });
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

        return view('livewire.public.blog', compact('blogs'));
    }

    #[Title('Blogs')]
    public function getTitle()
    {
        return 'Blogs';
    }
}
