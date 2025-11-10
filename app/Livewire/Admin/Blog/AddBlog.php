<?php

namespace App\Livewire\Admin\Blog;

use App\Enums\LocaleType;
use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogTranslation;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddBlog extends Component
{
    public $locale = LocaleType::EN->value;
    public $title;
    public $slug;
    public $at_glance;
    public $main_content;
    public $key_takeaways;
    public $faqs = [];
    public $tags = '';
    
    public $blog;
    
    public function mount($id)
    {
        $this->blog = Blog::with(['category', 'tags', 'translations'])->find($id);
        
        if (!$this->blog) {
            session()->flash('error', 'Blog not found!');
            return redirect()->route('admin.blogs');
        }
        
        // Check for locale parameter in query string
        if (request()->has('locale') && in_array(request('locale'), LocaleType::values())) {
            $this->locale = request('locale');
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
            $this->key_takeaways = $translation->key_takeaways;
            $this->main_content = $this->convertMainContentToString($translation->main_content);
            $this->faqs = is_array($translation->faqs) ? $translation->faqs : [];
            $this->tags = $translation->tags ?? '';
        } else {
            $this->title = '';
            $this->slug = '';
            $this->at_glance = '';
            $this->key_takeaways = '';
            $this->main_content = '';
            $this->faqs = [];
            $this->tags = '';
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
    
    /**
     * Convert main_content from array format to string format
     */
    private function convertMainContentToString($mainContent)
    {
        if (is_string($mainContent)) {
            return $mainContent;
        }
        
        if (is_array($mainContent)) {
            $html = '';
            foreach ($mainContent as $section) {
                if (is_array($section) && isset($section['title']) && isset($section['content'])) {
                    $title = trim($section['title']);
                    $content = trim($section['content']);
                    
                    if (!empty($title)) {
                        $html .= '<h2>' . htmlspecialchars($title) . '</h2>' . "\n";
                    }
                    if (!empty($content)) {
                        $html .= '<p>' . nl2br(htmlspecialchars($content)) . '</p>' . "\n";
                    }
                }
            }
            return $html;
        }
        
        return '';
    }

    protected function rules()
    {
        return [
            'locale' => 'required|string|in:' . implode(',', LocaleType::values()),
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'at_glance' => 'nullable|string|max:1000',
            'main_content' => 'nullable|string',
            'key_takeaways' => 'nullable|string|max:5000',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:500',
            'faqs.*.answer' => 'nullable|string|max:2000',
            'tags' => 'nullable|string|max:1000',
        ];
    }

    protected $messages = [
        'title.required' => 'Title is required.',
        'slug.required' => 'Slug is required.',
    ];

    public function save()
    {
        $this->validate();
        
        try {
            DB::beginTransaction();
            
            // Clean FAQs (allow empty fields)
            $cleanFaqs = !empty($this->faqs) ? array_values($this->faqs) : [];
            
            // Prepare translation data
            $translationData = [
                'blog_id' => $this->blog->id,
                'locale' => $this->locale,
                'slug' => $this->slug ?? '',
                'category_id' => $this->blog->category_id, 
                'title' => trim($this->title ?? ''),
                'at_glance' => !empty($this->at_glance) ? trim($this->at_glance) : null,
                'main_content' => !empty($this->main_content) ? trim($this->main_content) : null,
                'key_takeaways' => !empty($this->key_takeaways) ? trim($this->key_takeaways) : null,
                'faqs' => !empty($cleanFaqs) ? $cleanFaqs : null,
                'tags' => !empty($this->tags) ? trim($this->tags) : null,
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
