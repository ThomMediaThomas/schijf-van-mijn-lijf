<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'user_id',
        'name'
    ];

    protected $with = [
        'products',
        'user'
    ];

    /**
     * @return hasMany
     */
    public function products()
    {
        return $this->hasMany(MealProduct::class);
    }

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
