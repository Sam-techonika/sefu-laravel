<?php

namespace App\Livewire\Public\CompanyRegistration;

use Livewire\Attributes\Title;
use App\Models\Registration;
use App\Models\RegistrationPlan;
use App\Models\UserRegistration;
use App\Models\ServiceRequest;
use App\Models\Blog;
use Livewire\Component;

class TradeMark extends Component
{
    public $registration;
    public $plan;
    public $showModal = false;
    public $name;
    public $email;
    public $phone;
    public $planName;
    public $showThanksModal = false;
    public $showPendingModal = false;
    public $blogs = [];
    
    // Service request properties
    public $serviceType = '';
    public $servicePhone = '';
    public $serviceEmail = '';
    public $showServiceThanks = false;

    public function mount()
    {
        $getRegistration = Registration::where('name', 'Trademark Registration')->with('Plan')->first();
        $this->registration = $getRegistration->id;
        $this->showServiceThanks = false;
        
        // Load latest blogs with localization
        $locale = app()->getLocale() ?? 'en';
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
                    'featured_image' => $blog->featured_image ?? 'assets/img/blog/01.jpg',
                    'created_at' => $blog->created_at,
                ];
            });
    }
    public function selectPlan($plan)
    {
        $planModel = RegistrationPlan::where('registration_id', $this->registration)->where('name', $plan)->first();
        if ($planModel) {
            $this->plan = $planModel->id;
            $this->planName = $planModel->name;
        } else {
            $this->plan = null;
            $this->planName = $plan;
        }
        $this->showModal = true;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:30',
        ];
    }

    public function saveRegistration()
    {
        $this->validate();

        // If a pending registration with the same phone exists, show pending modal and do not create a duplicate
        $existing = UserRegistration::where('phone', $this->phone)
            ->where('registration_id', $this->registration)
            ->where('is_processed', false)
            ->first();

        if ($existing) {
            $this->showModal = false;
            $this->showPendingModal = true;
            return;
        }

        UserRegistration::create([
            'registration_id' => $this->registration,
            'registration_plan_id' => $this->plan,
            'plan_name' => $this->planName,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_processed' => false,
        ]);

        // reset fields and close modal
        $this->reset(['name', 'email', 'phone', 'plan', 'planName']);
        $this->showModal = false;
        $this->showThanksModal = true;

        session()->flash('success', 'Thanks — we will contact you shortly.');
        $this->dispatch('registrationSaved');
    }
    
    public function submitServiceRequest()
    {
        $this->validate([
            'serviceType' => 'required|string',
            'servicePhone' => 'required|string|max:15',
            'serviceEmail' => 'nullable|email',
        ]);

        ServiceRequest::create([
            'service' => $this->serviceType,
            'phone' => $this->servicePhone,
            'email' => $this->serviceEmail,
            'status' => 'pending',
        ]);

        $this->reset(['serviceType', 'servicePhone', 'serviceEmail']);
        $this->showServiceThanks = true;
        
        $this->dispatch('success', 'Service request submitted successfully!');
    }
    
    #[Title('Trademark Registration')]
    public function render()
    {
        return view('livewire.public.company-registration.trade-mark');
    }
}
