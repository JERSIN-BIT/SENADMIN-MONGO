@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>
                <i class="bi bi-book"></i>
                Áreas
            </h1>

            <p class="text-secondary mb-0">
                Administración de las áreas de formación
            </p>
        </div>

        <a href="{{ route('areas.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Nueva Área
        </a>

    </div>

    <div class="card mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('areas.index') }}">

                <div class="row g-2">

                    <div class="col-md-8">

                        <input type="text" name="buscar" class="form-control" placeholder="Buscar área por nombre..."
                            value="{{ $buscar }}">

                    </div>

                    <div class="col-md-2">

                        <button type="submit" class="btn btn-success w-100">

                            <i class="bi bi-search"></i>
                            Buscar

                        </button>

                    </div>

                    <div class="col-md-2">

                        <a href="{{ route('areas.index') }}" class="btn btn-secondary w-100">

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

            @if ($areas->count())
                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-success">

                            <tr>

                                <th>#</th>

                                <th>Nombre</th>

                                <th class="text-center">
                                    Acciones
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($areas as $area)
                                <tr>

                                    <td>
                                        {{ $loop->iteration + ($areas->currentPage() - 1) * $areas->perPage() }}
                                    </td>

                                    <td>
                                        <strong>{{ $area->name }}</strong>
                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('areas.edit', $area->_id) }}" class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>
                                            Editar

                                        </a>

                                        <form action="{{ route('areas.destroy', $area->_id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('¿Está seguro de eliminar esta área?');">

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

                    {{ $areas->links() }}

                </div>
            @else
                <div class="text-center py-5">

                    <i class="bi bi-search fs-1 text-secondary"></i>

                    <h4 class="mt-3">
                        No se encontraron áreas
                    </h4>

                    <p class="text-secondary">
                        Intenta realizar otra búsqueda.
                    </p>

                </div>
            @endif

        </div>

    </div>

@endsection
