<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Mail\TestMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class RproductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits=Produit::paginate(5);
        return view('home', ['products' => $produits ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Addproduit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        $request->validated();

         // récupérer les valeurs des champs :
         $titre=$request->input('nom');
         $prix=$request->input('prix');
         $categorie=$request->input('categorie');
         $image=$request->file('image')->getClientOriginalName();

         //Créer un objet Produit

         $Produit= new Produit();

         $Produit->titre=$titre;
         $Produit->prix=$prix;
         $Produit->categorie=$categorie;
         $Produit->image=$image;

           // enregistrer dans la table articles
         $Produit->save();

           // enregistrer dans le dossier (public\images)


           $request->file('image')->move(public_path('imgs'), $image);

           return back()->with('success','You have successfully added a new Product.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit=Produit::find($id);
       return view('edit')->with('produit', $produit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddProductRequest $request, $id)
    {
        $request->validated();

        // récupérer les nouvelles valeurs des champs :
        $titre=$request->input('nom');
        $prix=$request->input('prix');
        $categorie=$request->input('categorie');
        $image=$request->file('image')->getClientOriginalName();


       // récupérer l'objet Produit via l'id

        $Produit=Produit::find($id);

       // update with save



         $Produit->titre=$titre;
         $Produit->prix=$prix;
         $Produit->categorie=$categorie;
         $Produit->image=$image;


         $Produit->save();

          // enregistrer dans le dossier (public\images)


          $request->file('image')->move(public_path('imgs'), $image);


          return back()->with('successupdate','You have successfully updated a product.');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


         // récupérer l'objet article via l'id

         $Produit=Produit::find($id);


         // delete with delete

         $Produit->delete();

         return back()->with('successdelete','You have successfully deleted a product.');

    }
    public function cart()
    {


         return view('cart');

    }

    public function addToCart($id)
    {


        $product = Produit::find($id);


        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->nom,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->image
                    ]
            ];

            session()->put('cart', $cart);

            return back()->with('success', 'added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart); // this code put product of choose in cart

            return view('cart')->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->nom,
            "quantity" => 1,
            "price" => $product->prix,
            "photo" => $product->image
        ];

        session()->put('cart', $cart); // this code put product of choose in cart

        return view('cart')->with('success', 'Product added to cart successfully!');



    }


     // update product of choose in cart
 public function updatec(Request $request)
 {
     if($request->id and $request->quantity)
     {
         $cart = session()->get('cart');

         $cart[$request->id]["quantity"] = $request->quantity;

         session()->put('cart', $cart);

         
         return view('cart')->with('success', 'Product update to cart successfully!');

     }


 }

 // delete or remove product of choose in cart
 public function removec(Request $request)
 {
     if($request->id) {

         $cart = session()->get('cart');

         if(isset($cart[$request->id])) {

             unset($cart[$request->id]);

             session()->put('cart', $cart);
         }

         session()->flash('success', 'Product removed successfully');
     }

 }

 public function cataloguepdf(){
        
    // Récupérer les produits avec un solde égal à 1
    $products = Produit::limit(4)->get();         
    $data = [ 'products' => $products,];
    
    // Générer le PDF
    $pdf =Pdf::loadView('catalogue',$data);
    
    // Télécharger le PDF
    return $pdf->stream();             
    
}

}
