<?php 

namespace App\Domain\User\ValueObjects;

use Exception;

class PasswordHash
{
    private string $value;
    public function __construct(string $value)
    {
        if(strlen($value) < 8)
        {
            throw new Exception('password value must be over 8 char');
        }

        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }
}