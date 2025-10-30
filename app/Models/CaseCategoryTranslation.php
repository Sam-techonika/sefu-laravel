<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseCategoryTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'case_category_id',
        'locale',
        'name',
    ];

    /**
     * Get the case category that owns this translation.
     */
    public function caseCategory()
    {
        return $this->belongsTo(CaseCategory::class);
    }
}
