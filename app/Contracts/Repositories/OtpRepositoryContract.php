<?php

namespace App\Contracts\Repositories;

use App\Models\Otp;

interface OtpRepositoryContract
{

    /**
     * @param string $otpCode
     *
     * @return Otp|null
     */
    public function getOneByOtpCode(string $otpCode): ?Otp;
}
