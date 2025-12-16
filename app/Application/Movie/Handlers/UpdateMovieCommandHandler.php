<?php 

namespace App\Application\Movie\Handlers;

use App\Application\Movie\Commands\UpdateMovieCommand;
use App\Application\Movie\Entities\Movie;
use App\Domain\Movie\Repositories\MovieRepository;
use App\Domain\Movie\Repositories\MovieRepositoryInterface;
use App\Domain\Movie\ValueObjects\Description;
use App\Domain\Movie\ValueObjects\Duration;
use App\Domain\Movie\ValueObjects\Genre;
use App\Domain\Movie\ValueObjects\ReleaseDate;
use App\Domain\Movie\ValueObjects\Title;  

class UpdateMovieCommandHandler
{
    private $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRespo){
        $this->movieRepository = $movieRespo;   
    }

    public function handle(UpdateMovieCommand $cmd): Movie
    {
        $movie = $this->movieRepository->update(
            $cmd->id,
             new Movie(
                new Title($cmd->title),
                new Description($cmd->description),
                new Duration($cmd->duration),
                new ReleaseDate($cmd->releaseDate),
                new Genre($cmd->genre)
             )
        );

        return $movie;
    }
}