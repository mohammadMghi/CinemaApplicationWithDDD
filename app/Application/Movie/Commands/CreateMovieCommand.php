<?php 

namespace App\Application\Movie\Commands;

class CreateMovieCommand
{
    public string $title;
    public int $duration; 
    public string $releaseDate;
    public string $genre; 
    public ?string $description;

    public function __construct(
        string $title,
        int $duration,
        string $releaseDate,
        string $genre,
        ?string $description = null,
    ) {
        $this->title = $title;
        $this->duration = $duration;
        $this->releaseDate = $releaseDate;
        $this->genre = $genre;
        $this->description = $description;
    }
}