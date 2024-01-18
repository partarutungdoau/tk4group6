<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product',
        'quantity',
        'price',
        'discount_price'
    ];

    protected $table = 'carts';

    protected $guarded = [];
}