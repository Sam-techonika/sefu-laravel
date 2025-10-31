<?php

namespace App\Livewire\Admin\Testimonial;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Testimonial;
use App\Models\TestimonialTranslation as TT;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class TestimonialTranslation extends Component
{
    use WithFileUploads;
    public $testimonialId;
    public $locale = 'en';
    public $content;
    public $gender;
    public $position;
    public $company;
    public $photo;
    public $photoFile; 
    public $address;
    public $editingTranslationId = null;
    public $translations = [];
    public $showModal = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'locale' => 'required|string|max:10',
        'content' => 'required|string',
        'photoFile' => 'nullable|image|max:5120', 
    ];

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.testimonial.testimonial-translation');
    }

    #[On('openTranslation')]
    public function open($id)
    {
        $this->resetFields();
        $this->testimonialId = $id;
        $t = Testimonial::with('translations')->findOrFail($id);
        $this->translations = $t->translations;
        $this->showModal = true;
    }

    public function saveTranslation()
    {
        $this->validate();

        $data = [
            'content' => $this->content,
            'gender' => $this->gender,
            'position' => $this->position,
            'company' => $this->company,
            'address' => $this->address,
        ];

        if ($this->photoFile) {
            $path = $this->photoFile->store('testimonials', 'public');
            $data['photo'] = $path;
        } elseif ($this->photo) {
            $data['photo'] = $this->photo;
        }

        if ($this->editingTranslationId) {
            $existing = TT::findOrFail($this->editingTranslationId);

            if ($this->photoFile && $existing->photo) {
                Storage::disk('public')->delete($existing->photo);
            }

            $existing->update(array_merge($data, ['locale' => $this->locale]));
        } else {
            TT::updateOrCreate(
                ['testimonial_id' => $this->testimonialId, 'locale' => $this->locale],
                $data
            );
        }

        $this->translations = TT::where('testimonial_id', $this->testimonialId)->get();
        $this->dispatch('success', 'Translation saved successfully.');
        $this->resetFields();
        $this->dispatch('testimonialUpdated');
        $this->showModal = false;
    }

    /**
     * Load an existing translation into the form for editing.
     * @param int $id
     * @return void
     */
    public function loadTranslation($id)
    {
        $t = TT::findOrFail($id);
        $this->editingTranslationId = $t->id;
        $this->locale = $t->locale;
        $this->content = $t->content;
        $this->gender = $t->gender;
        $this->position = $t->position;
        $this->company = $t->company;
        $this->photo = $t->photo; 
        $this->photoFile = null;
        $this->address = $t->address;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    private function resetFields()
    {
        $this->reset(['locale', 'content', 'gender', 'position', 'company', 'photo', 'photoFile', 'address', 'editingTranslationId']);
        $this->locale = 'en';
    }
}
