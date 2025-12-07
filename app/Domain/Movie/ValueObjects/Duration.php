<?php

namespace App\Domain\Movie\ValueObjects;

final class Duration
{
    private int $minutes;

    public function __construct(string $duration)
    {
        if (!ctype_digit($duration) || (int)$duration <= 0) {
            throw new \InvalidArgumentException("Duration must be a positive integer (minutes).");
        }

        $this->minutes = (int)$duration;
    }

    public function value(): int
    {
        return $this->minutes;
    }

    public function __toString(): string
    {
        return (string)$this->minutes;
    }
}
