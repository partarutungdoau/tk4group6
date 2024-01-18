<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'categories_name',
    ];

    protected $table = 'categories';

    protected $guarded = [];
}
