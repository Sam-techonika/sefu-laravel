<?php

namespace App\Livewire\Public\CompanyRegistration;

use App\Models\Registration;
use App\Models\RegistrationPlan;
use App\Models\UserRegistration;
use App\Models\ServiceRequest;
use Livewire\Component;

class Foreign extends Component
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
    
    // Service request properties
    public $serviceType = '';
    public $servicePhone = '';
    public $serviceEmail = '';
    public $showServiceThanks = false;

    public function mount()
    {
        $getRegistration = Registration::where('name', 'Compare Plan Foreign National')->with('Plan')->first();
        $this->registration = $getRegistration->id;
        $this->showServiceThanks = false;
    }

    public function selectPlan($plan){
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

        $this->reset(['name','email','phone','plan','planName']);
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
    
    public function render()
    {
        return view('livewire.public.company-registration.foreign');
    }
}
