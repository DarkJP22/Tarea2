<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $orderBy = $request->query('orderBy', 'title');
            $order = $request->query('order', 'asc');

            $movies = Movie::orderBy($orderBy, $order)->get();

            return response()->json(['message' => 'Películas Obtenidas', 'data' => $movies], Response::HTTP_OK); // 200 OK
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error interno del servidor'], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 Internal Server Error
        }
    }

    public function show($id)
    {
        try {
            $movie = Movie::findOrFail($id);
            return response()->json(['message' => 'Película encontrada exitosamente', 'data' => $movie], Response::HTTP_OK); // 200 OK
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Película no encontrada'], Response::HTTP_NOT_FOUND); // 404 Not Found
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error interno del servidor'], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 Internal Server Error
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'year' => 'required|integer',
                'studio' => 'required|string|max:255',
                'genero_id' => 'required|integer|exists:generos,id'
            ]);

            $movie = Movie::create($validatedData);

            return response()->json(['message' => 'Película creada exitosamente', 'data' => $movie], Response::HTTP_CREATED); // 201 Created
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Datos inválidos', 'errors' => $e->errors()], Response::HTTP_BAD_REQUEST); // 400 Bad Request
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error interno del servidor'], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 Internal Server Error
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'year' => 'required|integer',
                'studio' => 'required|string|max:255',
                'genero_id' => 'required|integer|exists:generos,id'
            ]);

            $movie = Movie::findOrFail($id);
            $movie->update($validatedData);

            return response()->json(['message' => 'Película actualizada exitosamente', 'data' => $movie], Response::HTTP_OK); // 200 OK
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Datos inválidos', 'errors' => $e->errors()], Response::HTTP_BAD_REQUEST); // 400 Bad Request
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Película no encontrada'], Response::HTTP_NOT_FOUND); // 404 Not Found
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error interno del servidor'], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 Internal Server Error
        }
    }
}
