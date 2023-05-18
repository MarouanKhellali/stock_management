<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Produit;

class sortirProduit extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $produits = Produit::all() ;
        $services = Service::all();
        return view('layout.SortieProoduit.sortirProduit', compact('services' , 'produits'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function getAgents(Request $request)
    {
        $serviceId = "";
        if ($request->has('service_id')) {
            $serviceId = $request->input('service_id');
        }
        $agents = DB::table("services")->where("services.id_service", $serviceId)
            ->join("agent_service", "agent_service.id_service", "services.id_service")
            ->join("agents", "agents.id_agent", "agent_service.id_agent")
            ->select("agents.nom_agent", "agents.prenom_agent", "agents.id_agent")
            ->get();
        return response()->json($agents);
    }
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $product = Produit::where('id_produit', $request->id)->first();
        Produit::where('id_produit', $request->id)->update(['qte_p' => $product->qte_p - $request->quantity]);

        return redirect('produits')->with('flash_message', 'Produit à été modifier!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
