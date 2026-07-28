<!DOCTYPE html>
<html>

<head>
    <title>Cursos</title>
</head>

<body>

    <h1>Listado de Cursos</h1>

    <a href="{{ route('courses.create') }}">

        Nuevo Curso

    </a>

    <hr>

    @if ($courses->count())

        <table border="1" cellpadding="10">

            <tr>

                <th>Ficha</th>

                <th>Jornada</th>

                <th>Área</th>

                <th>Centro</th>

            </tr>

            @foreach ($courses as $course)
                <tr>

                    <td>{{ $course->course_number }}</td>

                    <td>{{ $course->day }}</td>

                    <td>{{ $course->area->name ?? 'Sin área' }}</td>

                    <td>{{ $course->trainingCenter->name ?? 'Sin centro' }}</td>

                </tr>
            @endforeach

        </table>
    @else
        No hay cursos.

    @endif

</body>

</html>
