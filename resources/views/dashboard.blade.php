@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">

        <h1>SENADMIN MONGO</h1>

        <p class="text-muted">
            Sistema Administrativo SENA con MongoDB
        </p>

    </div>

    <div class="row g-3">

        <div class="col-md-4">
            <div class="card p-4">
                <h4>Áreas</h4>
                <p class="text-muted">
                    Gestión de las áreas del sistema.
                </p>
                <a href="{{ route('areas.index') }}" class="btn btn-success">
                    Ver áreas
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <h4>Centros de formación</h4>
                <p class="text-muted">
                    Gestión de los centros de formación.
                </p>
                <a href="{{ route('training-centers.index') }}" class="btn btn-success">
                    Ver centros
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <h4>Instructores</h4>
                <p class="text-muted">
                    Gestión de los instructores.
                </p>
                <a href="{{ route('teachers.index') }}" class="btn btn-success">
                    Ver instructores
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <h4>Cursos</h4>
                <p class="text-muted">
                    Gestión de los cursos.
                </p>
                <a href="{{ route('courses.index') }}" class="btn btn-success">
                    Ver cursos
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <h4>Computadores</h4>
                <p class="text-muted">
                    Gestión de los computadores.
                </p>
                <a href="{{ route('computers.index') }}" class="btn btn-success">
                    Ver computadores
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <h4>Aprendices</h4>
                <p class="text-muted">
                    Gestión de los aprendices.
                </p>
                <a href="{{ route('apprentices.index') }}" class="btn btn-success">
                    Ver aprendices
                </a>
            </div>
        </div>

    </div>
@endsection
