<?php 

namespace App\Application\User\Commands;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Fullname;
use App\Domain\User\ValueObjects\Password;

class RegisterCommand
{
    public Fullname $fullname;
    public Email $email;
    public Password $password;


    public function __construct(Fullname $fullname, Email $email, Password $password)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
    }
}