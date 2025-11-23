<?php

namespace App\Contracts\Repositories;

use App\Models\User;

interface UserRepositoryContract
{
    /**
     * @param array $data
     *
     * @return User
     */
    public function createOne(array $data): User;
}
