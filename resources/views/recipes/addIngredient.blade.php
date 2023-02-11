@extends('layouts.base')
@section('title')
    Detalles de Receta - Ceres
@endsection
@section('content')
    <div class="col col-lg-10">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Receta {{ $recipe_id }}</h4>
                <p class="card-text">
                    <!--Formulario de ingredientes-->
                <form action="{{ route('recipes.saveIngredient', $recipe_id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-control">
                        <label for="ingredients_id">Ingrediente</label>
                        <select name="ingredients_id" id="ingredients_id" class="form-control">
                            @foreach ($queryset as $ingredient)
                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="quantity">Cantidad</label>
                        <input type="number" name="quantity" id="quantity" class="form-control">
                    </div>
                    <div class="button-group">
                        <button type="submit" class="btn btn-success">Añadir</button>
                        <a href="{{ route('recipes.show', $recipe_id) }}" class="btn btn-secondary">Atrás</a>
                    </div>

                </form>
                </p>
            </div>
        </div>
    </div>
@endsection
