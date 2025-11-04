<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Testimonial;
use App\Models\ServiceRequest;
use App\Models\Blog;

class Home extends Component
{
    public $testimonials = [];
    public $blogs = [];
    
    // Service request form properties
    public $service = '';
    public $email = '';
    public $phone = '';

    public function mount(){
        $locale = app()->getLocale() ?? 'en';

        $this->testimonials = Testimonial::where('is_homepage', true)
            ->where('is_active', true)
            ->with(['translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->get()
            ->filter(function ($testimonial) {
                return $testimonial->translations->isNotEmpty();
            })
            ->map(function ($testimonial) {
                $translation = $testimonial->translations->first();
                return [
                    'name' => $testimonial->name,
                    'content' => $translation->content ?? '',
                    'position' => $translation->position ?? '',
                    'company' => $translation->company ?? '',
                    'photo' => $translation->photo ?? 'assets/img/testimonial/07.png',
                    'address' => $translation->address ?? '',
                ];
            });

        // Load latest blogs with localization
        $this->blogs = Blog::where('is_active', true)
            ->whereHas('translations', function ($query) use ($locale) {
                $query->where('locale', $locale);
            })
            ->with(['translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->latest()
            ->take(3)
            ->get()
            ->map(function ($blog) {
                $translation = $blog->translations->first();
                return [
                    'id' => $blog->id,
                    'slug' => $translation->slug ?? '',
                    'title' => $translation->title ?? '',
                    'at_glance' => $translation->at_glance ?? '',
                    'featured_image' => $blog->featured_image ?? 'assets/img/blog/04.jpg',
                    'created_at' => $blog->created_at,
                ];
            });
    }

    public function submitServiceRequest()
    {
        $this->validate([
            'service' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
        ]);

        ServiceRequest::create([
            'service' => $this->service,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => 'pending',
        ]);

        session()->flash('service_request_success', 'Your service request has been submitted successfully!');
        
        $this->reset(['service', 'email', 'phone']);
    }

    #[Title('Home')]
    public function render()
    {
        return view('livewire.public.home');
    }
}
