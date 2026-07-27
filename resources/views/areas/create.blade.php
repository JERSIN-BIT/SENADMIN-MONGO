<!DOCTYPE html>
<html>
<head>
    <title>Nueva Área</title>
</head>
<body>

<h1>Registrar Área</h1>

<form action="{{ route('areas.store') }}" method="POST">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="name">

    <button type="submit">Guardar</button>
</form>

<br>

<a href="{{ route('areas.index') }}">Volver</a>

</body>
</html>