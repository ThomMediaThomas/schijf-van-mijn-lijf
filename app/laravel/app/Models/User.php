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
        'birthdate',
        'weight',
        'length',
        'activity_level',
        'calories_average',
        'avatar'
    ];

    protected $with = [
        'current_program'
    ];

    /**
     * @return hasOne
     */
    public function current_program()
    {
        return $this->hasOne(Program::class)->latest();
    }

}
