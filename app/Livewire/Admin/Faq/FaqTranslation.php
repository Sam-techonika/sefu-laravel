<?php

namespace App\Livewire\Admin\Faq;

use Livewire\Component;
use App\Models\Faq;
use App\Models\FaqTranslation as FaqT;
use App\Enums\LocaleType;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class FaqTranslation extends Component
{
    public $faqId;
    public $locale = 'en';
    public $question;
    public $answer;
    public $translations = [];
    public $showModal = false;

    protected $rules = [
        'locale' => 'required|string|max:10',
        'question' => 'required|string',
        'answer' => 'required|string',
    ];

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.faq.faq-translation');
    }

    #[On('openTranslation')]
    public function open($id)
    {
        $this->resetFields();
        $this->faqId = $id;
        $faq = Faq::with('translations')->findOrFail($id);
        $this->translations = $faq->translations;
        $this->showModal = true;
    }

    public function saveTranslation()
    {
        $this->validate();

        FaqT::updateOrCreate(
            ['faq_id' => $this->faqId, 'locale' => $this->locale],
            ['question' => $this->question, 'answer' => $this->answer]
        );

        $this->translations = FaqT::where('faq_id', $this->faqId)->get();
        session()->flash('message', 'Translation saved successfully.');
        $this->resetFields();
        $this->dispatch('faqUpdated');
        $this->showModal = false;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    private function resetFields()
    {
        $this->reset(['locale', 'question', 'answer']);
        $this->locale = 'en';
    }
}
