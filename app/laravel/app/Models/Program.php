<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'user_id',
        'goal_type',
        'preferred_weight',
        'calories_goal',
        'goal_duration',
        'start_date',
        'started'
    ];
}
