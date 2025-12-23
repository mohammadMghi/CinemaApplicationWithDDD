<?php 

namespace App\Application\User\Commands;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Password;

class UserLoginCommand
{
    public Email $email;
    public Password $password;
    public function __construct(Email $email,Password $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}