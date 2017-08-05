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
        'products'
    ];

    /**
     * @return hasMany
     */
    public function products()
    {
        return $this->hasMany(MealProduct::class);
    }
}
