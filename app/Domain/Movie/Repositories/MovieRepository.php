<?php 

namespace App\Domain\Movie\Repositories;

use App\Application\Movie\Entities\Movie;
use App\Domain\Movie\DTOs\AllMovieDTO;
use App\Domain\Movie\ValueObjects\Description;
use App\Domain\Movie\ValueObjects\Duration;
use App\Domain\Movie\ValueObjects\Genre;
use App\Domain\Movie\ValueObjects\ReleaseDate;
use App\Domain\Movie\ValueObjects\Title;
use App\Models\MovieModel;
use Carbon\Carbon;
 

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
 
    public function all(AllMovieDTO $allMovieDTO): array
    {
        $movieModel = MovieModel::all();

        $movies = $movieModel->map(function($model) {
            return new Movie(
                new Title($model->title),
                new Description($model->description),
                new Duration($model->duration),
                new ReleaseDate(Carbon::parse($model->release_date)->format("Y-m-d")),
                new Genre($model->genre)
            );
        });
 
        return $movies->toArray();
    }
}