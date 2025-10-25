<?php

namespace App\Livewire\Admin\Blog;

use App\Models\BlogTranslation;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BlogLangList extends Component
{
    public $blogId;
    public $blogTranslations;
    public $categories;

    public function mount($id)
    {
        $this->blogId = $id;
        $this->loadBlogTranslations();
        $this->loadCategories();
    }

    public function loadBlogTranslations()
    {
        $translations = BlogTranslation::with(['blog.user', 'category.translations'])
            ->where('blog_id', $this->blogId)
            ->whereIn('locale', ['en', 'hi'])
            ->get();
            
        $this->blogTranslations = $translations->groupBy('locale')->map(function ($group) {
            return $group->map(function ($translation) {
                return [
                    'id' => $translation->id,
                    'blog_id' => $translation->blog_id,
                    'locale' => $translation->locale,
                    'slug' => $translation->slug,
                    'category_id' => $translation->category_id,
                    'title' => $translation->title,
                    'at_glance' => $translation->at_glance,
                    'introduction' => $translation->introduction,
                    'main_content' => $translation->main_content,
                    'key_takeaways' => $translation->key_takeaways,
                    'faqs' => $translation->faqs,
                    'created_at' => $translation->created_at,
                    'updated_at' => $translation->updated_at,
                    'blog' => [
                        'id' => $translation->blog->id,
                        'name' => $translation->blog->name,
                        'featured_image' => $translation->blog->featured_image,
                        'user' => $translation->blog->user ? [
                            'id' => $translation->blog->user->id,
                            'name' => $translation->blog->user->name,
                            'email' => $translation->blog->user->email,
                        ] : null
                    ],
                    'category' => $translation->category ? [
                        'id' => $translation->category->id,
                        'translations' => $translation->category->translations->map(function ($trans) {
                            return [
                                'locale' => $trans->locale,
                                'name' => $trans->name
                            ];
                        })->toArray()
                    ] : null
                ];
            })->toArray();
        })->toArray();
    }

    public function loadCategories()
    {
        $this->categories = Category::with('translations')
            ->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'en' => $category->translations->where('locale', 'en')->first()?->name ?? 'No English name',
                    'hi' => $category->translations->where('locale', 'hi')->first()?->name ?? 'No Hindi name',
                ];
            });
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.blog-lang-list');
    }
}
