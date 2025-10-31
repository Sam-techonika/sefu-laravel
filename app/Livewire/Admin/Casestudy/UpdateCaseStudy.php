<?php

namespace App\Livewire\Admin\Casestudy;

use App\Enums\LocaleType;
use App\Models\CaseStudy;
use App\Models\CaseStudyTranslation;
use Livewire\Component;
use Livewire\Attributes\Layout;

class UpdateCaseStudy extends Component
{
    public $caseStudyId;
    public $locale = LocaleType::EN->value;
    public $title;
    public $slug;
    public $description;
    public $goals;
    public $challenges;
    public $results = [];

    public $caseStudy;

    public function mount($id, $locale = null)
    {
        $this->caseStudyId = $id;

        // Validate and set locale using enum
        if ($locale && in_array($locale, LocaleType::values())) {
            $this->locale = $locale;
        } else {
            $this->locale = LocaleType::EN->value;
        }

        $this->caseStudy = CaseStudy::with(['translations'])->findOrFail($this->caseStudyId);

        $this->loadTranslationData();
        $this->ensureInitialization();
    }

    public function updatedTitle()
    {
        $this->slug = \Illuminate\Support\Str::slug($this->title);
    }

    private function loadTranslationData()
    {
        $translation = $this->caseStudy->translations()->where('locale', $this->locale)->first();

        if ($translation) {
            $this->title = $translation->title;
            $this->slug = $translation->slug;
            $this->description = $translation->description;
            $this->goals = $translation->goals;
            $this->challenges = $translation->challenges;
            $this->results = is_array($translation->results) ? $translation->results : [];
        } else {
            $this->title = '';
            $this->slug = '';
            $this->description = '';
            $this->goals = '';
            $this->challenges = '';
            $this->results = [];
        }
    }

    private function ensureInitialization()
    {
        // Always ensure we have at least one result with section and points
        if (empty($this->results) || count($this->results) === 0) {
            $this->results = [
                ['section' => '', 'points' => ['']]
            ];
        }
    }

    public function addResult()
    {
        if (!is_array($this->results)) {
            $this->results = [];
        }

        $this->results[] = ['section' => '', 'points' => ['']];
    }

    public function removeResult($index)
    {
        if (isset($this->results[$index])) {
            unset($this->results[$index]);
            $this->results = array_values($this->results);
        }

        if (empty($this->results)) {
            $this->addResult();
        }
    }

    public function addPoint($resultIndex)
    {
        if (isset($this->results[$resultIndex])) {
            if (!is_array($this->results[$resultIndex]['points'])) {
                $this->results[$resultIndex]['points'] = [];
            }
            $this->results[$resultIndex]['points'][] = '';
        }
    }

    public function removePoint($resultIndex, $pointIndex)
    {
        if (isset($this->results[$resultIndex]['points'][$pointIndex])) {
            unset($this->results[$resultIndex]['points'][$pointIndex]);
            $this->results[$resultIndex]['points'] = array_values($this->results[$resultIndex]['points']);
        }

        if (empty($this->results[$resultIndex]['points'])) {
            $this->results[$resultIndex]['points'] = [''];
        }
    }

    public function updatedLocale($locale)
    {
        $this->loadTranslationData();
        $this->ensureInitialization();
    }

    protected function rules()
    {
        return [
            'locale' => 'required|string|in:' . implode(',', LocaleType::values()),
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'goals' => 'nullable|string',
            'challenges' => 'nullable|string',
            'results' => 'nullable|array',
            'results.*.section' => 'required_with:results.*.points|string|max:255',
            'results.*.points' => 'nullable|array',
            'results.*.points.*' => 'nullable|string|max:1000',
        ];
    }

    protected $messages = [
        'title.required' => 'Title is required.',
        'slug.required' => 'Slug is required.',
    ];

    public function save()
    {
        $this->validate();

        try {
            \Illuminate\Support\Facades\DB::beginTransaction();

            // Clean and filter results
            $cleanedResults = [];
            if (is_array($this->results)) {
                foreach ($this->results as $result) {
                    if (isset($result['section']) && !empty(trim($result['section']))) {
                        $cleanedPoints = [];
                        if (isset($result['points']) && is_array($result['points'])) {
                            foreach ($result['points'] as $point) {
                                if (!empty(trim($point))) {
                                    $cleanedPoints[] = trim($point);
                                }
                            }
                        }
                        if (!empty($cleanedPoints)) {
                            $cleanedResults[] = [
                                'section' => trim($result['section']),
                                'points' => $cleanedPoints
                            ];
                        }
                    }
                }
            }

            CaseStudyTranslation::updateOrCreate(
                [
                    'case_study_id' => $this->caseStudy->id,
                    'locale' => $this->locale,
                ],
                [
                    'title' => $this->title,
                    'slug' => $this->slug,
                    'description' => $this->description,
                    'goals' => $this->goals,
                    'challenges' => $this->challenges,
                    'results' => $cleanedResults,
                ]
            );

            \Illuminate\Support\Facades\DB::commit();

            session()->flash('message', 'Case Study translation updated successfully for ' . strtoupper($this->locale) . '!');
            return redirect()->route('admin.case-studies.translations', ['id' => $this->caseStudy->id]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            session()->flash('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.casestudy.update-case-study');
    }
}
