<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('classenomenclature', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required',
            'description' => 'required'
        ]);

        $types = new Type([
            'numero' => $request->get('numero'),
            'description' => $request->get('description'),
        ]);
        $types->save();

        return redirect()->route('types.index')->with('success', 'Classe Nomenclature ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::findOrfail($id);
        return view('classenomenclature', compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $types = Type::findOrfail($id);
        $types-> update($request->all());
        return redirect()->route('types.index')->with('success', 'Classe Nomenclature Modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $types = Type::findOrfail($id);
        $types->delete();
        return redirect()->route('types.index')->with('success', 'Classe Nomenclature Supprimée avec succès');
    }
}
