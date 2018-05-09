<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'calories',
        'subcategory_id',
        'brand_id',
        'proteins',
        'carbs',
        'fats',
        'user_id'
    ];

    protected $with = [
        'subcategory',
        'brand',
        'portions',
        'user'
    ];

    /**
     * @return HasMany
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
     * @return HasMany
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return HasMany
     */
    public function portions()
    {
        return $this->hasMany(Portion::class);
    }

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
