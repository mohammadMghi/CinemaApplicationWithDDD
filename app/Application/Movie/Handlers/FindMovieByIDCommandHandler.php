<?php

namespace App\Application\Movie\Handlers;

use App\Application\Movie\Commands\FindMovieByIDCommand;
use App\Domain\Movie\Repositories\MovieRepository;
use App\Events\MovieViewedEvent;

class FindMovieByIDCommandHandler
{
    public function __construct(public MovieRepository $movieRepository)
    {}

    public function handle(FindMovieByIDCommand $command)
    { 
        event(new MovieViewedEvent($command->id,$command->user_id));

        return $this->movieRepository->findByID($command->id);
    }
}