<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/send-otp', [AuthController::class, 'sendOtp']);
Route::post('/auth/verify-and-create', [AuthController::class, 'verifyAndCreate']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('auth/send-password-otp', [AuthController::class, 'sendOtpForPasswordReset']);
Route::post('auth/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('auth/reset-password', [AuthController::class, 'resetPassword']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::get('user-profile/show', [UserProfileController::class, 'show'])->middleware('auth:sanctum');
