<?php

namespace App\Http\Controllers;

use App\Services\StockService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StockController extends Controller
{

    /**
     * @param Request $request
     * @param StockService $service
     *
     * @return JsonResponse
     */
    public function index(Request $request,StockService $service): JsonResponse
    {
        return $service->index($request);
    }
}
