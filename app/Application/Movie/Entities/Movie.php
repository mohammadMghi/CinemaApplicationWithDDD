<?php 

namespace App\Application\Movie\Entities;

use App\Domain\Movie\ValueObjects\Description;
use App\Domain\Movie\ValueObjects\Duration;
use App\Domain\Movie\ValueObjects\Genre;
use App\Domain\Movie\ValueObjects\ReleaseDate;
use App\Domain\Movie\ValueObjects\Title;

class Movie
{
    public Title $title;
    public Description $description;
    public Duration $duration;
    public ReleaseDate $releaseDate;
    public Genre $genres;

    public function __construct(
        Title $title,
        Description $description,
        Duration $duration,
        ReleaseDate $releaseDate,
        Genre $genres
    ){
        $this->title = $title;
        $this->description = $description;
        $this->duration = $duration;
        $this->releaseDate = $releaseDate;
        $this->genres = $genres;
    }

    public function toSerialize() : array
    {
        return [
            'title' => $this->title->value(),
            'description' => $this->description->value(),
            'duration' => $this->duration->value(),
            'releaseDate' => $this->releaseDate->value()->format('Y-m-d'),
            'genres' => $this->genres->value(),
        ];
    }
}