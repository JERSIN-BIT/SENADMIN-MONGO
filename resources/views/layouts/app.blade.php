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

        }

        .navbar {

            background: #0d6efd;

        }

        .navbar-brand {

            color: white !important;

            font-weight: bold;

            font-size: 25px;

        }

        .card {

            border: none;

            border-radius: 18px;

            transition: .3s;

            box-shadow: 0 8px 20px rgba(0, 0, 0, .12);

        }

        .card:hover {

            transform: translateY(-8px);

        }

        .btn {

            border-radius: 12px;

        }

        .table {

            background: white;

            border-radius: 15px;

            overflow: hidden;

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

        @yield('content')

    </div>

</body>

</html>
