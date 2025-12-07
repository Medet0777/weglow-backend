<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockHolding extends Model
{
    protected $fillable = [
        'stock_id',
        'symbol',
        'amount',
    ];
}
