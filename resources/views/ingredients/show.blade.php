@extends('layouts.base')
@section('title')
    Detalle de Ingrediente - Ceres
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
                    <h4 class="card-title">Detalles del ingrediente</h4>
                    <form action="{{ route('ingredients.destroy', [$queryset->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a type="button" href="{{ route('ingredients.edit', [$queryset->id]) }}"
                                class="btn btn-warning">Editar</a>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a type="button" href="{{ route('ingredients.index') }}" class="btn btn-secondary">Atrás</a>
                        </div>
                    </form>
                </div>
                <p class="card-text">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Creado el</th>
                        <th>Actualizado el</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $queryset->id }}</td>
                            <td>{{ $queryset->name }}</td>
                            <td>{{ $queryset->quantity }}</td>
                            <td>{{ $queryset->type }}</td>
                            <td>{{ $queryset->created_at }}</td>
                            <td>{{ $queryset->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
                </p>
            </div>
        </div>
    </div>
@endsection
