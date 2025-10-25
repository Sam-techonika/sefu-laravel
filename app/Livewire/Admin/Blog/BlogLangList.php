<?php

namespace App\Livewire\Admin\Blog;

use App\Enums\LocaleType;
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
        $this->blogTranslations = BlogTranslation::with(['blog.user', 'category.translations'])
            ->where('blog_id', $this->blogId)
            ->whereIn('locale', LocaleType::values())
            ->get()
            ->keyBy('locale');
    }

    public function loadCategories()
    {
        $this->categories = Category::with('translations')->get();
    }

    public function getLocales()
    {
        return LocaleType::cases();
    }

    public function getLocaleDisplayName($locale)
    {
        $localeEnum = LocaleType::fromValue($locale);
        return $localeEnum ? $localeEnum->getDisplayName() : $locale;
    }

    public function getLocaleFlagCode($locale)
    {
        $localeEnum = LocaleType::fromValue($locale);
        return $localeEnum ? $localeEnum->getFlagCode() : 'us';
    }

    public function getTotalLocalesCount()
    {
        return count(LocaleType::cases());
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.blog-lang-list');
    }
}
