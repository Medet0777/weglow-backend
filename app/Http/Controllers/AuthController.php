<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AuthServiceContract;
use App\Http\Requests\Auth\CreateRequest;
use App\Http\Requests\Auth\VerifyRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    /**
     * @param CreateRequest $request
     * @param AuthServiceContract $service
     *
     * @return JsonResponse
     */
    public function sendOtp(CreateRequest $request, AuthServiceContract $service): JsonResponse
    {
        return $service->sendOtp($request);
    }

    /**
     * @param VerifyRequest $request
     * @param AuthServiceContract $service
     *
     * @return JsonResponse
     */
    public function verifyAndCreate(VerifyRequest $request, AuthServiceContract $service): JsonResponse
    {
        return $service->verifyAndCreate($request);
    }
}
