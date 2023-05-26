<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {   
        
        $agents = Agent::orderBy('id_agent', 'desc')->get();
        return view('layout.Agent.agents', compact('agents'));
    }

    public function getAgents(Request $request)
    {
        $serviceId = $request->input('service_id');
        $agents = Agent::whereHas('service', function ($query) use ($serviceId) {
            $query->where('id_service', $serviceId);
        })->get();

        return view('layout.SortieProoduit.sortirProduit', compact('services', 'agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $agents = Agent::all();
        return view('layout.Agent.ajouteAgent', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        Agent::create($input);
        return redirect('agents')->with('flash_message', 'agent Addedd !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $agent = Agent::where('id_agent', $id)->first();
        return view('layout.Agent.view')->with('agents', $agent);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $agent = Agent::where('id_agent', $id)->first();
        return view('layout.Agent.edit')->with('agents', $agent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agent = Agent::where('id_agent', $id);
        if (!$agent) {
            return redirect('agents')->with('flash_message', 'agent not found!');
        }

        $input = $request->except(['_token', '_method']);
        $agent->update($input);

        return redirect('agents')->with('flash_message', 'agent updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Agent::where('id_agent', $id)->delete();
        return redirect('agents')->with('lash_message', 'agents deleted!');
    }
}
