<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_order extends Model
{
    protected $fillable = [
        'id',
        'products',
        'categories',
        'suppliers',
        'quantity',
        'buy_price',
        'total_price',
        'status',
        'order_date',
        'receive_date'
    ];

    protected $table = 'purchase_orders';

    protected $guarded = [];
}
