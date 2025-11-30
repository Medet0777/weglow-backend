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

    /**
     * @param string $email
     *
     * @return User|null
     */
    public function getOneByEmail(string $email): ?User;

    /**
     * @param int $id
     *
     * @return User|null
     */
    public function getOneByIdentifier(int  $id): ?User;
}
