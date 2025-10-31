<?php

namespace App\Livewire\Public;

use App\Models\CaseStudyTranslation;
use Livewire\Component;

class CaseStudyView extends Component
{
    public $caseStudy;
    public $translation;
    public $title;
    public $description;
    public $goals;
    public $challenges;
    public $results = [];
    public $clientName;
    public $projectName;
    public $categoryName;
    public $image;
    public $publishDate;

    public function mount($slug = null)
    {
        $locale = app()->getLocale() ?? 'en';

        if ($slug) {
            // Find translation by slug
            $this->translation = CaseStudyTranslation::where('slug', $slug)
                ->with(['caseStudy.category.translations'])
                ->firstOrFail();

            // Check if locale matches
            if ($locale !== $this->translation->locale) {
                // Try to find translation in the requested locale
                $localeTranslation = CaseStudyTranslation::where('case_study_id', $this->translation->case_study_id)
                    ->where('locale', $locale)
                    ->first();
                
                if (!$localeTranslation) {
                    abort(404);
                } else {
                    return redirect()->route('case.study.view', ['slug' => $localeTranslation->slug, 'locale' => $locale]);
                }
            }

            $this->caseStudy = $this->translation->caseStudy;

            // Set properties from translation
            $this->title = $this->translation->title;
            $this->description = $this->translation->description;
            $this->goals = $this->translation->goals;
            $this->challenges = $this->translation->challenges;
            $this->results = is_array($this->translation->results) ? $this->translation->results : [];

            // Set properties from case study
            $this->clientName = $this->caseStudy->client_name;
            $this->projectName = $this->caseStudy->project_name;
            $this->image = $this->caseStudy->image;
            $this->publishDate = optional($this->caseStudy->created_at)->format('d F, Y');
            
            // Set category name
            if ($this->caseStudy->category && $this->caseStudy->category->translations->isNotEmpty()) {
                $categoryTranslation = $this->caseStudy->category->translations->where('locale', $locale)->first();
                $this->categoryName = $categoryTranslation ? $categoryTranslation->name : null;
            }
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.public.case-study-view');
    }
}
