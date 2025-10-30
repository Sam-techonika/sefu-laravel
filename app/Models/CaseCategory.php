<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'is_active',
    ];

    /**
     * Get the translations for the case category.
     */
    public function translations()
    {
        return $this->hasMany(CaseCategoryTranslation::class);
    }
}
