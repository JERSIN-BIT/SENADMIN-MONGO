@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>
                <i class="bi bi-pc-display"></i>
                Computadores
            </h1>

            <p class="text-secondary mb-0">
                Administración de los computadores disponibles
            </p>
        </div>

        <a href="{{ route('computers.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Nuevo Computador
        </a>

    </div>

    <div class="card mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('computers.index') }}">

                <div class="row g-2">

                    <div class="col-md-8">
                        <input type="text" name="buscar" class="form-control" placeholder="Buscar por número o marca..."
                            value="{{ $buscar }}">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-search"></i>
                            Buscar
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('computers.index') }}" class="btn btn-secondary w-100">
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

            @if ($computers->count())
                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Número</th>
                                <th>Marca</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($computers as $computer)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + ($computers->currentPage() - 1) * $computers->perPage() }}
                                    </td>

                                    <td>
                                        <strong>{{ $computer->number }}</strong>
                                    </td>

                                    <td>{{ $computer->brand }}</td>

                                    <td class="text-center">

                                        <a href="{{ route('computers.edit', $computer->_id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('computers.destroy', $computer->_id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('¿Está seguro de eliminar este computador?');">

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
                    {{ $computers->links() }}
                </div>
            @else
                <div class="text-center py-5">

                    <i class="bi bi-pc-display-horizontal fs-1 text-secondary"></i>

                    <h4 class="mt-3">No se encontraron computadores</h4>

                    <p class="text-secondary mb-0">
                        Intenta realizar otra búsqueda o registra un computador.
                    </p>

                </div>
            @endif

        </div>

    </div>

@endsection
