<?php

namespace App\Livewire\Public;

use App\Models\Testimonial as TestimonialModel;
use Livewire\Component;

class Testimonial extends Component
{
    public function render()
    {
        // Get all active testimonials with their translations, ordered randomly
        $testimonials = TestimonialModel::with('translations')
            ->where('is_active', true)
            ->inRandomOrder()
            ->get();

        return view('livewire.public.testimonial', [
            'testimonials' => $testimonials
        ]);
    }
}
