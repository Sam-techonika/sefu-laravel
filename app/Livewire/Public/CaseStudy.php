<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Title;
use App\Models\CaseStudy as CaseStudyModel;
use Livewire\Component;

class CaseStudy extends Component
{
    public $caseStudies = [];

    public function mount()
    {
        $locale = app()->getLocale() ?? 'en';

        // Load active case studies with translations for current locale
        $this->caseStudies = CaseStudyModel::where('is_active', true)
            ->with([
                'translations' => function ($query) use ($locale) {
                    $query->where('locale', $locale);
                },
                'category.translations' => function ($query) use ($locale) {
                    $query->where('locale', $locale);
                }
            ])
            ->get()
            ->filter(function ($caseStudy) {
                return $caseStudy->translations->isNotEmpty();
            })
            ->map(function ($caseStudy) {
                $translation = $caseStudy->translations->first();
                $categoryName = null;
                if ($caseStudy->category && $caseStudy->category->translations->isNotEmpty()) {
                    $categoryTranslation = $caseStudy->category->translations->first();
                    $categoryName = $categoryTranslation->name;
                }
                return [
                    'id' => $caseStudy->id,
                    'slug' => $translation->slug,
                    'title' => $translation->title,
                    'description' => $translation->description,
                    'image' => $caseStudy->image,
                    'client_name' => $caseStudy->client_name,
                    'project_name' => $caseStudy->project_name,
                    'category_name' => $categoryName,
                ];
            });
    }

    #[Title('Case Studies')]
    public function render()
    {
        return view('livewire.public.case-study');
    }
}
