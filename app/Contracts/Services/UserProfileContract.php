<?php

namespace App\Contracts\Services;
use App\Http\Requests\UserProfile\UpdateRequest;
use Illuminate\Http\JsonResponse;

interface UserProfileContract
{
    /**
     * @return JsonResponse
     */
    public function show(): JsonResponse;

    /**
     * @param UpdateRequest $request
     *
     * @return JsonResponse
     */
    public function update(UpdateRequest $request): JsonResponse;
}
