<?php

namespace App\Contracts\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface StockServiceContract
{

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse;
}
