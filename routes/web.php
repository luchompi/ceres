<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\StoreController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

//Ingredients URL
Route::resource('ingredients',IngredientsController::class);

//Recipes URL
Route::resource('recipes',RecipesController::class);
//list ingredients for recipe
Route::get('recipes/{recipes_id}/add_ingredient', [RecipesController::class, 'addIngredient'])->name('recipes.addIngredient');
//Add ingredient to recipe
Route::post('recipes/{recipes_id}/save_ingredient', [RecipesController::class, 'saveIngredient'])->name('recipes.saveIngredient');
//Remove ingredient from recipe
Route::delete('recipes/{recipes_id}/delete/{ingredient_id}', [RecipesController::class, 'deleteIngredient'])->name('recipes.deleteIngredient');


//Orders URL
Route::resource('orders',OrdersController::class);

//Inventories URL
//List inventories
Route::get('inventories/', [StoreController::class, 'index'])->name('inventories.index');
//get ingredients
Route::get('inventories/{ingredients_id}/buy', [StoreController::class, 'create'])->name('inventories.create');
