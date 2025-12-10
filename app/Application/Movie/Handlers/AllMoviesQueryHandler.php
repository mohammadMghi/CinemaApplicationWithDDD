<?php 

namespace App\Application\Movie\Handlers;

use App\Application\Movie\Entities\Movie;
use App\Application\Movie\Queries\AllMoviesQuery;
use App\Application\Movie\Queries\GetMoviesQuery;
use App\Domain\Movie\DTOs\AllMovieDTO;
use App\Domain\Movie\Repositories\MovieRepositoryInterface;

class AllMoviesQueryHandler
{
    public function __construct(protected MovieRepositoryInterface $movieRepository)
    {}

    public function handle(AllMoviesQuery $query): array {
        $movies = $this->movieRepository->all(
            new AllMovieDTO(
                $query->limit,
                $query->page
            )
        );

        return $movies;  
    }
}