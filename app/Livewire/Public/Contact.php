<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\UserContact;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'required|string|max:50',
        'message' => 'required|string',
    ];

    /**
     * Submit the contact form and create a UserContact entry.
     */
    public function submit()
    {
        $data = $this->validate();

        UserContact::create($data);

        $this->reset(['name', 'email', 'phone', 'message']);

        session()->flash('success', __('Your message has been sent.'));
    }

    #[Title('Contact Us')]
    public function render()
    {
        return view('livewire.public.contact');
    }
}
