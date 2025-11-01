<?php

namespace App\Livewire\Admin\Service;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ServiceForm extends Component
{
    use WithFileUploads;

    public $isModalOpen = false;
    public $serviceId = null;

    public $nextServiceName;
    public $image;
    public $existingImage = null;
    public $is_active = true;

    protected $rules = [
        'nextServiceName' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
    ];

    #[On('openServiceForm')]
    public function open($id = null)
    {
        $this->resetValidation();
        $this->reset(['image', 'existingImage', 'nextServiceName']);
        $this->is_active = true;
        $this->serviceId = null;

        if ($id) {
            $service = Service::find($id);
            if (!$service) {
                session()->flash('error', 'Service not found!');
                return;
            }

            $this->serviceId = $service->id;
            $this->is_active = $service->is_active;
            $this->nextServiceName = $service->name;
            $this->existingImage = $service->image;
        } else {
            $this->setNextServiceName();
        }

        $this->isModalOpen = true;
        $this->dispatch('modal-opened');
    }

    public function mount()
    {
        $this->setNextServiceName();
    }

    public function setNextServiceName()
    {
        $last = Service::withTrashed()->latest('id')->first();
        $number = $last ? ($last->id + 1) : 1;
        $this->nextServiceName = 'Service ' . $number;
    }

    public function close()
    {
        $this->isModalOpen = false;
    }

    public function saveService()
    {
        $this->validate();

        $data = [
            'name' => $this->nextServiceName,
            'is_active' => $this->is_active,
        ];

        if ($this->image) {
            $path = $this->image->store('service_images', 'public');
            $data['image'] = $path;
        }

        if ($this->serviceId) {
            $service = Service::findOrFail($this->serviceId);
            $service->update($data);
        } else {
            $service = Service::create($data);
        }

        $this->dispatch('refreshServices');
        $this->isModalOpen = false;

        $this->dispatch('success', $this->serviceId ? 'Service updated successfully!' : 'Service created successfully!');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.service.service-form');
    }
}
