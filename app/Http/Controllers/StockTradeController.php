<?php

// app/Http/Controllers/StockTradeController.php

namespace App\Http\Controllers;

use App\Models\StockHolding;
use Illuminate\Http\Request;

class StockTradeController extends Controller
{
    public function trade(Request $request)
    {
        $request->validate([
            'stock_id' => 'required|integer',
            'symbol'   => 'required|string',
            'action'   => 'required|string', // buy, sell, hold
        ]);

        $stockId = $request->stock_id;
        $symbol = $request->symbol;
        $action = strtolower($request->action);

        // получаем текущее состояние
        $holding = StockHolding::firstOrCreate(
            ['stock_id' => $stockId, 'symbol' => $symbol],
            ['amount' => 0]
        );

        if ($action === 'buy') {
            $holding->amount += 1;
        } elseif ($action === 'sell') {
            if ($holding->amount > 0) {
                $holding->amount -= 1;
            }
        } elseif ($action === 'hold') {
            // ничего не делаем
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid action'
            ], 400);
        }

        $holding->save();

        return response()->json([
            'status' => 'success',
            'data' => $holding
        ]);
    }

    public function index()
    {
        $holdings = StockHolding::where('amount', '>', 0)->get();

        return response()->json([
            'status' => 'success',
            'data' => $holdings,
        ]);
    }
}
