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

    /**
     * @param string $email
     *
     * @return User|null
     */
    public function getOneByEmail(string $email): ?User
    {
        return User::query()
            ->where('email', $email)
            ->first();
    }

    /**
     * @param array $data
     * @param int $userId
     *
     * @return User
     */
    public function updateOne(array $data, int $userId): User
    {
        $user = User::query()->findOrFail($userId);
        $user->update($data);

        return $user;
    }
}

