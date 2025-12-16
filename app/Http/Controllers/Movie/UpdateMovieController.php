<?php

namespace App\Http\Controllers\Movie;

use App\Application\Movie\Services\MovieService;
use App\Domain\Movie\DTOs\MovieArrayMapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateMovieController extends Controller
{
    private MovieService $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index(Request $request)
    { 
        $movie = $this->movieService->update($request->all()['id'],$request->all());
        return response()->json(MovieArrayMapper::one($movie));
    }
}
