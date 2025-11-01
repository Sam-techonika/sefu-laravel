<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\ServiceTranslation;
use App\Models\Service;

class ServiceView extends Component
{
    public $serviceId;
    public $title;
    public $subtitle;
    public $coverImage;
    public $description;
    public $overview;
    public $serviceHighlights = [];
    public $howItWorks = [];
    public $deliverables = [];
    public $faqs = [];

    public function mount($slug = null)
    {
        $locale = app()->getLocale() ?? abort(404);

        if ($slug) {
            $translation = ServiceTranslation::where('slug', $slug)
                ->with(['service'])
                ->firstOrFail();

            // If locale doesn't match, try to find translation in current locale
            if ($locale !== $translation->locale) {
                $translation = ServiceTranslation::where('service_id', $translation->service_id)
                    ->where('locale', $locale)
                    ->first();
                if (!$translation) {
                    return abort(404);
                } else {
                    return redirect()->route('service.view', ['slug' => $translation->slug, 'locale' => $locale]);
                }
            }

            $this->serviceId = $translation->service_id;
            $this->title = $translation->title ?? 'Service';
            $this->subtitle = $translation->subtitle ?? '';
            $this->description = $translation->description ?? '';
            $this->overview = $translation->overview ?? '';
            $this->coverImage = $translation->service->image 
                ? asset('storage/' . $translation->service->image) 
                : asset('assets/img/ai/ai1.svg');

            // Normalize arrays
            $this->serviceHighlights = $this->normalizeArray($translation->service_highlights);
            $this->howItWorks = $this->normalizeArray($translation->how_it_works);
            $this->deliverables = $this->normalizeArray($translation->deliverables);
            $this->faqs = $this->normalizeFaqs($translation->faqs);
        } else {
            abort(404);
        }
    }

    /**
     * Normalize array data from JSON
     */
    protected function normalizeArray($data)
    {
        if (is_array($data)) {
            return $data;
        }

        if (is_string($data)) {
            $decoded = json_decode($data, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $decoded;
            }
        }

        return [];
    }

    /**
     * Normalize FAQs to ensure consistent structure
     */
    protected function normalizeFaqs($data)
    {
        $raw = $this->normalizeArray($data);
        
        return array_map(function($item) {
            if (is_array($item)) {
                return [
                    'question' => $item['question'] ?? ($item['q'] ?? ''),
                    'answer' => $item['answer'] ?? ($item['a'] ?? ''),
                ];
            }
            return ['question' => '', 'answer' => ''];
        }, $raw);
    }

    public function render()
    {
        return view('livewire.public.service-view');
    }
}
