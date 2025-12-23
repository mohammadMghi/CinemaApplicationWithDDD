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
use App\Domain\Movie\ValueObjects\Description;
use App\Domain\Movie\ValueObjects\Duration;
use App\Domain\Movie\ValueObjects\Genre;
use App\Domain\Movie\ValueObjects\ReleaseDate;
use App\Domain\Movie\ValueObjects\Title; 

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
            new Title($data["title"]), 
            new Duration($data["duration"]),
            new ReleaseDate($data["release_date"]),
            new Genre($data["genres"]),
            new Description($data["description"]),
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
            new Title($data['title']),
            new Duration($data['duration']),
            new ReleaseDate($data['release_date']),
            new Genre($data['genres']),
            new Description($data['description']),
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
        $user = auth()->user();
        
        $findMovieByIDCommnad = new FindMovieByIDCommand($id,$user->id);

        return $this->findMovieByIDCommandHandler->handle($findMovieByIDCommnad);
    }
}