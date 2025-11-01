<?php

namespace App\Livewire\Admin\Service;

use Livewire\Component;
use App\Enums\LocaleType;
use App\Models\Service;
use App\Models\ServiceTranslation;
use Livewire\Attributes\Layout;

class UpdateService extends Component
{
    public $serviceId;
    public $locale = LocaleType::EN->value;
    public $title;
    public $slug;
    public $subtitle;
    public $description;
    public $overview;
    public $service_highlights = [];
    public $how_it_works = [];
    public $deliverables = [];
    public $faqs = [];

    public $service;

    public function mount($id, $locale = null)
    {
        $this->serviceId = $id;

        if ($locale && in_array($locale, LocaleType::values())) {
            $this->locale = $locale;
        } else {
            $this->locale = LocaleType::EN->value;
        }

        $this->service = Service::with(['translations'])->findOrFail($this->serviceId);

        $this->loadTranslationData();
        $this->ensureInitialization();
    }

    public function updatedTitle()
    {
        $this->slug = \Illuminate\Support\Str::slug($this->title);
    }

    private function loadTranslationData()
    {
        $translation = $this->service->translations()->where('locale', $this->locale)->first();

        if ($translation) {
            $this->title = $translation->title;
            $this->slug = $translation->slug;
            $this->subtitle = $translation->subtitle;
            $this->description = $translation->description;
            $this->overview = $translation->overview;
            $this->service_highlights = is_array($translation->service_highlights) ? $translation->service_highlights : [];
            $this->how_it_works = is_array($translation->how_it_works) ? $translation->how_it_works : [];
            $this->deliverables = is_array($translation->deliverables) ? $translation->deliverables : [];
            $this->faqs = is_array($translation->faqs) ? $translation->faqs : [];
        } else {
            $this->title = '';
            $this->slug = '';
            $this->subtitle = '';
            $this->description = '';
            $this->overview = '';
            $this->service_highlights = [];
            $this->how_it_works = [];
            $this->deliverables = [];
            $this->faqs = [];
        }
    }

    private function ensureInitialization()
    {
        if (empty($this->faqs) || count($this->faqs) === 0) {
            $this->faqs = [ ['question' => '', 'answer' => ''] ];
        }

        if (empty($this->service_highlights) || count($this->service_highlights) === 0) {
            $this->service_highlights = [ ['title' => ''] ];
        }

        if (empty($this->how_it_works) || count($this->how_it_works) === 0) {
            $this->how_it_works = [ ['title' => '', 'description' => ''] ];
        }

        if (empty($this->deliverables) || count($this->deliverables) === 0) {
            $this->deliverables = [ ['title' => ''] ];
        }
    }

    public function addFaq()
    {
        if (!is_array($this->faqs)) $this->faqs = [];
        $this->faqs[] = ['question' => '', 'answer' => ''];
    }

    public function removeFaq($index)
    {
        if (isset($this->faqs[$index])) {
            unset($this->faqs[$index]);
            $this->faqs = array_values($this->faqs);
        }

        if (empty($this->faqs)) $this->addFaq();
    }

    public function updatedLocale($locale)
    {
        $this->loadTranslationData();
        $this->ensureInitialization();
    }

    public function addHighlight()
    {
        if (!is_array($this->service_highlights)) $this->service_highlights = [];
        $this->service_highlights[] = ['title' => ''];
    }

    public function removeHighlight($index)
    {
        if (isset($this->service_highlights[$index])) {
            unset($this->service_highlights[$index]);
            $this->service_highlights = array_values($this->service_highlights);
        }

        if (empty($this->service_highlights)) $this->addHighlight();
    }

    public function addHowItWorks()
    {
        if (!is_array($this->how_it_works)) $this->how_it_works = [];
        $this->how_it_works[] = ['title' => '', 'description' => ''];
    }

    public function removeHowItWorks($index)
    {
        if (isset($this->how_it_works[$index])) {
            unset($this->how_it_works[$index]);
            $this->how_it_works = array_values($this->how_it_works);
        }

        if (empty($this->how_it_works)) $this->addHowItWorks();
    }

    public function addDeliverable()
    {
        if (!is_array($this->deliverables)) $this->deliverables = [];
        $this->deliverables[] = ['title' => ''];
    }

    public function removeDeliverable($index)
    {
        if (isset($this->deliverables[$index])) {
            unset($this->deliverables[$index]);
            $this->deliverables = array_values($this->deliverables);
        }

        if (empty($this->deliverables)) $this->addDeliverable();
    }

    protected function rules()
    {
        return [
            'locale' => 'required|string|in:' . implode(',', LocaleType::values()),
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
            'service_highlights' => 'nullable|array',
            'service_highlights.*.title' => 'required_with:service_highlights|string|max:255',
            'how_it_works' => 'nullable|array',
            'how_it_works.*.title' => 'required_with:how_it_works|string|max:255',
            'how_it_works.*.description' => 'nullable|string',
            'deliverables' => 'nullable|array',
            'deliverables.*.title' => 'required_with:deliverables|string|max:255',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'required_with:faqs.*.answer|string|max:500',
            'faqs.*.answer' => 'required_with:faqs.*.question|string|max:2000',
        ];
    }

    protected $messages = [
        'title.required' => 'Title is required.',
        'slug.required' => 'Slug is required.',
        'faqs.*.question.required_with' => 'Question is required when answer is provided.',
        'faqs.*.answer.required_with' => 'Answer is required when question is provided.',
    ];

    public function save()
    {
        $this->validate();

        try {
            \Illuminate\Support\Facades\DB::beginTransaction();

            $cleanFaqs = collect($this->faqs)
                ->filter(fn($f) => !empty($f['question']) || !empty($f['answer']))
                ->values()
                ->toArray();

            $cleanHighlights = collect($this->service_highlights)
                ->filter(fn($h) => !empty($h['title']))
                ->values()
                ->toArray();

            $cleanHow = collect($this->how_it_works)
                ->filter(fn($h) => !empty($h['title']) || !empty($h['description']))
                ->values()
                ->toArray();

            $cleanDeliver = collect($this->deliverables)
                ->filter(fn($d) => !empty($d['title']))
                ->values()
                ->toArray();

            $translationData = [
                'service_id' => $this->service->id,
                'locale' => $this->locale,
                'title' => $this->title,
                'slug' => $this->slug,
                'subtitle' => $this->subtitle,
                'description' => $this->description,
                'overview' => $this->overview,
                'service_highlights' => $cleanHighlights,
                'how_it_works' => $cleanHow,
                'deliverables' => $cleanDeliver,
                'faqs' => $cleanFaqs,
            ];

            ServiceTranslation::updateOrCreate(
                ['service_id' => $this->service->id, 'locale' => $this->locale],
                $translationData
            );

            \Illuminate\Support\Facades\DB::commit();

            session()->flash('message', 'Service translation saved successfully!');
            return redirect()->route('admin.services');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollback();
            session()->flash('error', 'An error occurred while saving: ' . $e->getMessage());
        }
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.service.update-service');
    }
}
