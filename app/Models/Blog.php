<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     protected $fillable = [
        'title', 'featured_image', 'at_glance', 'introduction', 
        'main_content', 'key_takeaways', 'faqs', 'author', 
        'category_id', 'locale'
    ];

    protected $casts = [
        'title' => 'array',
        'featured_image' => 'array',
        'at_glance' => 'array',
        'introduction' => 'array',
        'main_content' => 'array',
        'key_takeaways' => 'array',
        'faqs' => 'array',
        'author' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags');
    }

    public function scopeLocale($query, $locale)
    {
        return $query->where('locale', $locale);
    }
}
