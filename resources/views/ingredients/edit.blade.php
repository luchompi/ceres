@extends('layouts.base')
@section('title')
    Editar Ingrediente - Ceres
@endsection
@section('content')
    <div class="col col-lg-6">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Actualizar datos de Ingrediente</h4>
                <p class="card-text">
                <form action="{{ route('ingredients.update', [$queryset->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $queryset->name }}"
                            required>
                        <label for="floatingInput">Nombre del Ingrediente</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="quantity" name="quantity"
                            value="{{ $queryset->quantity }}" placeholder="Ex. 5">
                        <label for="floatingInput">Cantidad</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="type" name="type"
                            value="{{ $queryset->type }}">
                        <label for="floatingInput">Descripcion</label>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submite" class="btn btn-warning">Guardar cambios</button>
                        <a type="button" href="{{ route('ingredients.show', [$queryset->id]) }}"
                            class="btn btn-danger">Atrás</a>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
@endsection
