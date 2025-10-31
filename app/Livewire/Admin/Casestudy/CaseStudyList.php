<?php

namespace App\Livewire\Admin\Casestudy;

use App\Enums\LocaleType;
use App\Models\CaseStudy;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class CaseStudyList extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $locale = LocaleType::EN->value;
    public $is_active = true;

    public $isModalOpen = false;
    public $caseStudyId = null;
    
    // Delete confirmation modal
    public $showDeleteModal = false;
    public $deleteId = null;
    public $deleteName = '';

    public $image;
    public $client_name;
    public $project_name;
    public $nextCaseStudyName;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->setNextCaseStudyName();
    }

    public function toggleStatus($caseStudyId)
    {
        $caseStudy = CaseStudy::find($caseStudyId);
        if ($caseStudy) {
            $caseStudy->is_active = !$caseStudy->is_active;
            $caseStudy->save();
        }
        $this->dispatch('success', $caseStudy->is_active ? 'Case Study Enabled!' : 'Case Study Disabled!');
    }

    public function updating($field)
    {
        if (in_array($field, ['search', 'locale'])) {
            $this->resetPage();
        }
    }

    public function setNextCaseStudyName()
    {
        $lastCaseStudy = CaseStudy::withTrashed()->latest('id')->first();
        $number = $lastCaseStudy ? ($lastCaseStudy->id + 1) : 1;
        $this->nextCaseStudyName = 'CaseStudy ' . $number;
    }

    public function openModal()
    {
        $this->dispatch('openCaseStudyForm');
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function edit($id)
    {
        $this->dispatch('openCaseStudyForm', $id);
    }
    
    public function confirmDelete($id)
    {
        $caseStudy = CaseStudy::find($id);
        if ($caseStudy) {
            $this->deleteId = $id;
            $this->deleteName = $caseStudy->name;
            $this->showDeleteModal = true;
        }
    }
    
    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->deleteId = null;
        $this->deleteName = '';
    }

    public function delete()
    {
        if ($this->deleteId) {
            $caseStudy = CaseStudy::find($this->deleteId);
            if ($caseStudy) {
                $caseStudy->delete();
                $this->dispatch('success', 'Case Study "' . $caseStudy->name . '" deleted successfully!');
            }
            $this->cancelDelete();
            $this->dispatch('refreshCaseStudies');
        }
    }

    public function resetForm()
    {
        $this->reset(['image', 'client_name', 'project_name']);
        $this->is_active = true;
    }

    public function resetCreateForm()
    {
        $this->reset(['image', 'client_name', 'project_name', 'caseStudyId', 'nextCaseStudyName']);
        $this->is_active = true;
    }

    #[On('refreshCaseStudies')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = CaseStudy::with(['translations', 'category.translations']);

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('client_name', 'like', '%' . $this->search . '%')
                ->orWhere('project_name', 'like', '%' . $this->search . '%');
        }

        $caseStudies = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('livewire.admin.casestudy.case-study-list', [
            'caseStudies' => $caseStudies,
        ]);
    }
}
