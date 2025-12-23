<?php 

namespace App\Domain\User\ValueObjects;

class Fullname
{
    private string $value;
    public function __construct(string $value)
    { 
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }
}