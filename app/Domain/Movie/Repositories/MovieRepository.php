<?php 

namespace App\Domain\Movie\Repositories;

use App\Application\Movie\Entities\Movie;
use App\Models\MovieModel;
 

class MovieRepository implements MovieRepositoryInterface
{
    public function create(Movie $movie): Movie
    {   
        $movieModel = new MovieModel();
        $movieModel->title = $movie->title->value();
        $movieModel->description = $movie->description->value();
        $movieModel->genre = $movie->genres->value(); 
        $movieModel->duration = $movie->duration->value();
        $movieModel->release_date = $movie->releaseDate->value();
        $movieModel->save();
        return $movie;
    }

    public function all(): Movie
    {
        $movieModel = MovieModel::all();

        return new Movie(
            $movieModel->title,
            $movieModel->description,
            $movieModel->duration,
            $movieModel->release_date,
            $movieModel->genre
        );
    }
}