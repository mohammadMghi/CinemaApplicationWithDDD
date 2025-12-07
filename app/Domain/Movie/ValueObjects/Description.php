<?php 

namespace App\Domain\Movie\ValueObjects;

use InvalidArgumentException;

class Description
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = trim($value);

        $this->ensureIsValid($value);
    }

    public function ensureIsValid(string $value): void
    {
        if ($value === '') {
            throw new InvalidArgumentException('Description cannot be empty.');
        } 
    }

    public function value(): string
    {
        return $this->value;
    }
}