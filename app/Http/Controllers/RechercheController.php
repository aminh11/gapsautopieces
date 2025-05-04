<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class RechercheController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('q');

    $resultats = Product::where('name', 'LIKE', '%' . $query . '%')
        ->orWhere('description', 'LIKE', '%' . $query . '%')
        ->get();

    $count = $resultats->count(); 

    return view('resultats', compact('query', 'resultats', 'count'));
}
}
