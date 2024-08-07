@extends('index')

@section('title', 'Lista por Género: ' . $genero)

@section('content')
    <h1 class="mb-4">Lista por género: {{ $genero }}</h1>
    <a href="{{ url('/') }}" class="btn btn-primary mb-3">Volver</a>

    @if ($movies->isEmpty())
        <div class="alert alert-info" role="alert">
            No hay películas disponibles para este género.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Año</th>
                        <th>Estudio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->year }}</td>
                            <td>{{ $movie->studio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
