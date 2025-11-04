<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Service as ServiceModel;
use App\Enums\LocaleType;

class Service extends Component
{
    #[Title('Our Services')]
    public function render()
    {
        $locale = app()->getLocale() ?? LocaleType::EN->value;

        $services = ServiceModel::where('is_active', true)
            ->with(['translations' => function($q) use ($locale) {
                $q->where('locale', $locale);
            }])
            ->latest()
            ->get()
            ->filter(function($service) use ($locale) {
                return $service->translations->where('locale', $locale)->isNotEmpty();
            });

        return view('livewire.public.service', compact('services'));
    }
}
