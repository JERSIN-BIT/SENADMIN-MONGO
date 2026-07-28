@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-5">

        Sistema SENADMIN MONGO

    </h1>

    <div class="row g-4">

        <div class="col-md-4">

            <a href="{{ route('areas.index') }}" class="text-decoration-none">

                <div class="card p-4 text-center">

                    <h2>📚</h2>

                    <h4>Áreas</h4>

                </div>

            </a>

        </div>

        <div class="col-md-4">

            <a href="{{ route('training-centers.index') }}" class="text-decoration-none">

                <div class="card p-4 text-center">

                    <h2>🏫</h2>

                    <h4>Centros</h4>

                </div>

            </a>

        </div>

        <div class="col-md-4">

            <a href="{{ route('teachers.index') }}" class="text-decoration-none">

                <div class="card p-4 text-center">

                    <h2>👨‍🏫</h2>

                    <h4>Instructores</h4>

                </div>

            </a>

        </div>

        <div class="col-md-4">

            <a href="{{ route('courses.index') }}" class="text-decoration-none">

                <div class="card p-4 text-center">

                    <h2>📖</h2>

                    <h4>Cursos</h4>

                </div>

            </a>

        </div>

        <div class="col-md-4">

            <a href="{{ route('computers.index') }}" class="text-decoration-none">

                <div class="card p-4 text-center">

                    <h2>💻</h2>

                    <h4>Computadores</h4>

                </div>

            </a>

        </div>

        <div class="col-md-4">

            <a href="{{ route('apprentices.index') }}" class="text-decoration-none">

                <div class="card p-4 text-center">

                    <h2>👨‍🎓</h2>

                    <h4>Aprendices</h4>

                </div>

            </a>

        </div>

    </div>
@endsection
