<?php

namespace App\Facades;

use App\Contracts\Repositories\OtpRepositoryContract;
use App\Contracts\Repositories\UserRepositoryContract;
use Illuminate\Support\Facades\Facade;


/**
 * @method UserRepositoryContract user()
 * @method OtpRepositoryContract otp()
 */

class Repository extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'repository';
    }
}
