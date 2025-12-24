<?php 

namespace App\Application\User\Commands;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\PasswordHash;

class UserLoginCommand
{
    public Email $email;
    public PasswordHash $password;
    public function __construct(Email $email,PasswordHash $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}