<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $queryset = Recipes::orderBy('created_at','desc')
            ->get();
        return view('welcome',["queryset"=>$queryset]);
    }
}
