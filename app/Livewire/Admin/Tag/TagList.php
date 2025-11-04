<?php

namespace App\Livewire\Admin\Tag;

use App\Models\Tag;
use App\Models\TagTranslation;
use Livewire\Component;
use Livewire\WithPagination;
use App\Enums\LocaleType;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class TagList extends Component
{
    use WithPagination;
        protected $paginationTheme = 'bootstrap';


    public $search = '';
    public $showModal = false;
    public $showConfirmModal = false;
    public $isEdit = false;

    public $tagId;
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
    #[Title('Tags')]
    public function render()
    {
        $tags = Tag::with('translations')
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

        return view('livewire.admin.tag.tag-list', compact('tags'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->reset(['names', 'isEdit', 'tagId']);

        if ($id) {
            $this->isEdit = true;
            $this->tagId = $id;
            $tag = Tag::with('translations')->findOrFail($id);
            foreach ($tag->translations as $translation) {
                $this->names[$translation->locale] = $translation->name;
            }
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function saveTag()
    {
        $this->validate();

        $tag = $this->isEdit
            ? Tag::findOrFail($this->tagId)
            : Tag::create();

        foreach ($this->availableLocales as $code => $label) {
            TagTranslation::updateOrCreate(
                ['tag_id' => $tag->id, 'locale' => $code],
                ['name' => $this->names[$code] ?? '']
            );
        }
        $this->dispatch('success', $this->isEdit ? 'Tag updated successfully!' : 'Tag created successfully!');
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showConfirmModal = true;
    }

    public function deleteTag()
    {
        if ($this->deleteId) {
            Tag::find($this->deleteId)?->delete();
            $this->dispatch('success', 'Tag deleted successfully!');
        }
        $this->showConfirmModal = false;
        $this->deleteId = null;
    }
}
