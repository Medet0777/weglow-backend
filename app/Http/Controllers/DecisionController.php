<?php

namespace App\Http\Controllers;

use App\Models\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'stock_id' => 'required|integer',
            'symbol'   => 'required|string',
            'decision' => 'required|string'
        ]);

        $decision = Decision::create([
            'stock_id' => $request->stock_id,
            'symbol'   => $request->symbol,
            'decision' => $request->decision,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $decision
        ]);
    }

    public function index()
    {
        return Decision::latest()->get();
    }

    public function show($stockId)
    {
        $decision = Decision::where('stock_id', $stockId)->latest()->first();

        if (!$decision) {
            return response()->json([
                'status' => 'error',
                'message' => 'Decision not found for this stock'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $decision
        ]);
    }
}
