<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\Auth\CreateRequest;

interface UserRepositoryContract
{
    public function createOne(CreateRequest $request);
}
