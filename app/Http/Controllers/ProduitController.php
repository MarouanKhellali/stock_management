<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $produits = Produit::orderBy('id_produit', 'desc')->paginate(8);
        return view('layout.Produit.produits')->with('produits', $produits);
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        //
        return view('layout.Produit.ajouteProduit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the form data
        $validated = $request->validate([
            'nom_p' => 'required|string|max:255',
            'libelle_p' => 'required|string|max:255',
            'qte_p' => 'required|numeric|min:1',
            'date_enter' => 'required|date'
        ]);

        // Generate a random auto-incremented ref_p value
        $randomNumber = mt_rand(1, 999999); // Generate a random 3-digit number
        $ref_p = 'abhdon-'  . str_pad($randomNumber + 1, 3, '0', STR_PAD_LEFT);

        // create a new product object with the validated data
        $produit = new Produit();
        $produit->nom_p = $validated['nom_p'];
        $produit->ref_p = $ref_p;
        $produit->libelle_p = $validated['libelle_p'];
        $produit->qte_p = $validated['qte_p'];
        $produit->qte_d = $validated['qte_p'];
        $produit->date_enter = $validated['date_enter'];

        // save the product to the database
        $produit->save();

        return redirect('/produits')->with('success', 'Produit ajouté avec succès!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $produit = Produit::where('id_produit', $id)->first();
        return view('layout.Produit.view')->with('produits', $produit);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $produit = Produit::where('id_produit', $id)->first();
        return view('layout.Produit.edit')->with('produits', $produit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produit = Produit::where('id_produit', $id)->first();
        if (!$produit) {
            return redirect('produits')->with('flash_message', 'Produit non trouvé!');
        }

        // validate the form data
        $validated = $request->validate([
            'nom_p' => 'required|string|max:255',
            'libelle_p' => 'required|string|max:255',
            'qte_p' => 'required|numeric|min:1',
            'date_enter' => 'required|date'
        ]);


        $qte_db = $validated['qte_p'] -  $produit->qte_p ;

        // update the product with the validated data
        $produit->nom_p = $validated['nom_p'];
        $produit->libelle_p = $validated['libelle_p'];

        $produit->qte_p = $validated['qte_p'];
        $produit->qte_d = $qte_db + $produit->qte_d ;

        $produit->date_enter = $validated['date_enter'];

        // save the updated product to the database
        $produit->save();

        return redirect('produits')->with('flash_message', 'Produit a été modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Produit::where('id_produit', $id)->delete();
        return redirect('produits')->with('lash_message', 'produits deleted!');
    }
}
