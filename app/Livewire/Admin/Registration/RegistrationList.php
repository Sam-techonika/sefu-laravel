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
    public $perPage = 10;
    public $selectedRegistration = null;
    public $showRegistrationModal = false;
    public $pendingDeleteId = null;
    public $showDeleteModal = false;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $registrations = UserRegistration::with(['registration','plan'])
            ->when($this->search, function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('phone', 'like', "%{$this->search}%");
            })->latest()->paginate($this->perPage);

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

    public function show($id)
    {
        $this->selectedRegistration = UserRegistration::with(['registration','plan'])->find($id);
        $this->showRegistrationModal = true;
    }

    public function closeRegistrationModal()
    {
        $this->selectedRegistration = null;
        $this->showRegistrationModal = false;
    }

    public function confirmDeletion($id)
    {
        $this->pendingDeleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed()
    {
        if ($this->pendingDeleteId) {
            $reg = UserRegistration::find($this->pendingDeleteId);
            if ($reg) {
                $reg->delete();
                $this->dispatch('success', 'Registration deleted.');
            }
            $this->pendingDeleteId = null;
            $this->showDeleteModal = false;
            $this->resetPage();
        }
    }
}
