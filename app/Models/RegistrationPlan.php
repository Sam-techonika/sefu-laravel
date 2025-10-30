<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationPlan extends Model
{
     use HasFactory;

    protected $fillable = ['registration_id', 'name','price','features'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
