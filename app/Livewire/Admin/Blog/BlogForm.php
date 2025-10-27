<?php

namespace App\Livewire\Admin\Blog;

use App\Enums\LocaleType;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;

class BlogForm extends Component
{
    use WithFileUploads;

    public $isModalOpen = false;
    public $blogId = null;

    public $nextBlogName;
    public $featured_image;
    public $author;
    public $selectedTags = [];
    public $category_id;
    public $is_active = true;

    public $users = [];
    public $tags = [];
    public $categories = [];

    protected $rules = [
        'nextBlogName' => 'required|string|max:255',
        'author' => 'required|exists:users,id',
        'featured_image' => 'nullable|image|max:2048',
        'selectedTags' => 'nullable|array',
        'selectedTags.*' => 'exists:tags,id',
        'category_id' => 'nullable|exists:categories,id',
    ];

    protected $messages = [
        'nextBlogName.required' => 'Please enter a blog title.',
        'nextBlogName.max' => 'Blog title must not exceed 255 characters.',
        'author.required' => 'Please select an author for the blog.',
        'author.exists' => 'The selected author does not exist.',
        'featured_image.image' => 'The featured file must be an image.',
        'featured_image.max' => 'The featured image must not exceed 2MB.',
        'selectedTags.array' => 'Tags selection is invalid.',
        'selectedTags.*.exists' => 'One or more selected tags do not exist.',
    ];

    protected $listeners = [
        'openBlogForm' => 'open',
    ];

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

        $this->tags = Tag::with('translations')->get()
            ->map(fn($tag) => [
                'id' => $tag->id,
                'name' => optional($tag->translations->firstWhere('locale', $locale))->name ?? 'N/A'
            ])->toArray();
    }

    public function open($id = null)
    {
        $this->resetValidation();
        $this->reset(['featured_image', 'author', 'selectedTags', 'category_id', 'nextBlogName']);
        $this->is_active = true;

        if ($id) {
            $blog = Blog::with('tags')->find($id);
            if (!$blog) {
                session()->flash('error', 'Blog not found!');
                return;
            }
            $this->blogId = $blog->id;
            $this->author = $blog->author;
            $this->category_id = $blog->category_id;
            $this->is_active = $blog->is_active;
            $this->selectedTags = $blog->tags->pluck('id')->toArray();
            $this->nextBlogName = $blog->name;
        } else {
            $this->blogId = null;
            $this->setNextBlogName();
        }

        $this->isModalOpen = true;
    }

    public function close()
    {
        $this->isModalOpen = false;
    }

    // Set next auto-generated blog name
    public function setNextBlogName()
    {
        $lastBlog = Blog::withTrashed()->latest('id')->first();
        $number = $lastBlog ? ($lastBlog->id + 1) : 1;
        $this->nextBlogName = 'BlogPost ' . $number;
    }

    public function saveBlog()
    {
        $this->validate();

        $path = null;
        if ($this->featured_image) {
            $path = $this->featured_image->store('blogs', 'public');
        }

        if ($this->blogId) {
            $blog = Blog::find($this->blogId);
            $blog->update([
                'name' => $this->nextBlogName,
                'author' => $this->author,
                'category_id' => $this->category_id,
                'is_active' => $this->is_active,
            ]);

            if ($path) {
                $blog->update(['featured_image' => $path]);
            }

            $message = 'Blog "' . $blog->name . '" updated successfully!';
        } else {
            $blog = Blog::create([
                'name' => $this->nextBlogName,
                'featured_image' => $path,
                'author' => $this->author,
                'category_id' => $this->category_id,
                'is_active' => $this->is_active,
            ]);

            $message = 'Blog "' . $blog->name . '" added successfully!';
        }

            $tags = is_array($this->selectedTags) ? array_map(fn($t) => (int) $t, $this->selectedTags) : [];
            try {
                BlogTag::where('blog_id', $blog->id)->delete();

                foreach ($tags as $tagId) {
                    if ($tagId) {
                        BlogTag::create([
                            'blog_id' => $blog->id,
                            'tag_id' => $tagId,
                        ]);
                    }
                }
            } catch (\Exception $e) {
                Log::error('Failed to save blog tags via BlogTag model', ['blog_id' => $blog->id ?? null, 'tags' => $tags, 'error' => $e->getMessage()]);
                session()->flash('error', 'Failed to save tags. Check logs for details.');
        }

        $this->close();
        $this->dispatch('refreshBlogs');
        session()->flash('message', $message);
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.blog-form');
    }
}
