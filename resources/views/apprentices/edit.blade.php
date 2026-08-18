@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square"></i>
                        Editar Aprendiz
                    </h4>

                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>
                    @endif

                    <form action="{{ route('apprentices.update', $apprentice->_id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">Nombre completo</label>

                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $apprentice->name) }}" required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Correo electrónico</label>

                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $apprentice->email) }}" required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Número de celular</label>

                            <input type="text" name="cell_number" class="form-control"
                                value="{{ old('cell_number', $apprentice->cell_number) }}" required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Ficha del curso</label>

                            <select name="course_id" class="form-select" required>

                                <option value="">Seleccione una ficha</option>

                                @foreach ($courses as $course)
                                    <option value="{{ $course->_id }}" @selected(old('course_id', $apprentice->course_id) == $course->_id)>
                                        {{ $course->course_number }} - {{ $course->day }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Computador asignado</label>

                            <select name="computer_id" class="form-select" required>

                                <option value="">Seleccione un computador</option>

                                @foreach ($computers as $computer)
                                    <option value="{{ $computer->_id }}" @selected(old('computer_id', $apprentice->computer_id) == $computer->_id)>
                                        {{ $computer->number }} - {{ $computer->brand }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle"></i>
                                Actualizar
                            </button>

                            <a href="{{ route('apprentices.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Cancelar
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
