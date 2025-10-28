<?php

namespace App\Livewire\Admin\Testimonial;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;

class TestimonialList extends Component
{
    use WithPagination;

    public $name;
    public $is_active = true;
    public $is_homepage = false;
    public $testimonial_id;
    public $search = '';
    public $perPage = 10;
    public $confirmingDeleteId = null;

    // Modal states
    public $showForm = false;
    public $showDeleteModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'is_active' => 'boolean',
        'is_homepage' => 'boolean',
    ];

    protected $listeners = ['testimonialUpdated' => '$refresh'];
    protected $queryString = ['search' => ['except' => ''], 'perPage' => ['except' => 10]];

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Testimonial::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $testimonials = $query->latest()->paginate($this->perPage);
        return view('livewire.admin.testimonial.testimonial-list', compact('testimonials'));
    }

    public function create()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit($id)
    {
        $t = Testimonial::findOrFail($id);
        $this->testimonial_id = $t->id;
        $this->name = $t->name;
        $this->is_active = $t->is_active;
        $this->is_homepage = $t->is_homepage ?? false;
        $this->showForm = true;
    }

    public function save($stayOpen = false)
    {
        $this->validate();

        if ($this->testimonial_id) {
            Testimonial::findOrFail($this->testimonial_id)->update([
                'name' => $this->name,
                'is_active' => $this->is_active,
                'is_homepage' => $this->is_homepage,
            ]);
           $this->dispatch('success', 'Testimonial updated successfully.');
        } else {
            Testimonial::create([
                'name' => $this->name,
                'is_active' => $this->is_active,
                'is_homepage' => $this->is_homepage,
            ]);
           $this->dispatch('success', 'Testimonial created successfully.');
        }

        $this->resetForm();
        $this->dispatch('testimonialUpdated');
        $this->resetPage();

        if (!$stayOpen) {
            $this->showForm = false;
        }
    }

    public function saveWithStayOpen()
    {
        $this->save(true);
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed()
    {
        if ($this->confirmingDeleteId) {
            Testimonial::findOrFail($this->confirmingDeleteId)->delete();
           $this->dispatch('success', 'Testimonial deleted successfully.');
        }

        $this->confirmingDeleteId = null;
        $this->showDeleteModal = false;
        $this->resetPage();
        $this->dispatch('testimonialUpdated');
    }

    /**
     * Toggle the active state for a Testimonial by id.
     *
     * @param  int  $id
     * @return void
     */
    public function toggleActive($id)
    {
        $t = Testimonial::findOrFail($id);

        try {
            $t->is_active = !$t->is_active;
            $t->save();

           $this->dispatch('success', 'Testimonial status updated successfully.');
            $this->dispatch('testimonialUpdated');
            $this->resetPage();
        } catch (\Exception $e) {
           $this->dispatch('success', 'Failed to update Testimonial status.');
        }
    }

    public function cancel()
    {
        $this->resetForm();
        $this->showForm = false;
        $this->showDeleteModal = false;
    }

    private function resetForm()
    {
        $this->reset(['name', 'is_active', 'is_homepage', 'testimonial_id']);
        $this->is_active = true;
        $this->is_homepage = false;
    }
}
