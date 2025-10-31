<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'is_homepage',
        'is_active',
    ];

    protected $casts = [
        'is_homepage' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(TestimonialTranslation::class);
    }

    /**
     * Return the translation model for the current app locale.
     * Falls back to 'en' or the first available translation.
     */
    public function getTranslationAttribute()
    {
        $locale = app()->getLocale() ?: 'en';

        // If translations relationship is already loaded (eager loaded), use the collection
        if ($this->relationLoaded('translations')) {
            $translation = $this->translations->firstWhere('locale', $locale);
            if ($translation) {
                return $translation;
            }
            // fallback to english
            $translation = $this->translations->firstWhere('locale', 'en');
            return $translation ?? $this->translations->first();
        }

        // Not loaded: query for the translation directly
        $translation = $this->translations()->where('locale', $locale)->first();
        if ($translation) {
            return $translation;
        }

        $translation = $this->translations()->where('locale', 'en')->first();
        return $translation ?: $this->translations()->first();
    }
}
