<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Faq as FaqModel;
use App\Helpers\LocaleHelper;

class Faq extends Component
{
    public $searchQuery = '';
    public $locale;
    public $faqs;

    public function mount()
    {
        $this->locale = app()->getLocale();
        $this->loadFaqs();
    }

    public function loadFaqs()
    {
        $query = FaqModel::with(['translations' => function ($query) {
            $query->where('locale', $this->locale);
        }])
        ->where('is_active', true);

        if (!empty($this->searchQuery)) {
            $query->whereHas('translations', function ($q) {
                $q->where('locale', $this->locale)
                  ->where(function ($subQ) {
                      $subQ->where('question', 'like', '%' . $this->searchQuery . '%')
                           ->orWhere('answer', 'like', '%' . $this->searchQuery . '%');
                  });
            });
        }

        $this->faqs = $query->get()->map(function ($faq) {
            $translation = $faq->translations->first();
            if ($translation) {
                $faq->question = $translation->question;
                $faq->answer = $translation->answer;
            }
            return $faq;
        })->filter(function ($faq) {
            return isset($faq->question) && isset($faq->answer);
        });
    }

    public function updatedSearchQuery()
    {
        $this->loadFaqs();
    }

    public function search()
    {
        $this->loadFaqs();
    }

    public function render()
    {
        return view('livewire.public.faq');
    }
}
