@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>
                <i class="bi bi-people"></i>
                Aprendices
            </h1>

            <p class="text-secondary mb-0">
                Administración de los aprendices registrados
            </p>
        </div>

        <a href="{{ route('apprentices.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus"></i>
            Nuevo Aprendiz
        </a>

    </div>

    <div class="card mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('apprentices.index') }}">

                <div class="row g-2">

                    <div class="col-md-8">
                        <input type="text" name="buscar" class="form-control"
                            placeholder="Buscar por nombre, correo o celular..." value="{{ $buscar }}">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-search"></i>
                            Buscar
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('apprentices.index') }}" class="btn btn-secondary w-100">
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

            @if ($apprentices->count())
                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Celular</th>
                                <th>Ficha</th>
                                <th>Computador</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($apprentices as $apprentice)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + ($apprentices->currentPage() - 1) * $apprentices->perPage() }}
                                    </td>

                                    <td>
                                        <strong>{{ $apprentice->name }}</strong>
                                    </td>

                                    <td>{{ $apprentice->email }}</td>

                                    <td>{{ $apprentice->cell_number }}</td>

                                    <td>{{ $apprentice->course->course_number ?? 'Sin curso asignado' }}</td>

                                    <td>{{ $apprentice->computer->number ?? 'Sin computador asignado' }}</td>

                                    <td class="text-center">

                                        <a href="{{ route('apprentices.edit', $apprentice->_id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('apprentices.destroy', $apprentice->_id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('¿Está seguro de eliminar este aprendiz?');">

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
                    {{ $apprentices->links() }}
                </div>
            @else
                <div class="text-center py-5">

                    <i class="bi bi-person-x fs-1 text-secondary"></i>

                    <h4 class="mt-3">No se encontraron aprendices</h4>

                    <p class="text-secondary mb-0">
                        Intenta realizar otra búsqueda o registra un nuevo aprendiz.
                    </p>

                </div>
            @endif

        </div>

    </div>

@endsection
