<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
        'gender',
        'calories_goal',
        'calories_average',
    ];
}
