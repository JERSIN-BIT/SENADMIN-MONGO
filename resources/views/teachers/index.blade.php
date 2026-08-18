@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>
                <i class="bi bi-person-workspace"></i>
                Instructores
            </h1>

            <p class="text-secondary mb-0">
                Administración de los instructores de formación
            </p>
        </div>

        <a href="{{ route('teachers.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Nuevo Instructor
        </a>

    </div>

    <div class="card mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('teachers.index') }}">

                <div class="row g-2">

                    <div class="col-md-8">
                        <input type="text" name="buscar" class="form-control"
                            placeholder="Buscar instructor por nombre o correo..." value="{{ $buscar }}">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-search"></i>
                            Buscar
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('teachers.index') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-arrow-clockwise"></i>
                            Limpiar
                        </a>
                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="card">

        <div class="card-body">

            @if ($teachers->count())
                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Área</th>
                                <th>Centro de formación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + ($teachers->currentPage() - 1) * $teachers->perPage() }}
                                    </td>

                                    <td>
                                        <strong>{{ $teacher->name }}</strong>
                                    </td>

                                    <td>{{ $teacher->email }}</td>

                                    <td>
                                        {{ $teacher->area->name ?? 'Sin área asignada' }}
                                    </td>

                                    <td>
                                        {{ $teacher->trainingCenter->name ?? 'Sin centro asignado' }}
                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('teachers.edit', $teacher->_id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('teachers.destroy', $teacher->_id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('¿Está seguro de eliminar este instructor?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                                Eliminar
                                            </button>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">
                    {{ $teachers->links() }}
                </div>
            @else
                <div class="text-center py-5">

                    <i class="bi bi-person-x fs-1 text-secondary"></i>

                    <h4 class="mt-3">
                        No se encontraron instructores
                    </h4>

                    <p class="text-secondary mb-0">
                        Intenta realizar otra búsqueda o registra un nuevo instructor.
                    </p>

                </div>
            @endif

        </div>

    </div>

@endsection
