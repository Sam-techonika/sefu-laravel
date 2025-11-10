<?php

namespace App\Livewire\Admin\Blog;

use App\Enums\LocaleType;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class BlogForm extends Component
{
    use WithFileUploads;

    public $isModalOpen = false;
    public $blogId = null;

    public $nextBlogName;
    public $featured_image;
    public $existingFeaturedImage = null;
    public $author;
    public $category_id;
    public $is_active = true;
    public $description;

    public $users = [];
    public $categories = [];

    protected $rules = [
        'nextBlogName' => 'required|string|max:255',
        'author' => 'required|exists:users,id',
        'featured_image' => 'nullable|image|max:2048',
        'category_id' => 'nullable|exists:categories,id',
    ];

    #[On('openBlogForm')]
    public function open($id = null)
    {
        $this->resetValidation();
        $this->reset(['featured_image', 'existingFeaturedImage', 'author', 'category_id', 'nextBlogName']);
        $this->is_active = true;
        $this->blogId = null;

        if ($id) {
            $blog = Blog::find($id);
            if (!$blog) {
                session()->flash('error', 'Blog not found!');
                return;
            }

            $this->blogId = $blog->id;
            $this->author = $blog->author;
            $this->category_id = $blog->category_id;
            $this->is_active = $blog->is_active;
            $this->nextBlogName = $blog->name;
            $this->description = $blog->description;
            // keep the stored featured image path so we can preview it when editing
            $this->existingFeaturedImage = $blog->featured_image;
        } else {
            $this->setNextBlogName();
        }

        $this->isModalOpen = true;
        $this->dispatch('modal-opened');
    }

    public function mount()
    {
        $this->loadLists();
        $this->setNextBlogName();
    }

    public function loadLists()
    {
        $this->users = User::all();
        $locale = LocaleType::EN->value;

        $this->categories = Category::with('translations')->get()
            ->map(fn($category) => [
                'id' => $category->id,
                'name' => optional($category->translations->firstWhere('locale', $locale))->name ?? 'N/A'
            ])->toArray();
    }

    public function close()
    {
        $this->isModalOpen = false;
    }

    public function setNextBlogName()
    {
        $lastBlog = Blog::withTrashed()->latest('id')->first();
        $number = $lastBlog ? ($lastBlog->id + 1) : 1;
        $this->nextBlogName = 'BlogPost ' . $number;
    }

    public function saveBlog()
    {
        $this->validate();

        $data = [
            'name' => $this->nextBlogName,
            'author' => $this->author,
            'category_id' => $this->category_id,
            'is_active' => $this->is_active,
        ];

        if ($this->featured_image) {
            if ($this->blogId && $this->existingFeaturedImage) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($this->existingFeaturedImage);
            }
            
            $path = $this->featured_image->store('blog_images', 'public');
            $data['featured_image'] = $path;
        }

        if ($this->blogId) {
            $blog = Blog::findOrFail($this->blogId);
            $blog->update($data);
        } else {
            $blog = Blog::create($data);
        }

        $this->dispatch('refreshBlogs');
        $this->isModalOpen = false;

        $this->dispatch('success', $this->blogId ? 'Blog updated successfully!' : 'Blog created successfully!');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.blog-form');
    }
}
