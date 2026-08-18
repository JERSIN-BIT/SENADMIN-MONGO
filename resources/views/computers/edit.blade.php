@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square"></i>
                        Editar Computador
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

                    <form action="{{ route('computers.update', $computer->_id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">Número o código</label>

                            <input type="text" name="number" class="form-control"
                                value="{{ old('number', $computer->number) }}" required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Marca</label>

                            <input type="text" name="brand" class="form-control"
                                value="{{ old('brand', $computer->brand) }}" required>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle"></i>
                                Actualizar
                            </button>

                            <a href="{{ route('computers.index') }}" class="btn btn-secondary">
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
