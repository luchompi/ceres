@extends('layouts.base')
@section('title')
    Tienda de Ingredientes - Ceres
@endsection
@section('content')
    <div class="col col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Considere hacer pedido de estos insumos</h4>
                <p class="card-text">
                <ul>
                    @if ($queryset->count() > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($queryset as $ingredient)
                                    <tr>
                                        <td>{{ $ingredient->name }}</td>
                                        <td>{{ $ingredient->quantity }}</td>
                                        <td>
                                            <a href="{{ route('inventories.create', [$ingredient->id]) }}"
                                                class="btn btn-primary">Hacer
                                                pedido</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">No disponible</h4>
                            <p>No es necesario hacer pedidos en este momento</p>
                        </div>
                    @endif
                </ul>
                </p>
            </div>
        </div>
    </div>
@endsection
