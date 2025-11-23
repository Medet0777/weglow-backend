<?php

namespace App\Facades;

use App\Contracts\Repositories\UserRepositoryContract;
use Illuminate\Support\Facades\Facade;


/**
 * @method UserRepositoryContract user()
 */

class Repository extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'repository';
    }
}
