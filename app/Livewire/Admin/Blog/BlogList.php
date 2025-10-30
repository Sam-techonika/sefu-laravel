<?php

namespace App\Livewire\Admin\Blog;

use App\Enums\LocaleType;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class BlogList extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $category_id = '';
    public $tag_id = '';
    public $locale = LocaleType::EN->value;
    public $categories;
    public $tags;
    public $users;
    public $is_active = true;

    public $isModalOpen = false;
    public $blogId = null;


    public $featured_image;
    public $author;
    public $selectedTags = [];
    public $nextBlogName;

    protected $paginationTheme = 'bootstrap';


    public function mount()
    {
        $this->users = User::all();
        $locale = LocaleType::EN->value;
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

        $this->setNextBlogName();
    }
    public function toggleStatus($blogId)
    {
        $blog = Blog::find($blogId);
        if ($blog) {
            $blog->is_active = !$blog->is_active;
            $blog->save();
        }
        $this->dispatch('success', $blog->is_active ? 'Blog Enabled!' : 'Blog Disabled!');
    }

    public function updating($field)
    {
        if (in_array($field, ['search', 'category_id', 'tag_id', 'locale'])) {
            $this->resetPage();
        }
    }

    public function setNextBlogName()
    {
        $lastBlog = Blog::withTrashed()->latest('id')->first();
        $number = $lastBlog ? ($lastBlog->id + 1) : 1;
        $this->nextBlogName = 'BlogPost ' . $number;
    }


    public function openModal()
    {

        $this->dispatch('openBlogForm');
    }


    public function closeModal()
    {
        $this->isModalOpen = false;
    }


    public function edit($id)
    {

        $this->dispatch('openBlogForm', $id);
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            $blog->delete();
            session()->flash('message', 'Blog "' . $blog->name . '" deleted successfully!', 'blogId');
            $this->is_active = true;
        }
        $this->dispatch('refreshBlogs');
    }


    public function resetForm()
    {

        $this->reset(['featured_image', 'author', 'selectedTags', 'category_id']);
        $this->is_active = true;
    }


    public function resetCreateForm()
    {

        $this->reset(['featured_image', 'author', 'selectedTags', 'category_id', 'blogId', 'nextBlogName']);
        $this->is_active = true;
    }

    #[On('refreshBlogs')]
    #[Layout('components.layouts.admin')]
    public function render()
    {

        $query = Blog::with([
            'tags.translations',
            'category.translations',
        ]);

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        if ($this->tag_id) {
            $query->whereHas('tags', fn($q) => $q->where('tags.id', $this->tag_id));
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $blogs = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('livewire.admin.blog.blog-list', [
            'blogs' => $blogs,
        ]);
    }
}
