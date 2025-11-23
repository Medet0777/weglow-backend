<?php

namespace App\Repositories;

use App\Contracts\Repositories\OtpRepositoryContract;
use App\Models\Otp;

class OtpRepository implements OtpRepositoryContract
{
    /**
     * @param string $otpCode
     *
     * @return Otp|null
     */
    public function getOneByOtpCode(string $otpCode): ?Otp
    {
        return Otp::query()
            ->where('otp', $otpCode)
            ->where('expires_at', '>', now())
            ->first();
    }
}
