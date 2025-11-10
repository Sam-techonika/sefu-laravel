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
        'tags',
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

    /**
     * Get tags as an array
     */
    public function getTagsArray()
    {
        if (empty($this->tags)) {
            return [];
        }
        
        return array_map('trim', explode(',', $this->tags));
    }

    /**
     * Set tags from an array
     */
    public function setTagsFromArray(array $tags)
    {
        $this->tags = implode(', ', array_filter(array_map('trim', $tags)));
    }

    /**
     * Check if translation has a specific tag
     */
    public function hasTag($tag)
    {
        return in_array(trim($tag), $this->getTagsArray());
    }
}
