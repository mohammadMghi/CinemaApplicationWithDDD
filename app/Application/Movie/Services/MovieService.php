<?php 

namespace App\Application\Movie\Services;

use App\Application\Movie\Commands\CreateMovieCommand;
use App\Application\Movie\Commands\DeleteMovieComannd;
use App\Application\Movie\Commands\DeleteMovieCommand;
use App\Application\Movie\Commands\FindMovieByIDCommand;
use App\Application\Movie\Commands\UpdateMovieCommand;
use App\Application\Movie\Entities\Movie;
use App\Application\Movie\Handlers\AllMoviesQueryHandler;
use App\Application\Movie\Handlers\CreateMovieCommandHandler;
use App\Application\Movie\Handlers\DeleteMovieCommandHandler;
use App\Application\Movie\Handlers\FindMovieByIDCommandHandler;
use App\Application\Movie\Handlers\UpdateMovieCommandHandler;
use App\Application\Movie\Queries\AllMoviesQuery; 

class MovieService
{
    private CreateMovieCommandHandler $createMovieHandler;
    private AllMoviesQueryHandler $allMoviesQueryHandler;
    private UpdateMovieCommandHandler $updateMovieCommandHandler;
    private DeleteMovieCommandHandler $deleteMovieCommandHandler;

    private FindMovieByIDCommandHandler $findMovieByIDCommandHandler;

    public function __construct(
        CreateMovieCommandHandler $createMovieHandler,
        AllMoviesQueryHandler $allMoviesQueryHandler,
        UpdateMovieCommandHandler $updateMovieCommandHandler,
        DeleteMovieCommandHandler $deleteMovieCommandHandler,
        FindMovieByIDCommandHandler $findMovieByIDCommandHandler
        )
    {
        $this->createMovieHandler = $createMovieHandler;
        $this->allMoviesQueryHandler = $allMoviesQueryHandler;
        $this->updateMovieCommandHandler = $updateMovieCommandHandler;
        $this->deleteMovieCommandHandler = $deleteMovieCommandHandler;
        $this->findMovieByIDCommandHandler = $findMovieByIDCommandHandler; 
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

    public function delete(int $id)
    {
        $deleteCommand = new DeleteMovieCommand($id);

        return $this->deleteMovieCommandHandler->handle($deleteCommand);
    }

    public function findByID(int $id)
    {
        $findMovieByIDCommnad = new FindMovieByIDCommand($id);

        return $this->findMovieByIDCommandHandler->handle($findMovieByIDCommnad);
    }
}