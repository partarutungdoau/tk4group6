<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_p extends Model
{
    protected $fillable = [
        'transaction',
        'id_product',
        'product_name',
        'quantity',
        'price',
        'sub_total'
    ];

    protected $table = 'transaction_ps';

    protected $guarded = [];
}
