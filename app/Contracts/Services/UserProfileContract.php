<?php

namespace App\Contracts\Services;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface UserProfileContract
{
    /**
     * @return JsonResponse
     */
    public function show(): JsonResponse;
}
