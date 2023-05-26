<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class etat_de_stockController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
{
    // Retrieve distinct years from the database
    $dateOptions = DB::table('produits')
        ->select(DB::raw('YEAR(date_enter) as year'))
        ->distinct()
        ->pluck('year');

    $query = Produit::orderBy('id_produit', 'desc');
    $selectedYear = $request->input('date_enter');

    if ($selectedYear !== '') {
        $query->whereYear('date_enter', $selectedYear);
    }

    $produits = $query->get();

    // If "Choisir l'année" option is selected, show all products
    if ($selectedYear === '') {
        $produits = Produit::orderBy('id_produit', 'desc')->get();
    }

    return view('layout.etatStock.etatDeStock', compact('produits', 'dateOptions'));
}

     
}