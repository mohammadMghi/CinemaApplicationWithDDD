<?php 

namespace App\Domain\Movie\Events;

use App\Application\Movie\Entities\Movie;

class MovieCreated
{
    public function __construct(Movie $movie){}
}