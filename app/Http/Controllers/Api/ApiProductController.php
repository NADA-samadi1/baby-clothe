<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits=Produit::all();

        return response()->json($produits);
    }


// Méthode de recherche d'articles
public function filtrer(Request $request)
{
    // Récupération de la chaîne de caractères de recherche
    $query = $request->input('p');

    // Recherche des articles correspondants
    $produits = Produit::where('nom', 'like', "%$query%")->get();

    // Renvoi des articles au format JSON
    return response()->json($produits);





   }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Produit = new Produit;
        $Produit->nom = $request->input('nom');
        $Produit->prix = $request->input('prix');
        $Produit->categorie = $request->input('categorie');
          // Upload de l'image
    if ($request->hasFile('image')) {
        $imageName=$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('imgs'), $imageName);
        $Produit->image = $imageName;
    }
		
		
		
		
		$Produit->save();

    return response()->json(['message' => 'produit ajouté avec succès!', 'product' => $Produit]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
