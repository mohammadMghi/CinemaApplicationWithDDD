<?php 

namespace App\Application\Movie\Queries;

class AllMoviesQuery
{
    public function __construct(public $page,public $limit){}
}