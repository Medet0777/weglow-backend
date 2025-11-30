<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\JsonResponse;

class StockController extends Controller
{
    public function index(): JsonResponse
    {
        $stocks = Stock::select('symbol', 'current_price')->get();
        return response()->json($stocks);
    }
}
