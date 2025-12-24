<?php 

namespace App\Infrastructure\Auth;

use App\Application\User\Entities\User;
use App\Domain\User\Services\AuthService;
use Auth;

class LaravelAuthService implements AuthService
{
    public function login(User $user) : string 
    {
        return Auth::loginUsingId($user->id()->value());
    }
}