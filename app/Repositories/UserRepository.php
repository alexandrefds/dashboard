<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(readonly User $userModel)
    {
    }

    public function store(array $data): void
    {
        $this->userModel
            ->create($data);
    }
}
