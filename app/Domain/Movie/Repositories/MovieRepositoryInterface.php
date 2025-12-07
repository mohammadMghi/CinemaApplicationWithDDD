<?php 

namespace App\Domain\Movie\Repositories;

use App\Application\Movie\Entities\Movie; 
 

interface MovieRepositoryInterface
{ 
    public function create(Movie $movie): Movie;
    public function all(): Movie;
 
}