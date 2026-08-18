<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SENADMIN MONGO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <!-- Barra superior -->
    <nav class="navbar navbar-dark bg-success">

        <div class="container">

            <a class="navbar-brand" href="/">
                SENADMIN MONGO
            </a>

        </div>

    </nav>


    <!-- Contenido -->
    <div class="container mt-4">

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Aquí aparece el contenido de cada página -->
        @yield('content')

    </div>


    <!-- Pie de página -->
    <footer class="text-center mt-5 mb-3">

        <hr>

        <p class="text-muted">
            SENADMIN MONGO © 2026
        </p>

    </footer>

</body>

</html>
