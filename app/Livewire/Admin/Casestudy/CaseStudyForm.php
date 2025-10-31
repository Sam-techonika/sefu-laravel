<?php

namespace App\Livewire\Admin\Casestudy;

use App\Models\CaseStudy;
use App\Models\CaseCategory;
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
    public $case_category_id;
    public $is_active = true;
    
    public $categories = [];

    protected $rules = [
        'nextCaseStudyName' => 'required|string|max:255',
        'client_name' => 'nullable|string|max:255',
        'project_name' => 'nullable|string|max:255',
        'case_category_id' => 'nullable|exists:case_categories,id',
        'image' => 'nullable|image|max:2048',
    ];

    #[On('openCaseStudyForm')]
    public function open($id = null)
    {
        $this->resetValidation();
        $this->reset(['image', 'existingImage', 'client_name', 'project_name', 'case_category_id', 'nextCaseStudyName']);
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
            $this->case_category_id = $caseStudy->case_category_id;
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
        $this->loadCategories();
    }
    
    public function loadCategories()
    {
        $locale = app()->getLocale() ?? 'en';
        $this->categories = CaseCategory::where('is_active', true)
            ->with(['translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->get()
            ->map(function ($category) {
                $translation = $category->translations->first();
                return [
                    'id' => $category->id,
                    'name' => $translation ? $translation->name : 'Category ' . $category->id,
                ];
            })
            ->toArray();
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
            'case_category_id' => $this->case_category_id,
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
