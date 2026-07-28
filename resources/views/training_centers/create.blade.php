<!DOCTYPE html>
<html>

<head>
    <title>Nuevo Centro</title>
</head>

<body>

    <h1>Registrar Centro de Formación</h1>

    <form action="{{ route('training-centers.store') }}" method="POST">

        @csrf

        <label>Nombre</label>

        <input type="text" name="name">

        <br><br>

        <label>Ubicación</label>

        <input type="text" name="location">

        <br><br>

        <button type="submit">

            Guardar

        </button>

    </form>

    <br>

    <a href="{{ route('training-centers.index') }}">

        Volver

    </a>

</body>

</html>
