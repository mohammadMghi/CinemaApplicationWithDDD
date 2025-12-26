<?php

namespace App\Domain\User\Repositories;

use App\Application\User\Entities\User;

interface UserRepositoryInterface
{
    public function find($id) : User;

    public function store(User $user): User;
}