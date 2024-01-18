<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount_p extends Model
{
    protected $fillable = [
        'product_id',
        'discount_id'
    ];

    protected $table = 'discount_ps';

    protected $guarded = [];
}
