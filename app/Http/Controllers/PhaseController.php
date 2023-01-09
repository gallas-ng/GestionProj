<?php

namespace App\Http\Controllers;

use App\Models\phase;
use App\Models\projet;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $phases = phase::paginate(10);
        $view_data['phases'] = $phases;
        return view('create_phase')->with($view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(projet $projet)
    {
        //
        $view_data['page_title'] = 'Create phase';
        //$projet = $projet;
        return view('create_phase',compact('projet'))->with($view_data,$projet);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, projet $projet)
    {
        //
        $request->validate([
            'nom' => 'required',
            'duree' => 'required',
            'priorite' => 'required',     
        ]);

        $request_data = $request->all();
        
        
        phase::create([
            'nom' => $request_data['nom'],
            'duree' => $request_data['duree'],
            'priorite' => $request_data['priorite'],
            'id' => $request_data['id']
        ]);


        
        return redirect()->route('projets.index')->with('success', 'phase created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function show(phase $phase)
    {
        //
        return view('create_phase', compact('phase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit(phase $phase)
    {
        //
        return view('edit_phase', compact('phase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, phase $phase)
    {
        //
        $request->validate([
            'nom' => 'required',
            'duree' => 'required',
            'priorite' => 'required',
            'id' => 'required'
        ]);

        $phase->update($request->all());

        return redirect()->route('projets.show')->with('success','Phase updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function destroy(phase $phase)
    {
        //
        $phase->delete();

        return redirect()->route('projets.show')->with('success', 'Phase deleted successfully');
    }
}
