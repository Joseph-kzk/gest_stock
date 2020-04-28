<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Type;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        $types = Type::all();
        return view('produits', compact('produits'), compact('types'));
        
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
            'nom' => 'required',
            'description' => 'required',
            'quantite' => 'required',
            'id_classe' => 'required',
            'seuil_securite' => 'required',
            'prix' => 'required'
        ]);
        $produits = new Produit([
            'nom' => $request->get('nom'),
            'description' => $request->get('description'),
            'quantite' => $request->get('quantite'),
            'id_classe' => $request->get('id_classe'),
            'seuil_securite' => $request->get('seuil_securite'),
            'prix' => $request->get('prix'),
        ]);
        $produits->save();

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Produit::findOrfail($id);
        return view('produits', compact('poduits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $produits = Produit::findOrfail($id);
        $produits-> update($request->all());
        return redirect()->route('Produits.index')->with('success', 'Produit Modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produits = Produit::findOrfail($id);
        $produits->delete();
        return redirect()->route('produits.index')->with('success', 'Produit Suppimé avec succès');
    }
}
