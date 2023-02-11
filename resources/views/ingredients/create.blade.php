@extends('layouts.base')
@section('title')
    Añadir ingrediente - Ceres
@endsection
@section('content')
    <div class="col col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Añadir nuevo ingrediente</h4>
                <p class="card-text">
                <form action="{{ route('ingredients.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ex. Honey"
                            required>
                        <label for="floatingInput">Nombre del Ingrediente</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Ex. 5">
                        <label for="floatingInput">Cantidad</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="type" name="type"
                            placeholder="Ex. Condiment">
                        <label for="floatingInput">Descripcion</label>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submite" class="btn btn-primary">Guardar</button>
                        <a type="button" href="{{ route('ingredients.index') }}" class="btn btn-danger">Atrás</a>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
@endsection
