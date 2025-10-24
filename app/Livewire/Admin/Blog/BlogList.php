<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Attributes\Layout;

class BlogList extends Component
{
    use WithPagination;

    public $search = '';
    public $category_id = '';
    public $tag_id = '';
    public $locale = '';

    public $categories;
    public $tags;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategoryId()
    {
        $this->resetPage();
    }

    public function updatingTagId()
    {
        $this->resetPage();
    }

    public function updatingLocale()
    {
        $this->resetPage();
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Blog::query();

        if ($this->search) {
            $query->whereJsonContains('title->'.$this->locale, $this->search);
        }

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        if ($this->tag_id) {
            $query->whereHas('tags', function($q) {
                $q->where('tags.id', $this->tag_id);
            });
        }

        if ($this->locale) {
            $query->where('locale', $this->locale);
        }

        $blogs = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.admin.blog.blog-list', [
            'blogs' => $blogs
        ]);
    }
}
