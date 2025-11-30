<?php

namespace App\Services;

use App\Contracts\Services\StockServiceContract;
use App\Models\Stock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StockService implements StockServiceContract
{

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', 20);
        $page = $request->query('page', 1);

        $stocksQuery = Stock::select('symbol', 'name', 'current_price')
            ->whereNotNull('current_price')
            ->where('current_price', '>', 0)
            ->orderBy('symbol');

        $stocks = $stocksQuery->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'current_page' => $stocks->currentPage(),
            'per_page' => $stocks->perPage(),
            'total' => $stocks->total(),
            'last_page' => $stocks->lastPage(),
            'data' => $stocks->items(),
        ]);
    }
}
