<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogTranslation;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddBlog extends Component
{
    public $locale = 'en';
    public $title;
    public $slug;
    public $at_glance;
    public $introduction;
    public $main_content_sections = [];
    public $key_takeaways;
    public $faqs = [];
    
    public $blog;
    
    public function mount($id)
    {
        $this->blog = Blog::with(['category', 'tags', 'translations'])->find($id);
        
        if (!$this->blog) {
            session()->flash('error', 'Blog not found!');
            return redirect()->route('admin.blogs');
        }
        
        $this->loadTranslationData();
        $this->ensureInitialization();
    }
    
    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }
    
    private function loadTranslationData()
    {
        $translation = $this->blog->translations()->where('locale', $this->locale)->first();
        
        if ($translation) {
            $this->title = $translation->title;
            $this->slug = $translation->slug;
            $this->at_glance = $translation->at_glance;
            $this->introduction = $translation->introduction;
            $this->key_takeaways = $translation->key_takeaways;
            $this->main_content_sections = is_array($translation->main_content) ? $translation->main_content : [];
            $this->faqs = is_array($translation->faqs) ? $translation->faqs : [];
        } else {
            // Reset to empty values for new translation
            $this->title = '';
            $this->slug = '';
            $this->at_glance = '';
            $this->introduction = '';
            $this->key_takeaways = '';
            $this->main_content_sections = [];
            $this->faqs = [];
        }
    }
    
    private function ensureInitialization()
    {
        // Always ensure we have at least one FAQ
        if (empty($this->faqs) || count($this->faqs) === 0) {
            $this->faqs = [
                ['question' => '', 'answer' => '']
            ];
        }
        
        // Always ensure we have at least one main content section
        if (empty($this->main_content_sections) || count($this->main_content_sections) === 0) {
            $this->main_content_sections = [
                [
                    'title' => '',
                    'content' => ''
                ]
            ];
        }
    }


    public function addFaq()
    {
        if (!is_array($this->faqs)) {
            $this->faqs = [];
        }
        
        $this->faqs[] = ['question' => '', 'answer' => ''];
    }

    public function removeFaq($index)
    {
        if (isset($this->faqs[$index])) {
            unset($this->faqs[$index]);
            $this->faqs = array_values($this->faqs);
        }
        
        if (empty($this->faqs)) {
            $this->addFaq();
        }
    }

    public function updatedLocale($locale)
    {
        $this->loadTranslationData();
        $this->ensureInitialization();
    }

    public function addMainContentSection()
    {
        if (!is_array($this->main_content_sections)) {
            $this->main_content_sections = [];
        }
        
        $this->main_content_sections[] = [
            'title' => '',
            'content' => ''
        ];
    }

    public function removeMainContentSection($index)
    {
        if (isset($this->main_content_sections[$index])) {
            unset($this->main_content_sections[$index]);
            $this->main_content_sections = array_values($this->main_content_sections);
        }
        
        if (empty($this->main_content_sections)) {
            $this->addMainContentSection();
        }
    }

    protected $rules = [
        'locale' => 'required|string|in:en,hi',
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'at_glance' => 'nullable|string|max:1000',
        'introduction' => 'nullable|string|max:5000',
        'main_content_sections' => 'nullable|array',
        'main_content_sections.*.title' => 'required|string|max:255',
        'main_content_sections.*.content' => 'nullable|string',
        'key_takeaways' => 'nullable|string|max:5000',
        'faqs' => 'nullable|array',
        'faqs.*.question' => 'required_with:faqs.*.answer|string|max:500',
        'faqs.*.answer' => 'required_with:faqs.*.question|string|max:2000',
    ];

    protected $messages = [
        'title.required' => 'Title is required.',
        'slug.required' => 'Slug is required.',
        'faqs.*.question.required_with' => 'Question is required when answer is provided.',
        'faqs.*.answer.required_with' => 'Answer is required when question is provided.',
    ];

    public function save()
    {
        $this->validate();
        
        try {
            DB::beginTransaction();
            
            // Clean and filter FAQs
            $cleanFaqs = !empty($this->faqs) 
                ? array_values(array_filter($this->faqs, function($faq) {
                    return !empty(trim($faq['question'] ?? '')) && !empty(trim($faq['answer'] ?? ''));
                }))
                : [];
            
            // Clean and prepare main content sections
            $cleanMainContentSections = !empty($this->main_content_sections)
                ? array_values(array_filter($this->main_content_sections, function($section) {
                    return !empty(trim($section['title'] ?? ''));
                }))
                : [];
            
            // Prepare translation data
            $translationData = [
                'blog_id' => $this->blog->id,
                'locale' => $this->locale,
                'slug' => Str::slug($this->slug ?? ''),
                'category_id' => $this->blog->category_id, 
                'title' => trim($this->title ?? ''),
                'at_glance' => !empty($this->at_glance) ? trim($this->at_glance) : null,
                'introduction' => !empty($this->introduction) ? trim($this->introduction) : null,
                'main_content' => !empty($cleanMainContentSections) ? $cleanMainContentSections : null,
                'key_takeaways' => !empty($this->key_takeaways) ? trim($this->key_takeaways) : null,
                'faqs' => !empty($cleanFaqs) ? $cleanFaqs : null,
            ];
            
            // Update or create translation
            BlogTranslation::updateOrCreate(
                ['blog_id' => $this->blog->id, 'locale' => $this->locale],
                $translationData
            );
            
            DB::commit();
            
            session()->flash('message', 'Blog translation updated successfully!');
            return redirect()->route('admin.blogs');
            
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred while saving the blog: ' . $e->getMessage());
        }
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.add-blog');
    }
}
