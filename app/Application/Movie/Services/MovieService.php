<?php 

namespace App\Application\Movie\Services;

use App\Application\Movie\Commands\CreateMovieCommand;
use App\Application\Movie\Commands\UpdateMovieCommand;
use App\Application\Movie\Entities\Movie;
use App\Application\Movie\Handlers\AllMoviesQueryHandler;
use App\Application\Movie\Handlers\CreateMovieCommandHandler;
use App\Application\Movie\Handlers\UpdateMovieCommandHandler;
use App\Application\Movie\Queries\AllMoviesQuery; 

class MovieService
{
    private CreateMovieCommandHandler $createMovieHandler;
    private AllMoviesQueryHandler $allMoviesQueryHandler;
    private UpdateMovieCommandHandler $updateMovieCommandHandler;

    public function __construct(
        CreateMovieCommandHandler $createMovieHandler,
        AllMoviesQueryHandler $allMoviesQueryHandler,
        UpdateMovieCommandHandler $updateMovieCommandHandler
        )
    {
        $this->createMovieHandler = $createMovieHandler;
        $this->allMoviesQueryHandler = $allMoviesQueryHandler;
        $this->updateMovieCommandHandler = $updateMovieCommandHandler;
    }
    
    public function create($data)
    {
        $createMovieCommand = new CreateMovieCommand(
            $data["title"],
            $data["duration"],
            $data["release_date"],
            $data["genres"],
            $data["description"],
        );

        $this->createMovieHandler->handle($createMovieCommand);
    }

    public function all($data): array
    {
        $allMovieCommand = new AllMoviesQuery(
            $data["page"],
            $data["limit"]
        );

        return $this->allMoviesQueryHandler->handle($allMovieCommand); 
    }

    public function update(int $id,$data)
    {
        $updateMovieCommand = new UpdateMovieCommand(
            $id,
            $data['title'],
            $data['duration'],
            $data['release_date'],
            $data['genres'],
            $data['description'],
        );

        return $this->updateMovieCommandHandler->handle($updateMovieCommand);
    }

    public function delete()
    {

    }
}