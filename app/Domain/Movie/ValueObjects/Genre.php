<?php 

namespace App\Domain\Movie\ValueObjects;

use InvalidArgumentException;

class Genre
{
    private string $value;

    public function __construct(string $value)
    {   
        $this->value = trim($value);

        $this->ensureIsValid($value);
    }

    private function ensureIsValid(string $value): void
    {
        if ($value === '') {
            throw new InvalidArgumentException('Movie genre cannot be empty.');
        }

        if (mb_strlen($value) < 2) {
            throw new InvalidArgumentException('Movie genre must be at least 2 characters.');
        }

        if (mb_strlen($value) > 255) {
            throw new InvalidArgumentException('Movie genre cannot exceed 255 characters.');
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Genre $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}