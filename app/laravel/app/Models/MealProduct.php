<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealProduct extends Model
{
    protected $fillable = [
        'user_id',
        'meal_id',
        'product_id',
        'portion_id',
        'amount'
    ];

    protected $with = [
        'product',
        'portion'
    ];

    /**
     * @return HasMany
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return HasMany
     */
    public function portion()
    {
        return $this->belongsTo(Portion::class);
    }
}
