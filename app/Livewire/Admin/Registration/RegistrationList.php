<?php

namespace App\Livewire\Admin\Registration;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserRegistration;
use Livewire\Attributes\Layout;

class RegistrationList extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';
    #[Layout('components.layouts.admin')]
    public function render()
    {
                $registrations = UserRegistration::with(['registration','plan'])
                        ->when($this->search, function ($q) {
                                $q->where('name', 'like', "%{$this->search}%")
                                    ->orWhere('email', 'like', "%{$this->search}%")
                                    ->orWhere('phone', 'like', "%{$this->search}%");
                        })->latest()->paginate(10);

        return view('livewire.admin.registration.registration-list', [
            'registrations' => $registrations
        ]);
    }

    public function toggleProcessed($id)
    {
        $reg = UserRegistration::find($id);
        if (! $reg) {
            $this->dispatch('success', 'Registration not found.');
        }

        $reg->is_processed = ! $reg->is_processed;
        $reg->save();

        $this->dispatch('success', 'Registration updated.');
    }
}
