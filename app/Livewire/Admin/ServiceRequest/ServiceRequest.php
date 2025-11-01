<?php

namespace App\Livewire\Admin\ServiceRequest;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceRequest as ServiceRequestModel;

class ServiceRequest extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 10;
    public $statusFilter = '';
    public $selectedRequest = null;
    public $pendingDeleteId = null;
    public $showDeleteModal = false;

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'serviceRequestUpdated' => '$refresh',
        'serviceRequestDeleted' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $requests = ServiceRequestModel::when($this->search, function ($q) {
            $q->where('service', 'like', '%'.$this->search.'%')
              ->orWhere('phone', 'like', '%'.$this->search.'%')
              ->orWhere('email', 'like', '%'.$this->search.'%');
        })
        ->when($this->statusFilter, function ($q) {
            $q->where('status', $this->statusFilter);
        })
        ->orderBy('created_at', 'desc')
        ->paginate($this->perPage);

        return view('livewire.admin.service-request.service-request', compact('requests'));
    }

    public function show($id)
    {
        $this->selectedRequest = ServiceRequestModel::find($id);
    }

    public function updateStatus($id, $status)
    {
        $request = ServiceRequestModel::find($id);
        if ($request) {
            $request->update(['status' => $status]);
            $this->dispatch('success', 'Status updated successfully.');
            $this->dispatch('serviceRequestUpdated');
        }
    }

    public function delete($id)
    {
        $request = ServiceRequestModel::find($id);
        if ($request) {
            $request->delete();
            $this->dispatch('success', 'Service request deleted successfully.');
            $this->dispatch('serviceRequestDeleted');
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
        $this->selectedRequest = null;
    }
    
    public function closeDeleteModal()
    {
        $this->pendingDeleteId = null;
        $this->showDeleteModal = false;
    }
}
