@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">

                        <i class="bi bi-pencil-square"></i>

                        Editar Área

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

                    <form action="{{ route('areas.update', $area->_id) }}" method="POST">

                        @csrf

                        @method('PUT')

                        <div class="mb-4">

                            <label class="form-label">

                                Nombre del área

                            </label>

                            <input type="text" name="name" class="form-control" value="{{ $area->name }}" required>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-success">

                                <i class="bi bi-check-circle"></i>

                                Actualizar

                            </button>

                            <a href="{{ route('areas.index') }}" class="btn btn-secondary">

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
