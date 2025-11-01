<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    protected $fillable = [
        'service_id',
        'locale',
        'title',
        'slug',
        'subtitle',
        'description',
        'overview',
        'service_highlights',
        'how_it_works',
        'deliverables',
        'faqs',
    ];

    protected $casts = [
        'service_highlights' => 'array',
        'how_it_works' => 'array',
        'deliverables' => 'array',
        'faqs' => 'array',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

