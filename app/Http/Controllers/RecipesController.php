<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Recipes;
use App\Models\Ingredients;
use Illuminate\Support\Facades\DB;
class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryset = Recipes::orderBy('created_at', 'desc')
        ->get();
        return view('recipes.index', ['queryset' => $queryset]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        if($request->description == null){
            $request->merge(['description' => 'No description']);
        };
        if($request->instructions == null){
            $request->merge(['instructions' => 'No instructions']);
        };
        if($request->status == null){
            $request->merge(['status' => 'Preparable']);
        };
        Recipes::create($request->all());
        return redirect()->route('recipes.index')
            ->with('success', 'Recipe created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function show(Recipes $recipe)
    {
        $queryset = Recipes::findOrFail($recipe->id);
        $ingredients = DB::table('ingredients_recipes')
            ->join('ingredients', 'ingredients.id', '=', 'ingredients_recipes.ingredients_id')
            ->select('ingredients.name', 'ingredients_recipes.quantity','ingredients_recipes.id')
            ->where('ingredients_recipes.recipes_id', '=', $recipe->id)
            ->get();
        return view('recipes.show', ['queryset' => $queryset, 'ingredients' => $ingredients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipes $recipe)
    {
        $queryset = Recipes::findOrFail($recipe->id);
        return view('recipes.edit', ['queryset' => $queryset]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipes  $Recipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipes $recipe)
    {
        $request->validate([
            'name' => 'required',
        ]);
        if($request->description == null){
            $request->merge(['description' => 'No description']);
        };
        if($request->instructions == null){
            $request->merge(['instructions' => 'No instructions']);
        };
        $queryset = Recipes::findOrFail($recipe->id);
        $queryset->update([
            'name' => $request->name,
            'description' => $request->description,
            'instructions' => $request->instructions,
        ]);
        return redirect()->route('recipes.index')
            ->with('success', 'Recipe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipes  $Recipes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipes $recipe)
    {
        $queryset = Recipes::findOrFail($recipe->id);
        $queryset->delete();
        return redirect()->route('recipes.index')
            ->with('success', 'Recipe deleted successfully');
    }

    /*Ingredientes a añadir a la receta*/
    public function addIngredient($recipe_id, Request $request)
    {
        $queryset = Ingredients::all();
        return view('recipes.addIngredient', ['queryset' => $queryset, 'recipe_id' => $recipe_id]);
    }

    /*Guardar ingredientes a añadir a la receta*/
    public function saveIngredient($recipe_id, Request $request)
    {
        $request->validate([
            'ingredients_id' => 'required',
            'quantity' => 'required',
        ]);
        DB::table('ingredients_recipes')->insert([
            'recipes_id' => $recipe_id,
            'ingredients_id' => $request->ingredients_id,
            'quantity' => $request->quantity,
        ]);
        $queryset = Recipes::findOrFail($recipe_id);
        $ingredients = DB::table('ingredients_recipes')
            ->join('ingredients', 'ingredients.id', '=', 'ingredients_recipes.ingredients_id')
            ->select('ingredients.name', 'ingredients_recipes.quantity','ingredients_recipes.id')
            ->where('ingredients_recipes.recipes_id', '=', $recipe_id)
            ->get();
        return view('recipes.show', ['queryset' => $queryset,'ingredients' => $ingredients]);
    }

    /*Ingredientes a eliminar de la receta*/
    public function deleteIngredient($recipe_id,$id)
    {
        DB::table('ingredients_recipes')->where('id', '=', $id)->delete();
        $queryset = Recipes::findOrFail($recipe_id);
        $ingredients = DB::table('ingredients_recipes')
            ->join('ingredients', 'ingredients.id', '=', 'ingredients_recipes.ingredients_id')
            ->select('ingredients.name', 'ingredients_recipes.quantity','ingredients_recipes.id')
            ->where('ingredients_recipes.recipes_id', '=', $recipe_id)
            ->get();
        return view('recipes.show', ['queryset' => $queryset, 'ingredients' => $ingredients]);
    }

}
