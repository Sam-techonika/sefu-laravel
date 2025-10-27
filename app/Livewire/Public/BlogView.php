<?php

namespace App\Livewire\Public;

use App\Models\BlogTranslation;
use Livewire\Component;

class BlogView extends Component
{
    // Blog Header
    public $blogTitle = '5 Common Trademark Filing Mistakes in India - and How to Avoid Them';
    public $authorName = 'John Smith';
    public $authorTitle = 'Partner at Example Legal';
    public $authorBio = 'John has over 13 years of experience in intellectual property law, helping startups and established businesses protect their brands.';
    public $authorPhone = '+91-1234567880';
    public $authorImage;
    public $publishDate;
    public $category = 'Business Guide';
    public $featuredImage;
    
    // Content Sections (CKEditor Compatible)
    public $atGlanceContent = '<p>Many businesses make costly errors when filing for trademarks in India. This guide covers the top 5 mistakes and how to file properly to safeguard your brand.</p>';
    
    public $introductionContent = '<p>Introduction about trademark identity, whether mistaken is priceful or protecting brand identity. Trademark registration is a crucial step for businesses to protect their brand identity and prevent unauthorized use by competitors.</p>';
    
    public $mainContent = '
        <h2>1. Choosing a Weak Name</h2>
        <p>Avoid being an interest nearistent th atil pricefilling for trademarks in India. Use unique, coined names to handle using unique, coined names for use.</p>
        <p>For example: if to startmark-deistake<sup>1</sup> names, use unique, cunique coined names to protect.</p>
        
        <h2>2. Incomplete Documentation</h2>
        <p>Ensure all required documents are properly prepared and submitted. Missing documentation can lead to delays or rejection.</p>
        
        <h2>3. Wrong Class Selection</h2>
        <p>Selecting the wrong trademark class can leave your brand unprotected. Consult with experts to choose the right classification.</p>
        
        <h2>4. Ignoring Prior Search</h2>
        <p>Always conduct a comprehensive trademark search before filing to avoid conflicts with existing marks.</p>
        
        <h2>5. Missing Deadlines</h2>
        <p>Trademark registration involves strict timelines. Missing deadlines can result in application abandonment.</p>
    ';
    
    public $keyTakeawaysContent = '<p><strong>Avoiding 5 common filing mistakes ensures your trademark is distinctive and legally protected in India.</strong></p>';
    
    public $quoteText = 'A brand for company is like reputation for a person. You earn reputation trying to do hard things well.';
    
    // FAQs
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

    public function mount($slug = null)
    {
        $locale = app()->getLocale() ?? redirect(404);
        

        
        // Load translation by slug and hydrate view properties
        if ($slug) {
            
            $translation = BlogTranslation::where('slug', $slug)
                ->with(['blog.user', 'category.translations'])
                ->firstOrFail();

                if($locale !== $translation->locale) {
                    $translation = BlogTranslation::where('blog_id', $translation->blog_id)
                        ->where('locale', $locale)
                        ->first();
                    return redirect()->route('blog.view', ['slug' => $translation->slug, 'locale' => $locale]);
                }

            // Basic fields
            $this->blogTitle = $translation->title ?? $this->blogTitle;
            $this->featuredImage = $translation->blog->featured_image ?? $this->featuredImage;
            $this->publishDate = optional($translation->created_at)->format('F d, Y') ?? $this->publishDate;

            // Content fields (some are stored as JSON / arrays)
            $this->atGlanceContent = $translation->at_glance ?? $this->atGlanceContent;
            $this->introductionContent = $translation->introduction ?? $this->introductionContent;
            $this->keyTakeawaysContent = $translation->key_takeaways ?? $this->keyTakeawaysContent;

            // Normalize main content: it may be stored as JSON (array of {title,content}) or as HTML string
            $rawMain = $translation->main_content ?? $this->mainContent;
            $this->mainContent = $this->normalizeMainContent($rawMain);

            // Normalize faqs: may be JSON string or array
            $rawFaqs = $translation->faqs ?? [];
            $this->faqs = $this->normalizeFaqs($rawFaqs);

            // Category (try to use category translation for the current locale)
            if ($translation->category) {
                // category_translations table uses `name` for the translated label
                $catTitle = $translation->category->translations()->where('locale', $translation->locale)->value('name')
                    ?? $translation->category->translations()->value('name');
                $this->category = $catTitle ?? $this->category;
            }

            // Author (if blog.user exists)
            if (!empty($translation->blog) && !empty($translation->blog->user)) {
                $user = $translation->blog->user;
                $this->authorName = $user->name ?? $this->authorName;
                $this->authorTitle = $user->title ?? $this->authorTitle;
                $this->authorBio = $user->bio ?? $this->authorBio;
                $this->authorPhone = $user->phone ?? $this->authorPhone;
                $this->authorImage = $user->avatar ?? $this->authorImage;
            }
        }

        // Ensure publish date is set
        if (!$this->publishDate) {
            $this->publishDate = now()->format('F d, Y');
        }
    }

    /**
     * Normalize main content which might be JSON or HTML string.
     * Return an array of HTML blocks or a string.
     */
    protected function normalizeMainContent($raw)
    {
        // If already an array, try to map to HTML blocks
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

        // If it's a JSON string, try to decode
        if (is_string($raw)) {
            $trim = trim($raw);
            if (($trim !== '') && ($trim[0] === '{' || $trim[0] === '[')) {
                $decoded = json_decode($raw, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    return $this->normalizeMainContent($decoded);
                }
            }

            // Not JSON — assume it's already HTML
            return $raw;
        }

        // Fallback
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
