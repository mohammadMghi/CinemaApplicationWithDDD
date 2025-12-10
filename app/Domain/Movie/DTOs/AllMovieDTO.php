<?php 

namespace App\Domain\Movie\DTOs;

class AllMovieDTO
{
    public $limit;
    public $page;

    public function __construct($limit,$page){
        $this->limit = $limit;
        $this->page = $page;
    }
}