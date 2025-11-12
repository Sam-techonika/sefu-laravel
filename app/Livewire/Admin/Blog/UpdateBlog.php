<?php

namespace App\Livewire\Admin\Blog;

use App\Enums\LocaleType;
use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Category;
use Livewire\Attributes\Layout;

class UpdateBlog extends Component
{
    public $blogId;
    public $locale = LocaleType::EN->value;
    public $title;
    public $slug;
    public $at_glance;
    public $main_content;
    public $key_takeaways;
    public $faqs = [];
    public $category_id;
    public $tags = '';
    public $meta_title = '';
    public $meta_description = '';
    public $meta_keywords = '';

    public $categories = [];
    public $blog;

    public function mount($id, $locale = null)
    {
        $this->blogId = $id;
        
        // Validate and set locale using enum
        if ($locale && in_array($locale, LocaleType::values())) {
            $this->locale = $locale;
        } else {
            $this->locale = LocaleType::EN->value;
        }
        
        $this->blog = Blog::with(['category', 'translations'])->findOrFail($this->blogId);
        
        $this->loadTranslationData();
        $this->loadLocaleData($this->locale);
        $this->ensureInitialization();
    }

    public function updatedTitle()
    {
        $this->slug = \Illuminate\Support\Str::slug($this->title);
    }
    
    private function loadTranslationData()
    {
        $translation = $this->blog->translations()->where('locale', $this->locale)->first();
        
        if ($translation) {
            $this->title = $translation->title;
            $this->slug = $translation->slug;
            $this->at_glance = $translation->at_glance;
            $this->key_takeaways = $translation->key_takeaways;
            $this->main_content = $this->convertMainContentToString($translation->main_content);
            $this->faqs = is_array($translation->faqs) ? $translation->faqs : [];
            $this->category_id = $translation->category_id;
            $this->tags = $translation->tags ?? '';
            $this->meta_title = $translation->meta_title ?? '';
            $this->meta_description = $translation->meta_description ?? '';
            $this->meta_keywords = $translation->meta_keywords ?? '';
        } else {
            $this->title = '';
            $this->slug = '';
            $this->at_glance = '';
            $this->key_takeaways = '';
            $this->main_content = '';
            $this->faqs = [];
            $this->category_id = null;
            $this->tags = '';
            $this->meta_title = '';
            $this->meta_description = '';
            $this->meta_keywords = '';
        }
    }
    
    private function ensureInitialization()
    {
        // Always ensure we have at least one FAQ
        if (empty($this->faqs) || count($this->faqs) === 0) {
            $this->faqs = [
                ['question' => '', 'answer' => '']
            ];
        }
    }

    public function addFaq()
    {
        if (!is_array($this->faqs)) {
            $this->faqs = [];
        }
        
        $this->faqs[] = ['question' => '', 'answer' => ''];
    }

    public function removeFaq($index)
    {
        if (isset($this->faqs[$index])) {
            unset($this->faqs[$index]);
            $this->faqs = array_values($this->faqs);
        }
        
        if (empty($this->faqs)) {
            $this->addFaq();
        }
    }

    public function updatedLocale($locale)
    {
        $this->loadTranslationData();
        $this->loadLocaleData($locale);
        $this->ensureInitialization();
    }
    
    /**
     * Convert main_content from array format to string format
     */
    private function convertMainContentToString($mainContent)
    {
        if (is_string($mainContent)) {
            return $mainContent;
        }
        
        if (is_array($mainContent)) {
            $html = '';
            foreach ($mainContent as $section) {
                if (is_array($section) && isset($section['title']) && isset($section['content'])) {
                    $title = trim($section['title']);
                    $content = trim($section['content']);
                    
                    if (!empty($title)) {
                        $html .= '<h2>' . htmlspecialchars($title) . '</h2>' . "\n";
                    }
                    if (!empty($content)) {
                        $html .= '<p>' . nl2br(htmlspecialchars($content)) . '</p>' . "\n";
                    }
                }
            }
            return $html;
        }
        
        return '';
    }

    private function loadLocaleData($locale)
    {
        $this->categories = Category::with('translations')->get()
            ->map(fn($category) => [
                'id' => $category->id,
                'name' => optional($category->translations->firstWhere('locale', $locale))->name ?? 'N/A'
            ])->toArray();
    }

    protected function rules()
    {
        return [
            'locale' => 'required|string|in:' . implode(',', LocaleType::values()),
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'at_glance' => 'nullable|string|max:1000',
            'main_content' => 'nullable|string',
            'key_takeaways' => 'nullable|string|max:5000',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:500',
            'faqs.*.answer' => 'nullable|string|max:2000',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|string|max:1000',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',
        ];
    }

    protected $messages = [
        'title.required' => 'Title is required.',
        'slug.required' => 'Slug is required.',
    ];

    public function save()
    {
        $this->validate();
        
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();
            
            // Clean FAQs (allow empty fields)
            $cleanFaqs = !empty($this->faqs) ? array_values($this->faqs) : [];
            
            // Prepare translation data
            $translationData = [
                'blog_id' => $this->blogId,
                'locale' => $this->locale,
                'slug' => $this->slug ?? '',
                'category_id' => $this->category_id,
                'title' => trim($this->title ?? ''),
                'at_glance' => !empty($this->at_glance) ? trim($this->at_glance) : null,
                'main_content' => !empty($this->main_content) ? trim($this->main_content) : null,
                'key_takeaways' => !empty($this->key_takeaways) ? trim($this->key_takeaways) : null,
                'faqs' => !empty($cleanFaqs) ? $cleanFaqs : null,
                'tags' => !empty($this->tags) ? trim($this->tags) : null,
                'meta_title' => !empty($this->meta_title) ? trim($this->meta_title) : null,
                'meta_description' => !empty($this->meta_description) ? trim($this->meta_description) : null,
                'meta_keywords' => !empty($this->meta_keywords) ? trim($this->meta_keywords) : null,
            ];
            
            // Update or create translation
            BlogTranslation::updateOrCreate(
                ['blog_id' => $this->blogId, 'locale' => $this->locale],
                $translationData
            );
            
            \Illuminate\Support\Facades\DB::commit();
            
            session()->flash('message', "Blog {$this->locale} translation updated successfully!");
            return redirect()->route('admin.blog.languages', $this->blogId);
            
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollback();
            session()->flash('error', 'An error occurred while saving the blog: ' . $e->getMessage());
        }
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.update-blog');
    }
}
