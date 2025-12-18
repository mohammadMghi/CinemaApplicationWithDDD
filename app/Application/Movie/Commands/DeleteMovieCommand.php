<?php

namespace App\Application\Movie\Commands;

class DeleteMovieCommand
{
    public int $id;
    public function __construct(int $id)
    {
        $this->id = $id;
    }
}