<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudyTranslation extends Model
{
    protected $fillable = [
        'case_study_id',
        'locale',
        'title',
        'slug',
        'description',
        'goals',
        'challenges',
        'results',
    ];

    protected $casts = [
        'results' => 'array',
    ];

    /**
     * Get the case study that owns the translation.
     */
    public function caseStudy()
    {
        return $this->belongsTo(CaseStudy::class);
    }
}
