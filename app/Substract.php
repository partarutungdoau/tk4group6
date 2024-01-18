<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substract extends Model
{
    protected $fillable = [
        'quantity',
        'category',
        'product',
        'description',
        'substract_date'
    ];

    protected $table = 'substracts';

    protected $guarded = [];
}
