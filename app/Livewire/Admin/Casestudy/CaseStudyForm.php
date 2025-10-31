<?php

namespace App\Livewire\Admin\Casestudy;

use App\Models\CaseStudy;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class CaseStudyForm extends Component
{
    use WithFileUploads;

    public $isModalOpen = false;
    public $caseStudyId = null;

    public $nextCaseStudyName;
    public $image;
    public $existingImage = null;
    public $client_name;
    public $project_name;
    public $is_active = true;

    protected $rules = [
        'nextCaseStudyName' => 'required|string|max:255',
        'client_name' => 'nullable|string|max:255',
        'project_name' => 'nullable|string|max:255',
        'image' => 'nullable|image|max:2048',
    ];

    #[On('openCaseStudyForm')]
    public function open($id = null)
    {
        $this->resetValidation();
        $this->reset(['image', 'existingImage', 'client_name', 'project_name', 'nextCaseStudyName']);
        $this->is_active = true;
        $this->caseStudyId = null;

        if ($id) {
            $caseStudy = CaseStudy::find($id);
            if (!$caseStudy) {
                session()->flash('error', 'Case Study not found!');
                return;
            }

            $this->caseStudyId = $caseStudy->id;
            $this->client_name = $caseStudy->client_name;
            $this->project_name = $caseStudy->project_name;
            $this->is_active = $caseStudy->is_active;
            $this->nextCaseStudyName = $caseStudy->name;
            $this->existingImage = $caseStudy->image;
        } else {
            $this->setNextCaseStudyName();
        }

        $this->isModalOpen = true;
        $this->dispatch('modal-opened');
    }

    public function mount()
    {
        $this->setNextCaseStudyName();
    }

    public function close()
    {
        $this->isModalOpen = false;
    }

    public function setNextCaseStudyName()
    {
        $lastCaseStudy = CaseStudy::withTrashed()->latest('id')->first();
        $number = $lastCaseStudy ? ($lastCaseStudy->id + 1) : 1;
        $this->nextCaseStudyName = 'CaseStudy ' . $number;
    }

    public function saveCaseStudy()
    {
        $this->validate();

        $data = [
            'name' => $this->nextCaseStudyName,
            'client_name' => $this->client_name,
            'project_name' => $this->project_name,
            'is_active' => $this->is_active,
        ];

        if ($this->image) {
            $path = $this->image->store('case_study_images', 'public');
            $data['image'] = $path;
        }

        if ($this->caseStudyId) {
            $caseStudy = CaseStudy::findOrFail($this->caseStudyId);
            $caseStudy->update($data);
        } else {
            $caseStudy = CaseStudy::create($data);
        }

        $this->dispatch('refreshCaseStudies');
        $this->isModalOpen = false;

        $this->dispatch('success', $this->caseStudyId ? 'Case Study updated successfully!' : 'Case Study created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.casestudy.case-study-form');
    }
}
