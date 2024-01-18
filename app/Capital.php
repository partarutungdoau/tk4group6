<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    protected $fillable = [
        'tanggal',
        'start_capital',
    ];

    protected $table = 'capitals';

    protected $guarded = [];
}
