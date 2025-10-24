<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function translations(){
        return $this->hasMany(TagTranslation::class);
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tags');
    }
}
