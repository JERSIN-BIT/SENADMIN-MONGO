<!DOCTYPE html>
<html>

<head>
    <title>Aprendices</title>
</head>

<body>

    <h1>Listado de Aprendices</h1>

    <a href="{{ route('apprentices.create') }}">

        Nuevo Aprendiz

    </a>

    <hr>

    @if ($apprentices->count())

        <table border="1" cellpadding="10">

            <tr>

                <th>Nombre</th>

                <th>Email</th>

                <th>Celular</th>

                <th>Curso</th>

                <th>Computador</th>

            </tr>

            @foreach ($apprentices as $apprentice)
                <tr>

                    <td>{{ $apprentice->name }}</td>

                    <td>{{ $apprentice->email }}</td>

                    <td>{{ $apprentice->cell_number }}</td>

                    <td>{{ $apprentice->course->course_number ?? 'Sin curso' }}</td>

                    <td>{{ $apprentice->computer->number ?? 'Sin computador' }}</td>

                </tr>
            @endforeach

        </table>
    @else
        No hay aprendices.

    @endif

</body>

</html>
