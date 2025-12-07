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
}