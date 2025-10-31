<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'client_name',
        'project_name',
        'case_category_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the translations for the case study.
     */
    public function translations()
    {
        return $this->hasMany(CaseStudyTranslation::class);
    }

    /**
     * Get the category that owns the case study.
     */
    public function category()
    {
        return $this->belongsTo(CaseCategory::class, 'case_category_id');
    }
}
