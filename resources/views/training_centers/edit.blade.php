@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">

                        <i class="bi bi-pencil-square"></i>

                        Editar Centro de Formación

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

                    <form action="{{ route('training-centers.update', $trainingCenter->_id) }}" method="POST">

                        @csrf

                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">
                                Nombre del centro
                            </label>

                            <input type="text" name="name" class="form-control" value="{{ $trainingCenter->name }}"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Dirección
                            </label>

                            <input type="text" name="address" class="form-control" value="{{ $trainingCenter->address }}"
                                required>

                        </div>

                        <button type="submit" class="btn btn-success">

                            <i class="bi bi-check-circle"></i>
                            Actualizar

                        </button>

                        <a href="{{ route('training-centers.index') }}" class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>
                            Cancelar

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
