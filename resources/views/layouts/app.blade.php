<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SENADMIN MONGO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #edf2f7;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            background: #198754;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, .2);
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: bold;
            color: white !important;
        }

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12);
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-8px);
        }

        .table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .btn {
            border-radius: 10px;
        }

        footer {
            margin-top: 60px;
            text-align: center;
            color: gray;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a class="navbar-brand" href="/">

                <i class="bi bi-database-fill"></i>

                SENADMIN MONGO

            </a>

        </div>

    </nav>

    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif

        @yield('content')

    </div>

    <footer>

        <hr>

        SENADMIN MONGO © 2026

        <br>

        Desarrollado por Alexis

    </footer>

</body>

</html>
