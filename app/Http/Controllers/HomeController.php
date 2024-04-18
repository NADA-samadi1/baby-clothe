<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $produits=Produit::paginate(5);
    
    // return(dd($produits));
    return view('home',compact('produits'));
    
    }
    public function product_detail($id){
        $produit = Produit::find($id);
        return view('product_detail', compact('produit'));
    }
    public function addtocart($id){
        $produit=Produit::findOrfail($id);
        $cart=session()->get('cart',[]);
        if (isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id]=[
                "titre"=>$produit->titre,
                "image"=>$produit->image,
                "categorie"=>$produit->categorie,
                "quantity"=>1,
                "prix"=>$produit->prix,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','product has been added to cart');
    }


}



