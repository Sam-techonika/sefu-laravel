<?php

namespace App\Livewire\Admin\Faq;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Faq;
use Livewire\Attributes\Layout;

class FaqList extends Component
{
    use WithPagination;

    public $name;
    public $is_active = true;
    public $is_homepage = false;
    public $faq_id;
    public $search = '';
    public $perPage = 10;
    public $confirmingDeleteId = null;

    public $showForm = false;
    public $showDeleteModal = false;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|string|max:255',
        'is_active' => 'boolean',
        'is_homepage' => 'boolean',
    ];

    protected $listeners = ['faqUpdated' => '$refresh'];
    protected $queryString = ['search' => ['except' => ''], 'perPage' => ['except' => 10]];

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Faq::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $faqs = $query->latest()->paginate($this->perPage);
        return view('livewire.admin.faq.faq-list', compact('faqs'));
    }

    public function create()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $this->faq_id = $faq->id;
        $this->name = $faq->name;
        $this->is_active = $faq->is_active;
        $this->is_homepage = $faq->is_homepage ?? false;
        $this->showForm = true;
    }

    public function save($stayOpen = false)
    {
        $this->validate();

        if ($this->faq_id) {
            Faq::findOrFail($this->faq_id)->update([
                'name' => $this->name,
                'is_active' => $this->is_active,
                'is_homepage' => $this->is_homepage,
            ]);
           $this->dispatch('success', 'FAQ updated successfully.');
        } else {
            Faq::create([
                'name' => $this->name,
                'is_active' => $this->is_active,
                'is_homepage' => $this->is_homepage,
            ]);
           $this->dispatch('success', 'FAQ created successfully.');
        }

        $this->resetForm();
        $this->dispatch('faqUpdated');
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
            Faq::findOrFail($this->confirmingDeleteId)->delete();
           $this->dispatch('success', 'FAQ deleted successfully.');
        }

        $this->confirmingDeleteId = null;
        $this->showDeleteModal = false;
        $this->resetPage();
        $this->dispatch('faqUpdated');
    }

    /**
     * Toggle the active state for an FAQ by id.
     *
     * @param  int  $id
     * @return void
     */
    public function toggleActive($id)
    {
        $faq = Faq::findOrFail($id);

        try {
            $faq->is_active = !$faq->is_active;
            $faq->save();

           $this->dispatch('success', 'FAQ status updated successfully.');
            $this->dispatch('faqUpdated');
            $this->resetPage();
        } catch (\Exception $e) {
           $this->dispatch('success', 'Failed to update FAQ status.');
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
        $this->reset(['name', 'is_active', 'is_homepage', 'faq_id']);
        $this->is_active = true;
        $this->is_homepage = false;
    }
}
