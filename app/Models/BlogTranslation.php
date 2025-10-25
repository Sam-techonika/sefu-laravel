<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
      protected $fillable = [
        'blog_id',
        'locale',
        'slug',
        'category_id',
        'title',
        'at_glance',
        'introduction',
        'main_content',
        'key_takeaways',
        'faqs',
    ];

    protected $casts = [
        'main_content' => 'array',
        'faqs' => 'array',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
