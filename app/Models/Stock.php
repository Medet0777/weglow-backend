<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use CrudTrait;

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
