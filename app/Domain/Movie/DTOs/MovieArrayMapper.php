<?php 

namespace App\Domain\Movie\DTOs;

use App\Application\Movie\Entities\Movie;

class MovieArrayMapper
{
    public static function one(Movie $movie) : array
    {
        return [
            'title' => $movie->title->value(),
            'description' => $movie->description->value(),
            'duration' => $movie->duration->value(),
            'release_date' => $movie->releaseDate->value()->format('Y-m-d'),
            'genres' => $movie->genres->value(),
        ];
    }

    public static function many(iterable $movies)
    {
        return array_map(
            fn(Movie $movie) => self::one($movie),
            is_array($movies) ? $movies : iterator_to_array($movies)
        );
    }
}