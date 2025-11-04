<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Livewire\Component;
use Livewire\WithPagination;
use App\Enums\LocaleType;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class CategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search = '';
    public $showModal = false;
    public $showConfirmModal = false;
    public $isEdit = false;

    public $categoryId;
    public $deleteId;
    public $names = [];

    public $availableLocales = [];

    protected $rules = [
        'names.en' => 'required|string',
        'names.hi' => 'required|string',
    ];

    public function mount()
    {
        $this->availableLocales = LocaleType::options();
    }

    #[Layout('components.layouts.admin')]
    #[Title('Categories')]
    public function render()
    {
        $categories = Category::with('translations')
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

        return view('livewire.admin.category.category-list', compact('categories'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->reset(['names', 'isEdit', 'categoryId']);

        if ($id) {
            $this->isEdit = true;
            $this->categoryId = $id;
            $category = Category::with('translations')->findOrFail($id);

            foreach ($category->translations as $translation) {
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


        $category = $this->isEdit
            ? Category::findOrFail($this->categoryId)
            : Category::create();

        foreach ($this->availableLocales as $code => $label) {
            CategoryTranslation::updateOrCreate(
                [
                    'category_id' => $category->id,
                    'locale' => $code,
                ],
                [
                    'name' => $this->names[$code] ?? '',
                ]
            );
        }

        $this->dispatch('success', $this->isEdit ? 'Category updated successfully!' : 'Category created successfully!');

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
            Category::find($this->deleteId)?->delete();
            $this->dispatch('success', 'Category deleted successfully!');
        }

        $this->showConfirmModal = false;
        $this->deleteId = null;
    }
}
