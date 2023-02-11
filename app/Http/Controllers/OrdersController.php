<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Models\Orders;
use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Exception;

class OrdersController extends Controller
{
    public function index()
    {
        $recipes = Orders::orderBy('created_at', 'desc')
            ->get();
        return view('orders.index',['recipes' => $recipes]);
    }

    public function create()
    {
        try{
            $recipes = Recipes::all()->random();
            $object = DB::table('ingredients_recipes')
                ->where('recipes_id', $recipes->id)
                ->get();
            $ingredients = Ingredients::all();
            foreach($object as $o){
                foreach ($ingredients as $i) {
                    try {
                        DB::beginTransaction();
                        if ($i->id == $o->ingredients_id and $i->quantity > $o->quantity) {
                            $i->quantity = $i->quantity - $o->quantity;
                            $i->save();
                        }
                        else{

                                throw new Exception('No hay suficientes ingredientes');

                        }
                        DB::commit();
                        $order = new Orders();
                        $order->status = 'En proceso';
                        $order->recipes_id = $recipes->id;
                        $order->save();
                    }
                    catch (Exception $e){
                        DB::rollBack();
                        $recipes->status = "No Preparable";
                        $recipes->save();
                    }
                }
            }
            return redirect()->route('orders.index');

        }
        catch (\Exception $e){
            return redirect()->route('orders.index');
        }
    }

    public function store(Request $request)
    {

        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $order = Orders::find($id);
        $order->status = 'Entregado';
        $order->save();
        return redirect()->route('orders.index');
    }

    public function update(Request $request, $id)
    {
//
    }

    public function destroy($id)
    {
        $order = Orders::find($id);
        $object = DB::table('ingredients_recipes')
                ->where('recipes_id', $order->recipes_id)
                ->get();
            $ingredients = Ingredients::all();
            foreach($object as $o){
                foreach ($ingredients as $i) {

                        DB::beginTransaction();
                        if ($i->id == $o->ingredients_id ) {
                            $i->quantity = $i->quantity + $o->quantity;
                            $i->save();
                        }
                    }
                }
                DB::commit();
                $queryset = Recipes::find($order->recipes_id);
                $queryset->status = "Preparable";
                $queryset->save();
                $order->delete();
                return redirect()->route('orders.index');

    }


}
