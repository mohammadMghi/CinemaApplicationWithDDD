<?php 

namespace App\Application\Movie\Handlers;

use App\Application\Movie\Commands\CreateMovieCommand;
use App\Application\Movie\Entities\Movie;
use App\Domain\Movie\Events\MovieCreated;
use App\Domain\Movie\Repositories\MovieRepositoryInterface;
use App\Domain\Movie\ValueObjects\Description;
use App\Domain\Movie\ValueObjects\Duration;
use App\Domain\Movie\ValueObjects\Genre;
use App\Domain\Movie\ValueObjects\ReleaseDate;
use App\Domain\Movie\ValueObjects\Title;
 

class CreateMovieCommandHandler
{
    public function __construct(protected MovieRepositoryInterface $movieRepository)
    {}

    public function handle(CreateMovieCommand $cmd) : void 
    {    
        $movie = $this->movieRepository->create(
             new Movie(
                new Title($cmd->title),
                new Description($cmd->description),
                new Duration($cmd->duration),
                new ReleaseDate($cmd->releaseDate),
                new Genre($cmd->genre)
             )
        );

        event(new MovieCreated($movie)); 
    }

}  