<?php 

namespace App\Application\Movie\Commands;

class FindMovieByIDCommand
{
    public int $id;
    public int $user_id;
    public function __construct(int $id,int $user_id)
    {
        $this->id = $id;
        $this->user_id = $user_id;
    }
}