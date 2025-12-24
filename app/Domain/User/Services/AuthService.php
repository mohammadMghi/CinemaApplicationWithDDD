<?php 

namespace App\Domain\User\Services;

use App\Application\User\Entities\User;

interface AuthService
{
    public function login(User $user) : string;
}