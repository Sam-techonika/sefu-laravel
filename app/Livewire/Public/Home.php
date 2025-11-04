<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Testimonial;

class Home extends Component
{
    public $testimonials = [];

    public function mount(){
        $locale = app()->getLocale() ?? 'en';

        $this->testimonials = Testimonial::where('is_homepage', true)
            ->where('is_active', true)
            ->with(['translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->get()
            ->filter(function ($testimonial) {
                return $testimonial->translations->isNotEmpty();
            })
            ->map(function ($testimonial) {
                $translation = $testimonial->translations->first();
                return [
                    'name' => $testimonial->name,
                    'content' => $translation->content ?? '',
                    'position' => $translation->position ?? '',
                    'company' => $translation->company ?? '',
                    'photo' => $translation->photo ?? 'assets/img/testimonial/07.png',
                    'address' => $translation->address ?? '',
                ];
            });
    }

    #[Title('Home')]
    public function render()
    {
        return view('livewire.public.home');
    }
}
