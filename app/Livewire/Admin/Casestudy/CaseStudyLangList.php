<?php

namespace App\Livewire\Admin\Casestudy;

use App\Enums\LocaleType;
use App\Models\CaseStudyTranslation;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CaseStudyLangList extends Component
{
    public $caseStudyId;
    public $caseStudyTranslations;

    public function mount($id)
    {
        $this->caseStudyId = $id;
        $this->loadCaseStudyTranslations();
    }

    public function loadCaseStudyTranslations()
    {
        $this->caseStudyTranslations = CaseStudyTranslation::with(['caseStudy'])
            ->where('case_study_id', $this->caseStudyId)
            ->whereIn('locale', LocaleType::values())
            ->get()
            ->keyBy('locale');
    }

    public function getLocales()
    {
        return LocaleType::cases();
    }

    public function getLocaleDisplayName($locale)
    {
        $localeEnum = LocaleType::fromValue($locale);
        return $localeEnum ? $localeEnum->getDisplayName() : $locale;
    }

    public function getLocaleFlagCode($locale)
    {
        $localeEnum = LocaleType::fromValue($locale);
        return $localeEnum ? $localeEnum->getFlagCode() : 'us';
    }

    public function getTotalLocalesCount()
    {
        return count(LocaleType::cases());
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.casestudy.case-study-lang-list');
    }
}
