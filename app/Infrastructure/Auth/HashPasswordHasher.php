<?php 

namespace App\Infrastructure\Auth;

use App\Application\User\Entities\User;
use App\Application\User\Services\PasswordHasher;
use Illuminate\Support\Facades\Hash;
 

class HashPasswordHasher implements PasswordHasher
{
    public function verify(string $plain, \App\Domain\User\ValueObjects\PasswordHash $hash) : bool
    {
        return Hash::check($plain,$hash->value());
    }
}