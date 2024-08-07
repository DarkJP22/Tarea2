<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Log;


class MovieController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showMoviesByGenero(Request $request)
    {
        $generoName = $request->input('genero');
        $movies = Movie::getMoviesByGenero($generoName);

        if (empty($generoName)) {
            return view('moviesError');
        }

        return view('MovieView', ['genero' => $generoName, 'movies' => $movies]);
    }
}