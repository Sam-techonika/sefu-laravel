<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\ServiceTranslation;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Boot method to set default name if missing (similar to Blog)
     */
    protected static function booted()
    {
        static::creating(function ($service) {
            if (empty($service->name)) {
                $last = self::withTrashed()->latest('id')->first();
                $next = $last ? ($last->id + 1) : 1;
                $service->name = 'Service ' . $next;
            }
        });
    }

    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class);
    }

    public function translation($locale = null)
    {
        return $this->hasOne(ServiceTranslation::class)
            ->where('locale', $locale ?? app()->getLocale());
    }
}
