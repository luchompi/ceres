@extends('layouts.base')
@section('title')
    Crear Recetas - Ceres
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
                    <h4 class="card-title">Crear Receta Nueva</h4>
                </div>
                <p class="card-text">
                <form action="{{ route('recipes.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Ex. Alitas BBQ" required>
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="description" name="description"
                            placeholder="Ex. Alitas BBQ">
                        <label for="floatingInput">Descripción</label>
                    </div>
                    <div class="form-control mb-3">
                        <label for="floatingInput">Preparación</label>
                        <textarea class="form-control" id="instructions" name="instructions" placeholder="Ex. Alitas BBQ">
                        </textarea>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href={{ route('recipes.index') }} type="button" class="btn btn-danger">Atrás</a>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
@endsection
