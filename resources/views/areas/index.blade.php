<!DOCTYPE html>
<html>
<head>
    <title>Áreas</title>
</head>
<body>

    <h1>Listado de Áreas</h1>

    <a href="{{ route('areas.create') }}">Nueva Área</a>

    <hr>

    @if($areas->count())

        <table border="1" cellpadding="10">
            <tr>
                <th>Nombre</th>
            </tr>

            @foreach($areas as $area)
                <tr>
                    <td>{{ $area->name }}</td>
                </tr>
            @endforeach

        </table>

    @else

        <p>No hay áreas registradas.</p>

    @endif

</body>
</html>