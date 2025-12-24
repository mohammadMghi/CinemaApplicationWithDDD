<?php 

namespace App\Application\User\Services;

use App\Domain\User\ValueObjects\PasswordHash;

interface PasswordHasher
{
    public function verify(string $plain,PasswordHash $hash) : bool;
}