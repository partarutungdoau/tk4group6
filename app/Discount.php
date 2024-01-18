<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'id',
        'name',
        'type',
        'amount',
        'status'
    ];

    protected $table = 'discounts';

    protected $guarded = [];
}
