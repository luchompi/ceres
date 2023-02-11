@extends('layouts.base')
@section('title')
    Recetas - Ceres
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
                    <h4 class="card-title">Recetas en sistema</h4>
                    <a href="{{ route('recipes.create') }}" class="btn btn-primary">
                        Añadir
                    </a>
                </div>
                <p class="card-text">
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
                                            <a href="{{ route('recipes.show', [$row->id]) }}" class="btn btn-primary">
                                                Ver
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning" role="alert">
                            No hay recetas en el sistema
                        </div>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
