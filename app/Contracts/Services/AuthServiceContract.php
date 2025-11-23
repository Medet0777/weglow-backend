<?php

namespace App\Contracts\Services;
use App\Http\Requests\Auth\CreateRequest;
use Illuminate\Http\JsonResponse;

interface AuthServiceContract
{
    /**
     * @param CreateRequest $request
     *
     * @return JsonResponse
     */
    public function create(CreateRequest $request): JsonResponse;
}
