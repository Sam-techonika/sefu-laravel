<?php

namespace App\Livewire\Public;

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

    public function mount($slug = null)
    {
        // Set default publish date if not provided
        if (!$this->publishDate) {
            $this->publishDate = now()->format('F d, Y');
        }
        
        // You can load blog data from database here based on $slug
        // Example:
        // if ($slug) {
        //     $blog = Blog::where('slug', $slug)->firstOrFail();
        //     $this->blogTitle = $blog->title;
        //     $this->atGlanceContent = $blog->at_glance_content;
        //     $this->introductionContent = $blog->introduction_content;
        //     $this->mainContent = $blog->main_content;
        //     $this->keyTakeawaysContent = $blog->key_takeaways_content;
        //     // ... other properties
        // }
    }

    public function render()
    {
        return view('livewire.public.blog-view');
    }
}
