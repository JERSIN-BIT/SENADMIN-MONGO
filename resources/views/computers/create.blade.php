<!DOCTYPE html>
<html>

<head>
    <title>Nuevo Computador</title>
</head>

<body>

    <h1>Registrar Computador</h1>

    <form action="{{ route('computers.store') }}" method="POST">

        @csrf

        <label>Número:</label>
        <input type="text" name="number">

        <br><br>

        <label>Marca:</label>
        <input type="text" name="brand">

        <br><br>

        <button type="submit">
            Guardar
        </button>

    </form>

    <br>

    <a href="{{ route('computers.index') }}">
        Volver
    </a>

</body>

</html>
