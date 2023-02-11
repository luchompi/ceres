@extends('layouts.base')
@section('title')
    Detalles de Receta - Ceres
@endsection
@section('content')
    <div class="col col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="container"
                    style="display: flex;
                            justify-content: space-between;
                            align-items: center;
                            text-align: center;">
                    <h4 class="card-title">Detalles de la Receta {{ $queryset->id }}</h4>
                    <form action="{{ route('recipes.destroy', [$queryset->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a type="button" href="{{ route('recipes.edit', [$queryset->id]) }}"
                                class="btn btn-warning">Editar</a>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a type="button" href="{{ route('recipes.index') }}" class="btn btn-secondary">Atrás</a>
                        </div>
                    </form>
                </div>
                <p class="card-text">

                    <!--Contenedor-->
                <div class="container">
                    <!--Nombre de receta-->
                    <div class="row">
                        <h4>Receta: {{ $queryset->name }}</h4>
                    </div>
                    <!--/Nombre de receta-->
                    <!--Descripcion de Receta-->
                    <div class="row">
                        <h6>Descripción: {{ $queryset->description }}</h6>
                    </div>
                    <!--/Descripcion de Receta-->
                    <!--Datos de preparacion-->
                    <div class="row">
                        <!--Informacion de Preparacion-->
                        <div class="col">
                            <p>Preparación: {{ $queryset->instructions }}</p>
                        </div>
                        <!--/Informacion de Preparacion-->
                        <!--Ingredientes-->
                        <div class="col">
                            <h6>Ingredientes <a href="{{ route('recipes.addIngredient', $queryset->id) }}"
                                    class="btn btn-info">Añadir</a></h6>
                            @if ($ingredients->count() > 0)
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Opciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($ingredients as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->quantity }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('recipes.deleteIngredient', [$queryset->id, $row->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </div>
                                                    </form>
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
                        </div>
                        <!--/Ingredientes-->

                    </div>
                    <!--/Datos de preparacion-->
                </div>
                <!--/Contenedor-->
                </p>
            </div>
        </div>
    </div>
@endsection
