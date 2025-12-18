<?php 

namespace App\Application\Movie\Handlers;

use App\Application\Movie\Commands\DeleteMovieCommand;
use App\Domain\Movie\Repositories\MovieRepository;

class DeleteMovieCommandHandler
{
    public function __construct(
        private MovieRepository $movieRepository
    ){}

    public function handle(DeleteMovieCommand $command): void
    {
        return $this->movieRepository->delete($command->id);
    }
}