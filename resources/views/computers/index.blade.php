<!DOCTYPE html>
<html>

<head>
    <title>Computadores</title>
</head>

<body>

    <h1>Listado de Computadores</h1>

    <a href="{{ route('computers.create') }}">
        Nuevo Computador
    </a>

    <hr>

    @if ($computers->count())

        <table border="1" cellpadding="10">

            <tr>
                <th>Número</th>
                <th>Marca</th>
            </tr>

            @foreach ($computers as $computer)
                <tr>
                    <td>{{ $computer->number }}</td>
                    <td>{{ $computer->brand }}</td>
                </tr>
            @endforeach

        </table>
    @else
        <p>No hay computadores registrados.</p>

    @endif

</body>

</html>
