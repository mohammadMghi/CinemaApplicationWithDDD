<?php

namespace App\Application\Movie\Handlers;

use App\Application\Movie\Commands\FindMovieByIDCommand;
use App\Domain\Movie\Repositories\MovieRepository;

class FindMovieByIDCommandHandler
{
    public function __construct(public MovieRepository $movieRepository)
    {}

    public function handle(FindMovieByIDCommand $command)
    {
        return $this->movieRepository->findByID($command->id);
    }
}