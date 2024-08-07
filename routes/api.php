<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/movies', [ApiController::class, 'index']); 
Route::get('/movies/{id}', [ApiController::class, 'show']);
Route::put('/movies/edit/{id}', [ApiController::class, 'update']);


//ruta para busqueda de manera acen y des  http://localhost:8000/api/movies?orderBy=year&order=desc
//ruta para busqueda por id http://localhost:8000/api/movies/1
//ruta para busqueda por id http://localhost:8000/api/movies/edit/1