<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AuthServiceContract;
use App\Http\Requests\Auth\CreateRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\EmailRequest;
use App\Http\Requests\Auth\PasswordResetRequest;
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

    /**
     * @param LoginRequest $request
     * @param AuthServiceContract $service
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request, AuthServiceContract $service): JsonResponse
    {
        return $service->login($request);
    }

    /**
     * @param EmailRequest $request
     * @param AuthServiceContract $service
     *
     * @return JsonResponse
     */
    public function sendOtpForPasswordReset(EmailRequest $request, AuthServiceContract $service): JsonResponse
    {
        return $service->sendOtpForPasswordReset($request);
    }

    /**
     * @param VerifyRequest $request
     * @param AuthServiceContract $service
     *
     * @return JsonResponse
     */
    public function verifyOtp(VerifyRequest $request, AuthServiceContract $service): JsonResponse
    {
        return $service->verifyOtp($request);
    }

    /**
     * @param PasswordResetRequest $request
     * @param AuthServiceContract $service
     *
     * @return JsonResponse
     */
    public function resetPassword(PasswordResetRequest $request, AuthServiceContract $service): JsonResponse
    {
        return $service->resetPassword($request);
    }
}
