<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRegistration extends Model
{
       protected $fillable = [
        'registration_id',
        'registration_plan_id',
        'plan_name',
        'name',
        'email',
        'phone',
        'is_processed',
    ];
}
