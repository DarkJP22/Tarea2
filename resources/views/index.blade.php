<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <h3>Películas</h3>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/') }}">Inicio</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('peliculas?genero=Comedias') }}">Comedias</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('peliculas?genero=Drama') }}">Drama</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('peliculas?genero=Románticas') }}">Románticas</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('peliculas?genero=Animación') }}">Animación</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('peliculas?genero=Acción') }}">Acción</a>
              </li>  
          </ul>
      </div>
  </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>
</html>
