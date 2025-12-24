<?php 

namespace App\Application\User\Entities;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Fullname;
use App\Domain\User\ValueObjects\PasswordHash;
use App\Domain\User\ValueObjects\UserID;

class User
{
    public function __construct(
        private UserID $userID,
        private Fullname $name,
        private PasswordHash $password,
        private Email $email
    )
    {}

    public function password() : PasswordHash
    {
        return $this->password;
    }

    public function id() : UserID
    {
        return $this->userID;
    }
}