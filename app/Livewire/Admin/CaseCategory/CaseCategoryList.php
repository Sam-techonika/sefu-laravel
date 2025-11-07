<?php

namespace App\Livewire\Admin\CaseCategory;

use App\Models\CaseCategory;
use App\Models\CaseCategoryTranslation;
use Livewire\Component;
use Livewire\WithPagination;
use App\Enums\LocaleType;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class CaseCategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search = '';
    public $showModal = false;
    public $showConfirmModal = false;
    public $isEdit = false;

    public $caseCategoryId;
    public $deleteId;
    public $names = [];

    public $availableLocales = [];

    public function mount()
    {
        $this->availableLocales = LocaleType::options();
    }

    protected function rules()
    {
        $rules = [];
        foreach ($this->availableLocales as $code => $label) {
            $rules["names.{$code}"] = 'required|string';
        }
        return $rules;
    }

    #[Layout('components.layouts.admin')]
    #[Title('Case Categories')]
    public function render()
    {
        $caseCategories = CaseCategory::with('translations')
            ->when(
                $this->search,
                fn($q) =>
                $q->whereHas(
                    'translations',
                    fn($qt) =>
                    $qt->where('name', 'like', "%{$this->search}%")
                )
            )
            ->latest()
            ->paginate(10);

        return view('livewire.admin.case-category.case-category-list', compact('caseCategories'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->reset(['names', 'isEdit', 'caseCategoryId']);

        if ($id) {
            $this->isEdit = true;
            $this->caseCategoryId = $id;
            $caseCategory = CaseCategory::with('translations')->findOrFail($id);

            foreach ($caseCategory->translations as $translation) {
                $this->names[$translation->locale] = $translation->name;
            }
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function saveCategory()
    {
        $this->validate();


        $caseCategory = $this->isEdit
            ? CaseCategory::findOrFail($this->caseCategoryId)
            : CaseCategory::create();

        foreach ($this->availableLocales as $code => $label) {
            CaseCategoryTranslation::updateOrCreate(
                [
                    'case_category_id' => $caseCategory->id,
                    'locale' => $code,
                ],
                [
                    'name' => $this->names[$code] ?? '',
                ]
            );
        }

        $this->dispatch('success', $this->isEdit ? 'Case category updated successfully!' : 'Case category created successfully!');

        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showConfirmModal = true;
    }

    public function deleteCategory()
    {
        if ($this->deleteId) {
            CaseCategory::find($this->deleteId)?->delete();
            $this->dispatch('success', 'Case category deleted successfully!');
        }

        $this->showConfirmModal = false;
        $this->deleteId = null;
    }
}
