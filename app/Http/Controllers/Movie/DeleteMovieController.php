<?php

namespace App\Http\Controllers\Movie;

use App\Application\Movie\Services\MovieService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteMovieController extends Controller
{
    private MovieService $movieService;
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }
    
    public function index(Request $request)
    {
        $this->movieService->delete($request->id);
    }
}
