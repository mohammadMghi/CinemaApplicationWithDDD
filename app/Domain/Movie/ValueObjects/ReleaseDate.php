<?php 

namespace App\Domain\Movie\ValueObjects;

use DateTimeImmutable;

final class ReleaseDate
{
    private DateTimeImmutable $date;

    public function __construct(string $releaseDate)
    {
        $parsed = DateTimeImmutable::createFromFormat('Y-m-d', $releaseDate);

        if (!$parsed) {
            throw new \InvalidArgumentException("Invalid date format. Use Y-m-d.");
        }

        $this->date = $parsed;
    }

    public function value(): DateTimeImmutable
    {
        return $this->date;
    }

    public function __toString(): string
    {
        return $this->date->format('Y-m-d');
    }
}