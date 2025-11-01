<?php

namespace App\Livewire\Admin\Service;

use Livewire\Component;
use App\Enums\LocaleType;
use App\Models\ServiceTranslation;
use Livewire\Attributes\Layout;

class ServiceLangList extends Component
{
    public $serviceId;
    public $serviceTranslations;

    public function mount($id)
    {
        $this->serviceId = $id;
        $this->loadTranslations();
    }

    public function loadTranslations()
    {
        $this->serviceTranslations = ServiceTranslation::with(['service'])
            ->where('service_id', $this->serviceId)
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
        return view('livewire.admin.service.service-lang-list');
    }
}
