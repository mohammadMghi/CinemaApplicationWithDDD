<?php 

namespace App\Domain\Movie\Repositories;

use App\Application\Movie\Entities\Movie;
use App\Domain\Movie\DTOs\AllMovieDTO;
use Illuminate\Database\Eloquent\Collection; 
 

interface MovieRepositoryInterface
{ 
    public function create(Movie $movie): Movie;
    public function all(AllMovieDTO $allMovieDTO): array; 
 
}