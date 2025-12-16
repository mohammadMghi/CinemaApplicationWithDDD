<?php

namespace App\Http\Controllers\Movie;

use App\Application\Movie\Handlers\AllMoviesQueryHandler;
use App\Application\Movie\Services\MovieService;
use App\Domain\Movie\DTOs\MovieArrayMapper;
use App\Domain\Movie\DTOs\MovieResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllMovieController extends Controller
{
    public function __construct(public MovieService $movieService)
    {}

    public function index(Request $request)
    {
        $movies = $this->movieService->all($request->all());
        return response()->json(MovieArrayMapper::many($movies));
    }
}
