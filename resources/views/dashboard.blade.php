@extends('layouts.app')

@section('content')
    <div class="text-center mb-5">

        <h1>
            SENADMIN MONGO
        </h1>

        <p class="text-secondary">
            Sistema Administrativo SENA con MongoDB
        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <a href="{{ route('areas.index') }}" class="text-decoration-none">
                <div class="card text-center p-5">
                    <h1>📚</h1>
                    <h4>Áreas</h4>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('training-centers.index') }}" class="text-decoration-none">
                <div class="card text-center p-5">
                    <h1>🏫</h1>
                    <h4>Centros</h4>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('teachers.index') }}" class="text-decoration-none">
                <div class="card text-center p-5">
                    <h1>👨‍🏫</h1>
                    <h4>Instructores</h4>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('courses.index') }}" class="text-decoration-none">
                <div class="card text-center p-5">
                    <h1>📖</h1>
                    <h4>Cursos</h4>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('computers.index') }}" class="text-decoration-none">
                <div class="card text-center p-5">
                    <h1>💻</h1>
                    <h4>Computadores</h4>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('apprentices.index') }}" class="text-decoration-none">
                <div class="card text-center p-5">
                    <h1>🎓</h1>
                    <h4>Aprendices</h4>
                </div>
            </a>
        </div>

    </div>
@endsection
