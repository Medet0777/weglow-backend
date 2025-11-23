<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    /**
     * @param CreateRequest $request
     *
     * @return JsonResponse
     */
    public function register(CreateRequest $request): JsonResponse
    {

    }

    /**
     * @param LoginRequest $request
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {

    }


    public function sendOtp()
}
