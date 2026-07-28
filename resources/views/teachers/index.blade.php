<!DOCTYPE html>
<html>

<head>
    <title>Teachers</title>
</head>

<body>

    <h1>Listado de Instructores</h1>

    <a href="{{ route('teachers.create') }}">
        Nuevo Instructor
    </a>

    <hr>

    @if ($teachers->count())

        <table border="1" cellpadding="10">

            <tr>

                <th>Nombre</th>

                <th>Email</th>

                <th>Área</th>

                <th>Centro</th>

            </tr>

            @foreach ($teachers as $teacher)
                <tr>

                    <td>{{ $teacher->name }}</td>

                    <td>{{ $teacher->email }}</td>

                    <td>{{ $teacher->area->name ?? 'Sin área' }}</td>
                    <td>{{ $teacher->trainingCenter->name ?? 'Sin centro' }}</td>

                </tr>
            @endforeach

        </table>
    @else
        No hay instructores.

    @endif

</body>

</html>
