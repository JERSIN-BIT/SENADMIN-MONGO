@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square"></i>
                        Editar Instructor
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

                    <form action="{{ route('teachers.update', $teacher->_id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">Nombre completo</label>

                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $teacher->name) }}" required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Correo electrónico</label>

                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $teacher->email) }}" required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Área de formación</label>

                            <select name="area_id" class="form-select" required>

                                <option value="">Seleccione un área</option>

                                @foreach ($areas as $area)
                                    <option value="{{ $area->_id }}" @selected(old('area_id', $teacher->area_id) == $area->_id)>
                                        {{ $area->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Centro de formación</label>

                            <select name="training_center_id" class="form-select" required>

                                <option value="">Seleccione un centro de formación</option>

                                @foreach ($trainingCenters as $trainingCenter)
                                    <option value="{{ $trainingCenter->_id }}" @selected(old('training_center_id', $teacher->training_center_id) == $trainingCenter->_id)>
                                        {{ $trainingCenter->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle"></i>
                                Actualizar
                            </button>

                            <a href="{{ route('teachers.index') }}" class="btn btn-secondary">
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
