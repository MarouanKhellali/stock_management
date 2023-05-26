<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class etat_de_stockController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
{
    $produits = Produit::all();
    $produits = Produit::orderBy('id_produit', 'desc')->get();
    return view('layout.etatStock.etatDeStock')->with('produits', $produits);; 
    
}

     
}