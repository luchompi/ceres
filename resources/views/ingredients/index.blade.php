@extends('layouts.base')
@section('title')
    Ingredientes - Ceres
@endsection
@section('content')
    <div class="col col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="container"
                    style="display: flex;
                            justify-content: space-between;
                            align-items: center;
                            text-align: center;">
                    <h4 class="card-title">Ingredientes en sistema</h4>
                    <a href="{{ route('ingredients.create') }}" class="btn btn-primary">
                        Añadir
                    </a>
                </div>
                <p class="card-text">
                    <!--<form action="{{ url('ingredients/search') }}" method="GET">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="query" name="query" placeholder="Ex. Honey"
                                required>
                            <label for="floatingInput">Buscar</label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submite" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                -->
                    @if ($queryset->count() > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                @foreach ($queryset as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            <a href="{{ route('ingredients.show', [$row->id]) }}" class="btn btn-primary">
                                                Ver
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning" role="alert">
                            No hay ingredientes en el sistema
                        </div>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
