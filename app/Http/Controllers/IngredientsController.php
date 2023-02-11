<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryset = Ingredients::orderBy('created_at','desc')
            ->get();
            return  view('ingredients.index',["queryset"=>$queryset]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.create');
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
        if ($request->quantity == null){
            $request->merge(['quantity' => 5]);
        }
        if ($request->type == null){
            $request->merge(['type' => 'N/A']);
        }
        Ingredients::create($request->all());
        return redirect()->route('ingredients.index')
            ->with('success','Ingredient created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredients $ingredient)
    {
        $queryset = Ingredients::findOrFail($ingredient->id);
        return view('ingredients.show',["queryset"=>$queryset]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredients $ingredient)
    {
        $queryset = Ingredients::findOrFail($ingredient->id);
        return view('ingredients.edit',["queryset"=>$queryset]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredients $ingredient)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);
        $queryset = Ingredients::findOrFail($ingredient->id);
        $queryset->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'updated_at' => now(),
        ]);
        return redirect()->route('ingredients.index')
            ->with('success','Ingredient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredients $ingredient)
    {
        $queryset = Ingredients::findOrFail($ingredient->id);
        $queryset->delete();
        return redirect()->route('ingredients.index')
            ->with('success','Ingredient deleted successfully');
    }
    public function search(Request $request)
    {
        /*$query = $request->get('query');
        $queryset = Ingredients::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('ingredients.index',["queryset"=>$queryset]);
        */
        return response()->json($request->all());
    }
}
