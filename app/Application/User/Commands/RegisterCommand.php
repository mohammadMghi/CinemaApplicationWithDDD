<?php 

namespace App\Application\User\Commands;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Fullname;
use App\Domain\User\ValueObjects\PasswordHash;

class RegisterCommand
{
    public Fullname $fullname;
    public Email $email;
    public PasswordHash $password;


    public function __construct(Fullname $fullname, Email $email, PasswordHash $password)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
    }
}