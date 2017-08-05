<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $with = [
        'category'
    ];

    /**
     * @return HasMany
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
