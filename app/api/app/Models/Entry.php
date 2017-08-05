<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'user_id',
        'entry_date',
        'product_id',
        'portion_id',
        'daypart_id',
        'type',
        'amount',
        'meal_id',
        'name',
        'calories'
    ];

    protected $with = [
        'product',
        'meal',
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
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    /**
     * @return HasMany
     */
    public function portion()
    {
        return $this->belongsTo(Portion::class);
    }
}
