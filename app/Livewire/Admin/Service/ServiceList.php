<?php

namespace App\Livewire\Admin\Service;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ServiceList extends Component
{
    use WithPagination;

    public $search = '';
    public $is_active = '';

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        // defaults
        $this->is_active = '';
    }

    public function updating($field)
    {
        if (in_array($field, ['search', 'is_active'])) {
            $this->resetPage();
        }
    }

    public function openModal()
    {
        $this->dispatch('openServiceForm');
    }

    public function edit($id)
    {
        $this->dispatch('openServiceForm', $id);
    }

    public function toggleStatus($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->is_active = !$service->is_active;
            $service->save();
            $this->dispatch('success', $service->is_active ? 'Service Enabled!' : 'Service Disabled!');
        }
    }

    public function delete($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->delete();
            session()->flash('message', 'Service "' . $service->name . '" deleted successfully!');
        }
        $this->dispatch('refreshServices');
    }

    #[On('refreshServices')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Service::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->is_active !== '') {
            $query->where('is_active', (bool)$this->is_active);
        }

        $services = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('livewire.admin.service.service-list', [
            'services' => $services,
        ]);
    }
}
