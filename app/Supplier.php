<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email'
    ];

    protected $table = 'suppliers';

    protected $guarded = [];
}
