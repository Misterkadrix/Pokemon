<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemon = Pokemon::all();
        return view ('pages/pokemon/pokemon',compact('pokemon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages/pokemon/pokemonCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPkm = new Pokemon;
        $newPkm->nom = $request->nom;
        $newPkm->type = $request->type;
        $newPkm->niveau = $request->niveau;
        $newPkm->src = $request->file('src')->hashName();
        $newPkm->save();
        $request->file('src')->storePublicly('images','public');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pokemon = Pokemon::find($id);
        return view ('pages.pokemon.pokemonEdit',compact('pokemon'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newPkm = Pokemon::find($id);
        $newPkm->nom = $request->nom;
        $newPkm->type = $request->type;
        $newPkm->niveau = $request->niveau;
        $newPkm->src = $request->file('src')->hashName();
        $newPkm->save();
        $request->file('src')->storePublicly('images','public');
        return redirect('/pokemon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete = Pokemon::find($id);
      Storage::disk('public')->delete('/images/'.$delete->src);
      $delete->delete();
      return redirect('/pokemon');
    }
}
