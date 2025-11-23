<?php

namespace App\Services;

use App\Contracts\Services\AuthServiceContract;
use App\Facades\Repository;
use App\Http\Requests\Auth\CreateRequest;
use App\Http\Requests\Auth\VerifyRequest;
use App\Mail\OtpMail;
use App\Models\Otp;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthService implements AuthServiceContract
{

    /**
     * @param CreateRequest $request
     *
     * @return JsonResponse
     */
    public function sendOtp(CreateRequest $request): JsonResponse
    {
        $otpCode = rand(1000, 9999);

        Otp::createOrUpdate(
            ['email' => $request->get('email')],
            [
                'otp' => $otpCode,
                'expires_at' => Carbon::now()->addMinutes(5)
            ]
        );

        $request->session()->put('temp_password_'.$request->get('email'), $request->get('password'));

        Mail::to($request->get('email'))->send(new OtpMail($otpCode));

        return response()->json([
            'message' => 'OTP sent to your email',
        ]);
    }


    /**
     * @param VerifyRequest $request
     *
     * @return JsonResponse
     */
    public function verifyAndCreate(VerifyRequest $request): JsonResponse
    {
        $record = Repository::otp()->getOneByOtpCode($request->get('otp'));

        if (!$record) {
            return response()->json(['message' => 'Invalid or expired OTP'], 422);
        }

        $password = session()->pull('temp_password_'.$record->email);

        if (!$password) {
            return response()->json(['message' => 'Password not found. Please resend OTP.'], 422);
        }

        $user = Repository::user()->createOne(
            [
                'email' => $record->email,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($password),
            ]
        );

        $record->delete();
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token
        ]);
    }
}
