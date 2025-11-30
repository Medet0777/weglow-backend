<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = [
        'symbol',
        'name',
        'current_price',
        'logo_url',
        'open_price',
        'high_price',
        'low_price',
        'prev_close_price',
        'volume',
    ];

}
