<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portion extends Model
{
    protected $fillable = [
        'name',
        'unit',
        'size',
        'product_id'
    ];
}
