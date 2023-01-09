<?php

namespace App\Http\Controllers;

use App\Models\phase;
use App\Models\projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projets = projet::paginate(10);
        $view_data['projets'] = $projets;
        return view('index')->with($view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $view_data['page_title'] = 'Create Projet';
        return view('create')->with($view_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required',
            'Description' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $request_data = $request->all();

        projet::create([
            'nom' => $request_data['nom'],
            'Description' => $request_data['Description'],
            'date_debut' => $request_data['date_debut'],
            'date_fin' => $request_data['date_fin'],
        ]);

        return redirect()->route('projets.index')->with('success', 'Projet created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(projet $projet)
    {
        //
        $phases  =  $projet->phase();
        return view('show', compact('projet','phases'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(projet $projet)
    {
        //
        return view('edit', compact('projet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projet $projet)
    {
        //
        $request->validate([
            'nom' => 'required',
            'Description' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $projet->update($request->all());

        return redirect()->route('projets.index')->with('success','Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(projet $projet)
    {
        //
        $projet->delete();

        return redirect()->route('projets.index')->with('success', 'Project deleted successfully');
    }

    public function getPhases(projet $projet)
    {
        $phases = $projet->phase();
        return $phases;
    }

    }

