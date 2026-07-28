<!DOCTYPE html>
<html>

<head>
    <title>Nuevo Aprendiz</title>
</head>

<body>

    <h1>Registrar Aprendiz</h1>

    <form action="{{ route('apprentices.store') }}" method="POST">

        @csrf

        <label>Nombre</label>

        <input type="text" name="name">

        <br><br>

        <label>Email</label>

        <input type="email" name="email">

        <br><br>

        <label>Celular</label>

        <input type="text" name="cell_number">

        <br><br>

        <label>Curso</label>

        <select name="course_id">

            @foreach ($courses as $course)
                <option value="{{ $course->_id }}">

                    {{ $course->course_number }}

                </option>
            @endforeach

        </select>

        <br><br>

        <label>Computador</label>

        <select name="computer_id">

            @foreach ($computers as $computer)
                <option value="{{ $computer->_id }}">

                    {{ $computer->number }}

                </option>
            @endforeach

        </select>

        <br><br>

        <button>

            Guardar

        </button>

    </form>

    <br>

    <a href="{{ route('apprentices.index') }}">

        Volver

    </a>

</body>

</html>
