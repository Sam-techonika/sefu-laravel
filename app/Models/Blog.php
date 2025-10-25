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
        return $this->hasOneThrough(
            Category::class,
            BlogTranslation::class,
            'blog_id',     // Foreign key on blog_translations table
            'id',          // Local key on categories table
            'id',          // Local key on blogs table
            'category_id'  // Foreign key on blog_translations table
        );
    }
}
