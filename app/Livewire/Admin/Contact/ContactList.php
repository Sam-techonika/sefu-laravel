<?php

namespace App\Livewire\Admin\Contact;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserContact;

class ContactList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 10;
    public $selectedContact = null;
    public $pendingDeleteId = null;
    public $showDeleteModal = false;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[Layout('components.layouts.admin')]
    #[Title('Contacts')]
    public function render()
    {
        $contacts = UserContact::when($this->search, function ($q) {
            $q->where('name', 'like', '%'.$this->search.'%')
              ->orWhere('email', 'like', '%'.$this->search.'%')
              ->orWhere('phone', 'like', '%'.$this->search.'%')
              ->orWhere('message', 'like', '%'.$this->search.'%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate($this->perPage);

        return view('livewire.admin.contact.contact-list', compact('contacts'));
    }

    public function show($id)
    {
        $this->selectedContact = UserContact::find($id);

        if ($this->selectedContact && !$this->selectedContact->is_read) {
            $this->selectedContact->update(['is_read' => true]);
        }
    }

    public function toggleRead($id)
    {
        $c = UserContact::find($id);
        if ($c) {
            $c->update(['is_read' => !$c->is_read]);
        }
    }

    public function delete($id)
    {
        $c = UserContact::find($id);
        if ($c) {
            $c->delete();
           $this->dispatch('success', 'Contact deleted successfully.');
            $this->resetPage();
        }
    }

  
    public function confirmDeletion($id)
    {
        $this->pendingDeleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed()
    {
        if ($this->pendingDeleteId) {
            $this->delete($this->pendingDeleteId);
            $this->pendingDeleteId = null;
            $this->showDeleteModal = false;
        }
    }

    public function clearSelected()
    {
        $this->selectedContact = null;
    }
    
    public function closeDeleteModal()
    {
        $this->pendingDeleteId = null;
        $this->showDeleteModal = false;
    }
    

}
