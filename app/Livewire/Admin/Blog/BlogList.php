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

    protected $rules = [
        'nextBlogName' => 'required|string|max:255',
        'author' => 'required|exists:users,id',
        'featured_image' => 'nullable|image|max:2048',
        'selectedTags' => 'required|array',
        'selectedTags.*' => 'exists:tags,id',
    ];

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

    // Set next auto-generated blog name
    public function setNextBlogName()
    {
        $lastBlog = Blog::withTrashed()->latest('id')->first();
        $number = $lastBlog ? ($lastBlog->id + 1) : 1;
        $this->nextBlogName = 'BlogPost ' . $number;
    }

    // Open Modal
    public function openModal()
    {
        $this->resetForm();
        $this->setNextBlogName();
        $this->isModalOpen = true;
    }

    // Close Modal
    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    // Save Blog (Create or Update)
    public function saveBlog()
    {
        $this->validate();

        $path = null;
        if ($this->featured_image) {
            $path = $this->featured_image->store('blogs', 'public');
        }

        if ($this->blogId) {
            // Update existing blog
            $blog = Blog::find($this->blogId);
            $blog->update([
                'name' => $this->nextBlogName,
                'author' => $this->author,
                'category_id' => $this->category_id,
                'is_active' => $this->is_active,
            ]);
            
            // Update featured image only if new one is uploaded
            if ($path) {
                $blog->update(['featured_image' => $path]);
            }
            
            $this->dispatch('refreshBlogs');

            $message = 'Blog "' . $blog->name . '" updated successfully!';
        } else {
            // Create new blog
            $blog = Blog::create([
                'name' => $this->nextBlogName,
                'featured_image' => $path,
                'author' => $this->author,
                'category_id' => $this->category_id,
                'is_active' => $this->is_active,
            ]);

            $this->dispatch('refreshBlogs');

            $message = 'Blog "' . $blog->name . '" added successfully!';
        }

        // Sync tags (works for both create and update)
        if (!empty($this->selectedTags)) {
            $blog->tags()->sync($this->selectedTags);
        } else {
            $blog->tags()->detach();
        }

        $this->closeModal();
        $this->dispatch('refreshBlogs');
        session()->flash('message', $message);
    }

    // Edit Blog
    public function edit($id)
    {
        $blog = Blog::with('tags')->find($id);
        if (!$blog) {
            session()->flash('error', 'Blog not found!');
            return;
        }

        $this->resetForm();
        $this->blogId = $blog->id;
        $this->author = $blog->author;
        $this->category_id = $blog->category_id;
        $this->is_active = $blog->is_active;
        $this->selectedTags = $blog->tags->pluck('id')->toArray();
        $this->nextBlogName = $blog->name;
        $this->isModalOpen = true;
    }

    // Delete Blog
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

    // Reset form
    public function resetForm()
    {
        $this->reset(['featured_image', 'author', 'selectedTags', 'category_id', 'blogId']);
        $this->is_active = true;
    }

    #[On('refreshBlogs')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Blog::with([
            'tags',
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
