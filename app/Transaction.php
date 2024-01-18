<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id',
        'customer_name',
        'total_price',
        'trans_date'
    ];

    protected $table = 'transactions';

    protected $guarded = [];
}
