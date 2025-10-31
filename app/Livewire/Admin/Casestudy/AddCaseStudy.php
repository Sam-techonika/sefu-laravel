<?php

namespace App\Livewire\Admin\Casestudy;

use App\Enums\LocaleType;
use App\Models\CaseStudy;
use App\Models\CaseStudyTranslation;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddCaseStudy extends Component
{
    public $locale = LocaleType::EN->value;
    public $title;
    public $slug;
    public $description;
    public $goals;
    public $challenges;
    public $results = [];

    public $caseStudy;

    public function mount($id)
    {
        $this->caseStudy = CaseStudy::with(['translations'])->find($id);

        if (!$this->caseStudy) {
            session()->flash('error', 'Case Study not found!');
            return redirect()->route('admin.case-studies');
        }

        // Check for locale parameter in query string
        if (request()->has('locale') && in_array(request('locale'), LocaleType::values())) {
            $this->locale = request('locale');
        }

        $this->loadTranslationData();
        $this->ensureInitialization();
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
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
        // Always ensure we have at least one section with points
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
        'results.*.section.required_with' => 'Section Content is required when points are provided.',
    ];

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            // Clean and filter results (sections with points)
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

            DB::commit();

            session()->flash('message', 'Case Study translation saved successfully for ' . strtoupper($this->locale) . '!');
            return redirect()->route('admin.case-studies.translations', ['id' => $this->caseStudy->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred while saving: ' . $e->getMessage());
        }
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.casestudy.add-case-study');
    }
}
