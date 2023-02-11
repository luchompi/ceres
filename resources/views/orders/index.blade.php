@extends('layouts.base')
@section('title')
    Pedidos - Ceres
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
                    <div class="container"
                        style="display: flex;
                            justify-content: space-between;
                            align-items: center;
                            text-align: center;">
                        <h4 class="card-title">Pedidos</h4>
                        <a href="{{ route('orders.create') }}" class="btn btn-primary">
                            Solicitar Plato
                        </a>
                    </div>
                </div>
                <p class="card-text">
                    @if ($recipes->count() > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                @foreach ($recipes as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->recipes->name }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>
                                            <form action="{{ route('orders.destroy', [$row->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    @if ($row->status == 'En proceso')
                                                        <a href="{{ route('orders.edit', [$row->id]) }}" type="button"
                                                            class="btn btn-success">Entregar</a>
                                                    @endif
                                                    <button type="submit" class="btn btn-danger">Cancelar</button>

                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning" role="alert">
                            No hay Ordenes en el sistema
                        </div>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
