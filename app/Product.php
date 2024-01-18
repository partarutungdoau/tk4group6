<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'categories',
        'stock',
        'buy_price',
        'sell_price',
        'description'
    ];

    protected $table = 'products';

    protected $guarded = [];
}
