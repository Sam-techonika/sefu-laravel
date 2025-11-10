<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'featured_image',
        'author',
        'is_active',
        'name',
        'category_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

    /**
     * Boot method to handle model events.
     */
    protected static function booted()
    {
        static::creating(function ($blog) {
            if (empty($blog->name)) {
                $lastBlog = self::withTrashed()->latest('id')->first();

                $nextNumber = $lastBlog ? ($lastBlog->id + 1) : 1;

                $blog->name = 'BlogPost ' . $nextNumber;
            }
        });
    }

    public function translations()
    {
        return $this->hasMany(BlogTranslation::class);
    }


    public function translation($locale = null)
    {
        return $this->hasOne(BlogTranslation::class)
            ->where('locale', $locale ?? app()->getLocale());
    }
        public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id');
    }

    public function category()
    {
        // Blog has a direct foreign key 'category_id' pointing to categories.id
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Scope to filter blogs by tag in their translations
     */
    public function scopeWithTag($query, $tag, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        
        return $query->whereHas('translations', function ($q) use ($tag, $locale) {
            $q->where('locale', $locale)
              ->where('tags', 'LIKE', '%' . $tag . '%');
        });
    }

    /**
     * Get all unique tags from translations for a specific locale
     */
    public static function getAllTags($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        
        $translations = BlogTranslation::where('locale', $locale)
            ->whereNotNull('tags')
            ->where('tags', '!=', '')
            ->pluck('tags');
            
        $allTags = [];
        foreach ($translations as $tagString) {
            if (!empty($tagString)) {
                $tags = array_map('trim', explode(',', $tagString));
                $allTags = array_merge($allTags, $tags);
            }
        }
        
        return array_unique(array_filter($allTags));
    }

    /**
     * Get related blogs based on similar tags
     */
    public function getRelatedByTags($locale = null, $limit = 3)
    {
        $locale = $locale ?? app()->getLocale();
        
        // Get current blog's tags
        $currentTranslation = $this->translation($locale);
        if (!$currentTranslation || !$currentTranslation->tags) {
            return collect([]);
        }
        
        $currentTags = array_map('trim', explode(',', $currentTranslation->tags));
        if (empty($currentTags)) {
            return collect([]);
        }
        
        // Find blogs with similar tags
        $relatedBlogs = self::where('id', '!=', $this->id)
            ->where('is_active', true)
            ->whereHas('translations', function($q) use ($locale, $currentTags) {
                $q->where('locale', $locale);
                foreach ($currentTags as $tag) {
                    $q->orWhere('tags', 'LIKE', '%' . $tag . '%');
                }
            })
            ->with(['translations' => function($q) use ($locale) {
                $q->where('locale', $locale);
            }])
            ->take($limit)
            ->get();
            
        return $relatedBlogs;
    }
}
