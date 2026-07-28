<!DOCTYPE html>
<html>

<head>
    <title>Centros de Formación</title>
</head>

<body>

    <h1>Listado Centros de Formación</h1>

    <a href="{{ route('training-centers.create') }}">
        Nuevo Centro
    </a>

    <hr>

    @if ($trainingCenters->count())

        <table border="1" cellpadding="10">

            <tr>
                <th>Nombre</th>
                <th>Ubicación</th>
            </tr>

            @foreach ($trainingCenters as $trainingCenter)
                <tr>

                    <td>{{ $trainingCenter->name }}</td>

                    <td>{{ $trainingCenter->location }}</td>

                </tr>
            @endforeach

        </table>
    @else
        <p>No hay registros.</p>

    @endif

</body>

</html>
