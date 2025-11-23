<?php

namespace App\Services;

use App\Contracts\Services\AuthServiceContract;
use App\Http\Requests\Auth\CreateRequest;
use Illuminate\Http\JsonResponse;

class AuthService implements AuthServiceContract
{

    public function create(CreateRequest $request): JsonResponse
    {
        // TODO: Implement create() method.
    }
}
