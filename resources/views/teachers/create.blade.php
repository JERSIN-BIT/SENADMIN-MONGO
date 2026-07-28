<!DOCTYPE html>
<html>

<head>
    <title>Nuevo Instructor</title>
</head>

<body>

    <h1>Registrar Instructor</h1>

    <form action="{{ route('teachers.store') }}" method="POST">

        @csrf

        <label>Nombre</label>

        <input type="text" name="name">

        <br><br>

        <label>Email</label>

        <input type="email" name="email">

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

    <a href="{{ route('teachers.index') }}">

        Volver

    </a>

</body>

</html>
