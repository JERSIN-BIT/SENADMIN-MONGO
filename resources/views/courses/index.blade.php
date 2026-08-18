@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>
                <i class="bi bi-journal-bookmark"></i>
                Cursos
            </h1>

            <p class="text-secondary mb-0">
                Administración de las fichas de formación
            </p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Nuevo Curso
        </a>

    </div>

    <div class="card mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('courses.index') }}">

                <div class="row g-2">

                    <div class="col-md-8">
                        <input type="text" name="buscar" class="form-control"
                            placeholder="Buscar por número de ficha o jornada..." value="{{ $buscar }}">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-search"></i>
                            Buscar
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary w-100">
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

            @if ($courses->count())
                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Número de ficha</th>
                                <th>Jornada</th>
                                <th>Área</th>
                                <th>Centro de formación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($courses as $course)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + ($courses->currentPage() - 1) * $courses->perPage() }}
                                    </td>

                                    <td>
                                        <strong>{{ $course->course_number }}</strong>
                                    </td>

                                    <td>{{ $course->day }}</td>

                                    <td>{{ $course->area->name ?? 'Sin área asignada' }}</td>

                                    <td>{{ $course->trainingCenter->name ?? 'Sin centro asignado' }}</td>

                                    <td class="text-center">

                                        <a href="{{ route('courses.edit', $course->_id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('courses.destroy', $course->_id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('¿Está seguro de eliminar este curso?');">

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
                    {{ $courses->links() }}
                </div>
            @else
                <div class="text-center py-5">

                    <i class="bi bi-journal-x fs-1 text-secondary"></i>

                    <h4 class="mt-3">No se encontraron cursos</h4>

                    <p class="text-secondary mb-0">
                        Intenta realizar otra búsqueda o registra una nueva ficha.
                    </p>

                </div>
            @endif

        </div>

    </div>

@endsection
