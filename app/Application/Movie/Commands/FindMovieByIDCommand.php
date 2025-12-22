<?php 

namespace App\Application\Movie\Commands;

class FindMovieByIDCommand
{
    public int $id;
    public function __construct(int $id)
    {
        $this->id = $id;
    }
}