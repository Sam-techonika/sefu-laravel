<?php

namespace App\Livewire\Public;

use App\Models\BlogTranslation;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Blog;
use Livewire\Component;

class BlogView extends Component
{

    public $blogTitle = '5 Common Trademark Filing Mistakes in India - and How to Avoid Them';
    public $authorName = 'John Smith';
    public $authorTitle = 'Partner at Example Legal';
    public $authorBio = 'John has over 13 years of experience in intellectual property law, helping startups and established businesses protect their brands.';
    public $authorPhone = '+91-1234567880';
    public $authorImage;
    public $publishDate;
    public $category = 'Business Guide';
    public $featuredImage;


    public $atGlanceContent = '<p>At a glance not found</p>';

    public $introductionContent = '<p>Introduction about trademark identity, whether mistaken is priceful or protecting brand identity. Trademark registration is a crucial step for businesses to protect their brand identity and prevent unauthorized use by competitors.</p>';

    public $mainContent = '
        <h2>1. Choosing a Weak Name</h2>
        <p>No content available.</p>

    ';

    public $keyTakeawaysContent = '<p><strong>No key takeaways available.</strong></p>';

    public $quoteText = 'A brand for company is like reputation for a person. You earn reputation trying to do hard things well.';


    public $faq1Question = 'How long does a trademark registration take?';
    public $faq1Answer = 'The trademark registration process in India typically takes 18-24 months, depending on objections and the workload of the trademark office.';

    public $faq2Question = 'Can I file a trademark on my own?';
    public $faq2Answer = 'Yes, you can file a trademark application on your own, but it\'s recommended to consult with a trademark attorney to avoid common mistakes and ensure proper protection.';

    public $faq3Question = 'What if my application is opposed?';
    public $faq3Answer = 'If your trademark application is opposed, you will need to file a counter-statement and may need to attend hearings. Legal assistance is highly recommended in such cases.';

    public $faq4Question = 'How long does a trademark last?';
    public $faq4Answer = 'A registered trademark in India is valid for 10 years from the date of application and can be renewed indefinitely for successive 10-year periods.';

    public $faq5Question = 'What classes should I register my trademark in?';
    public $faq5Answer = 'Choose classes based on your business activities. For example, Class 25 for clothing, Class 35 for retail services, etc. Consult an expert for proper class selection.';

    public $faq6Question = 'Can I trademark a logo?';
    public $faq6Answer = 'Yes, logos can be registered as device marks or combination marks. Ensure your logo is distinctive and not similar to existing trademarks.';

    // dynamic FAQs array (normalized from DB)
    public $faqs = [];
    
    // Categories and Tags for sidebar
    public $categories = [];
    public $tags = [];
    public $recentBlogs = [];
    public $currentBlogId = null;
    
    public $search = '';
    public $searchResults = [];
    public $showDropdown = false;

    public function mount($slug = null)
    {
        $locale = app()->getLocale() ?? abort(404);

        $this->loadCategories($locale);
        
        $this->loadRecentBlogs($locale);

        if ($slug) {

            $translation = BlogTranslation::where('slug', $slug)
                ->with(['blog.user', 'blog.tags.translations', 'category.translations'])
                ->firstOrFail();

            if ($locale !== $translation->locale) {
                $translation = BlogTranslation::where('blog_id', $translation->blog_id)
                    ->where('locale', $locale)
                    ->first();
                if (!$translation) {
                    return abort(404);
                } else {
                    return redirect()->route('blog.view', ['slug' => $translation->slug, 'locale' => $locale]);
                }
            }

            $this->currentBlogId = $translation->blog_id;
            
            $this->loadBlogTags($translation->blog, $locale);

            $this->blogTitle = $translation->title ?? $this->blogTitle;
            $this->featuredImage = $translation->blog->featured_image ?? $this->featuredImage;
            $this->publishDate = optional($translation->created_at)->format('F d, Y') ?? $this->publishDate;

            $this->atGlanceContent = $translation->at_glance ?? $this->atGlanceContent;
            $this->introductionContent = $translation->introduction ?? $this->introductionContent;
            $this->keyTakeawaysContent = $translation->key_takeaways ?? $this->keyTakeawaysContent;

            $rawMain = $translation->main_content ?? $this->mainContent;
            $this->mainContent = $this->normalizeMainContent($rawMain);

            $rawFaqs = $translation->faqs ?? [];
            $this->faqs = $this->normalizeFaqs($rawFaqs);

            if ($translation->category) {
                $catTitle = $translation->category->translations()->where('locale', $translation->locale)->value('name')
                    ?? $translation->category->translations()->value('name');
                $this->category = $catTitle ?? $this->category;
            }

            if (!empty($translation->blog) && !empty($translation->blog->user)) {
                $user = $translation->blog->user;
                $this->authorName = $user->name ?? $this->authorName;
                $this->authorTitle = $user->about ?? $this->authorTitle;
                $this->authorBio = $user->description ?? $this->authorBio;
                $this->authorPhone = $user->phone ?? $this->authorPhone;
                $this->authorImage = $user->profile_photo_path ?? $this->authorImage;
            }
        }

        if (!$this->publishDate) {
            $this->publishDate = now()->format('F d, Y');
        }
    }
    
    /**
     * Load categories with localized names and blog counts
     */
    protected function loadCategories($locale)
    {
        $categories = Category::whereHas('translations', function ($query) use ($locale) {
            $query->where('locale', $locale);
        })
        ->with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])
        ->withCount(['blogs' => function ($query) {
            $query->where('is_active', true)
                ->whereNull('deleted_at');
        }])
        ->get();
        
        $this->categories = $categories->map(function ($category) use ($locale) {
            $translation = $category->translations->where('locale', $locale)->first();
            return [
                'id' => $category->id,
                'name' => $translation->name ?? 'N/A',
                'slug' => $translation->slug ?? null,
                'count' => $category->blogs_count ?? 0,
            ];
        })->filter(function ($cat) {
            return $cat['count'] > 0; // Only show categories with blogs
        })->values()->toArray();
    }
    
    /**
     * Load tags specific to the current blog post
     */
    protected function loadBlogTags($blog, $locale)
    {
        if (!$blog || !$blog->tags) {
            $this->tags = [];
            return;
        }
        
        $this->tags = $blog->tags->map(function ($tag) use ($locale) {
            $translation = $tag->translations->where('locale', $locale)->first();
            $name = $translation->name ?? null;
            
            if (!$name) {
                return null;
            }
            
            return [
                'id' => $tag->id,
                'name' => $name,
            ];
        })->filter()->values()->toArray();
    }
    
    /**
     * Load tags with localized names and blog counts
     */
    protected function loadTags($locale)
    {
        $tags = Tag::whereHas('translations', function ($query) use ($locale) {
            $query->where('locale', $locale);
        })
        ->with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])
        ->withCount(['blogs' => function ($query) {
            $query->where('blogs.is_active', true)
                ->whereNull('blogs.deleted_at');
        }])
        ->get();
        
        $this->tags = $tags->map(function ($tag) use ($locale) {
            $translation = $tag->translations->where('locale', $locale)->first();
            return [
                'id' => $tag->id,
                'name' => $translation->name ?? 'N/A',
                'slug' => $translation->slug ?? null,
                'count' => $tag->blogs_count ?? 0,
            ];
        })->filter(function ($tag) {
            return $tag['count'] > 0; // Only show tags with blogs
        })->values()->toArray();
    }
    
    /**
     * Load recent blogs with translations
     */
    protected function loadRecentBlogs($locale)
    {
        $this->recentBlogs = Blog::where('is_active', true)
            ->whereHas('translations', function ($query) use ($locale) {
                $query->where('locale', $locale);
            })
            ->with(['translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($blog) use ($locale) {
                $translation = $blog->translations->where('locale', $locale)->first();
                return [
                    'id' => $blog->id,
                    'title' => $translation->title ?? 'Blog Title',
                    'slug' => $translation->slug ?? null,
                    'created_at' => $blog->created_at,
                ];
            })->toArray();
    }
    
    /**
     * Update search results when user types
     */
    public function updatedSearch()
    {
        if (strlen($this->search) >= 2) {
            $locale = app()->getLocale();
            
            $this->searchResults = BlogTranslation::where('locale', $locale)
                ->where(function($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('introduction', 'like', '%' . $this->search . '%');
                })
                ->whereHas('blog', function($q) {
                    $q->where('is_active', true);
                })
                ->with('blog')
                ->limit(5)
                ->get()
                ->map(function($translation) {
                    return [
                        'title' => $translation->title,
                        'slug' => $translation->slug,
                        'introduction' => \Illuminate\Support\Str::limit(strip_tags($translation->introduction ?? ''), 80),
                    ];
                })
                ->toArray();
                
            $this->showDropdown = true;
        } else {
            $this->searchResults = [];
            $this->showDropdown = false;
        }
    }
    
    /**
     * Clear search
     */
    public function clearSearch()
    {
        $this->search = '';
        $this->searchResults = [];
        $this->showDropdown = false;
    }

    /**
     * Normalize main content which might be JSON or HTML string.
     * Return an array of HTML blocks or a string.
     */
    protected function normalizeMainContent($raw)
    {
        if (is_array($raw)) {
            $blocks = [];
            foreach ($raw as $item) {
                if (is_array($item) && array_key_exists('title', $item)) {
                    $title = $item['title'] ?? '';
                    $content = $item['content'] ?? '';
                    $blocks[] = "<h2>{$title}</h2>" . PHP_EOL . "<p>{$content}</p>";
                } else {
                    $blocks[] = is_string($item) ? $item : json_encode($item);
                }
            }
            return $blocks;
        }

        if (is_string($raw)) {
            $trim = trim($raw);
            if (($trim !== '') && ($trim[0] === '{' || $trim[0] === '[')) {
                $decoded = json_decode($raw, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    return $this->normalizeMainContent($decoded);
                }
            }

            return $raw;
        }

        // Fallback: return as-is
        return $raw;
    }

    /**
     * Normalize faqs: return array of ['question'=>..., 'answer'=>...]
     */
    protected function normalizeFaqs($raw)
    {
        if (is_array($raw)) {
            return array_values(array_map(function ($item) {
                if (is_array($item)) {
                    return [
                        'question' => $item['question'] ?? ($item['q'] ?? ''),
                        'answer' => $item['answer'] ?? ($item['a'] ?? ''),
                    ];
                }
                return ['question' => '', 'answer' => is_string($item) ? $item : json_encode($item)];
            }, $raw));
        }

        if (is_string($raw)) {
            $trim = trim($raw);
            if (($trim !== '') && ($trim[0] === '{' || $trim[0] === '[')) {
                $decoded = json_decode($raw, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    return $this->normalizeFaqs($decoded);
                }
            }

            // Could be a single text FAQ
            return [['question' => '', 'answer' => $raw]];
        }

        return [];
    }

    public function render()
    {
        return view('livewire.public.blog-view');
    }
}
