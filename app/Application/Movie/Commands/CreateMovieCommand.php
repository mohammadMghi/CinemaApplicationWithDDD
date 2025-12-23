<?php 

namespace App\Application\Movie\Commands;

use App\Domain\Movie\ValueObjects\Description;
use App\Domain\Movie\ValueObjects\Duration;
use App\Domain\Movie\ValueObjects\Genre;
use App\Domain\Movie\ValueObjects\ReleaseDate;
use App\Domain\Movie\ValueObjects\Title;

class CreateMovieCommand
{
    public Title $title;
    public Duration $duration; 
    public ReleaseDate $releaseDate;
    public Genre $genre; 
    public ?Description $description;

    public function __construct(
        Title $title,
        Duration $duration,
        ReleaseDate $releaseDate,
        Genre $genre,
        ?Description $description = null,
    ) {
        $this->title = $title;
        $this->duration = $duration;
        $this->releaseDate = $releaseDate;
        $this->genre = $genre;
        $this->description = $description;
    }
}