<?php 

namespace App\Application\User\Entities;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Fullname;
use App\Domain\User\ValueObjects\PasswordHash;
use App\Domain\User\ValueObjects\UserID;

class User
{
    public function __construct(
        private ?UserID $userID,
        private Fullname $fullname,
        private $password,
        private Email $email
    )
    {}

    public function password() : string
    {
        return $this->password;
    }

    public function id() : UserID
    {
        return $this->userID;
    }

    public function fullname() : Fullname
    {
        return $this->fullname;
    }

    public function email() : Email
    {
        return $this->email;
    }
}