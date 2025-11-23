<?php

namespace App\Contracts\Services;
use App\Http\Requests\Auth\CreateRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\VerifyRequest;
use Illuminate\Http\JsonResponse;

interface AuthServiceContract
{
    /**
     * @param CreateRequest $request
     *
     * @return JsonResponse
     */
    public function sendOtp(CreateRequest $request): JsonResponse;

    /**
     * @param VerifyRequest $request
     *
     * @return JsonResponse
     */
    public function verifyAndCreate(VerifyRequest $request): JsonResponse;

    /**
     * @param LoginRequest $request
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse;
}
