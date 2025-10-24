<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Attributes\Layout;

class AddBlog extends Component
{
    public $locale = 'en';
    public $category_id;
    public $title = [];
    public $featured_image;
    public $at_glance = [];
    public $introduction = [];
    public $main_content = [];
    public $key_takeaways = [];
    public $faqs = [];
    public $author = [];
    public $selectedTags = [];

    public $categories = [];
    public $tags = [];

    public function mount()
    {
        $this->loadLocaleData($this->locale);
    }

    public function updatedLocale($locale)
    {
        $this->loadLocaleData($locale);
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

    protected $rules = [
        'locale' => 'required|string|size:2',
        'category_id' => 'nullable|exists:categories,id',
        'title' => 'required|array',
        'featured_image' => 'nullable|string',
        'at_glance' => 'nullable|array',
        'introduction' => 'nullable|array',
        'main_content' => 'nullable|array',
        'key_takeaways' => 'nullable|array',
        'faqs' => 'nullable|array',
        'author' => 'nullable|array',
        'selectedTags' => 'nullable|array',
    ];

    public function save()
    {
        $this->validate();

        $blog = Blog::create([
            'locale' => $this->locale,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'featured_image' => $this->featured_image,
            'at_glance' => $this->at_glance,
            'introduction' => $this->introduction,
            'main_content' => $this->main_content,
            'key_takeaways' => $this->key_takeaways,
            'faqs' => $this->faqs,
            'author' => $this->author,
        ]);

        if (!empty($this->selectedTags)) {
            $blog->tags()->sync($this->selectedTags);
        }

        session()->flash('message', 'Blog created successfully!');
        return redirect()->route('admin.blog.list');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.add-blog');
    }
}
