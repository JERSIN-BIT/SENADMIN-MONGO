<!DOCTYPE html>
<html>

<head>
    <title>Nuevo Curso</title>
</head>

<body>

    <h1>Registrar Curso</h1>

    <form action="{{ route('courses.store') }}" method="POST">

        @csrf

        <label>Número de ficha</label>

        <input type="text" name="course_number">

        <br><br>

        <label>Jornada</label>

        <input type="text" name="day">

        <br><br>

        <label>Área</label>

        <select name="area_id">

            @foreach ($areas as $area)
                <option value="{{ $area->_id }}">
                    {{ $area->name }}
                </option>
            @endforeach

        </select>

        <br><br>

        <label>Centro</label>

        <select name="training_center_id">

            @foreach ($trainingCenters as $trainingCenter)
                <option value="{{ $trainingCenter->_id }}">
                    {{ $trainingCenter->name }}
                </option>
            @endforeach

        </select>

        <br><br>

        <button>

            Guardar

        </button>

    </form>

    <br>

    <a href="{{ route('courses.index') }}">

        Volver

    </a>

</body>

</html>
