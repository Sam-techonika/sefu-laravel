<?php

namespace App\Livewire\Admin\Blog;

use App\Enums\LocaleType;
use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Attributes\Layout;

class UpdateBlog extends Component
{
    public $blogId;
    public $locale = LocaleType::EN->value;
    public $category_id;
    public $title = [];
    public $at_glance = [];
    public $introduction = [];
    public $main_content = [];
    public $key_takeaways = [];
    public $faqs = [];
    public $selectedTags = [];

    public $categories = [];
    public $tags = [];
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
        
        $this->loadBlogData();
        $this->initializeFaqs();
        $this->loadLocaleData($this->locale);
    }

    private function initializeFaqs()
    {
        if (empty($this->faqs[$this->locale])) {
            $this->faqs[$this->locale] = [
                ['question' => '', 'answer' => '']
            ];
        }
    }

    public function addFaq()
    {
        if (!isset($this->faqs[$this->locale])) {
            $this->faqs[$this->locale] = [];
        }
        $this->faqs[$this->locale][] = ['question' => '', 'answer' => ''];
    }

    public function removeFaq($index)
    {
        if (isset($this->faqs[$this->locale][$index])) {
            unset($this->faqs[$this->locale][$index]);
            $this->faqs[$this->locale] = array_values($this->faqs[$this->locale]);
        }
        
        if (empty($this->faqs[$this->locale])) {
            $this->addFaq();
        }
    }

    private function loadBlogData()
    {
        $this->blog = Blog::with(['tags', 'translations'])->findOrFail($this->blogId);
        $this->selectedTags = $this->blog->tags->pluck('id')->toArray();
        
        // Load translation for the specific locale from route
        $translation = $this->blog->translations->where('locale', $this->locale)->first();
        
        if ($translation) {
            $this->title[$this->locale] = $translation->title;
            $this->at_glance[$this->locale] = $translation->at_glance;
            $this->introduction[$this->locale] = $translation->introduction;
            $this->main_content[$this->locale] = $translation->main_content;
            $this->key_takeaways[$this->locale] = $translation->key_takeaways;
            $this->faqs[$this->locale] = json_decode($translation->faqs, true) ?? [['question' => '', 'answer' => '']];
            $this->category_id = $translation->category_id;
        } else {
            // Initialize empty data for new translation
            $this->title[$this->locale] = '';
            $this->at_glance[$this->locale] = '';
            $this->introduction[$this->locale] = '';
            $this->main_content[$this->locale] = '';
            $this->key_takeaways[$this->locale] = '';
            $this->faqs[$this->locale] = [['question' => '', 'answer' => '']];
            $this->category_id = null;
        }
    }

    private function loadLocaleData($locale)
    {
        $this->categories = Category::with('translations')->get()
            ->map(fn($category) => [
                'id' => $category->id,
                'name' => optional($category->translations->firstWhere('locale', $locale))->name ?? 'N/A'
            ])->toArray();

        $this->tags = Tag::with('translations')->get()
            ->map(fn($tag) => [
                'id' => $tag->id,
                'name' => optional($tag->translations->firstWhere('locale', $locale))->name ?? 'N/A'
            ])->toArray();
    }

    protected function rules()
    {
        return [
            'locale' => 'required|string|in:' . implode(',', LocaleType::values()),
            'category_id' => 'nullable|exists:categories,id',
            'title.*' => 'required|string|max:255',
            'at_glance.*' => 'nullable|string',
            'introduction.*' => 'nullable|string',
            'main_content.*' => 'nullable|string',
            'key_takeaways.*' => 'nullable|string',
            'faqs.*' => 'nullable|array',
            'faqs.*.*.question' => 'nullable|string',
            'faqs.*.*.answer' => 'nullable|string',
            'selectedTags' => 'nullable|array',
            'selectedTags.*' => 'exists:tags,id',
        ];
    }

    public function save()
    {
        $this->validate();

        // Update/Create translation for the specific locale
        $translationData = [
            'blog_id' => $this->blogId,
            'locale' => $this->locale,
            'slug' => \Illuminate\Support\Str::slug($this->title[$this->locale] ?? ''),
            'category_id' => $this->category_id,
            'title' => $this->title[$this->locale] ?? '',
            'at_glance' => $this->at_glance[$this->locale] ?? null,
            'introduction' => $this->introduction[$this->locale] ?? null,
            'main_content' => !empty($this->main_content[$this->locale]) ? json_encode($this->main_content[$this->locale]) : null,
            'key_takeaways' => $this->key_takeaways[$this->locale] ?? null,
            'faqs' => !empty($this->faqs[$this->locale]) ? json_encode(array_filter($this->faqs[$this->locale], function($faq) {
                return !empty($faq['question']) || !empty($faq['answer']);
            })) : null,
        ];

        BlogTranslation::updateOrCreate(
            [
                'blog_id' => $this->blogId,
                'locale' => $this->locale
            ],
            $translationData
        );

        // Sync tags (only if tags are provided, otherwise keep existing)
        if (!empty($this->selectedTags)) {
            $this->blog->tags()->sync($this->selectedTags);
        }

        session()->flash('message', "Blog {$this->locale} translation updated successfully!");
        return redirect()->route('admin.blog.languages', $this->blogId);
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.update-blog');
    }
}
