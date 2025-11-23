<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Models\User;

class UserRepository implements UserRepositoryContract
{

    /**
     * @param array $data
     *
     * @return User
     */
    public function createOne(array $data): User
    {
        return User::create([
            'name' => $data['name'] ?? null,
            'email' => $data['email'],
            'password' => $data['password'],
            'email_verified_at' => $data['email_verified_at'] ?? null,
        ]);
    }
}

