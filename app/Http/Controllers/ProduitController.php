<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
class ProduitController extends Controller
{



public function espaceadmin(){


    $produits=Produit::paginate(5);
    return view('espaceadmin',['products' => $produits ]);

}
public function espaceclient(){



    return view('espaceclient');

}

public function getProdByCat(Request $rq){


$cat=$rq->route('cat');

    $produits = Produit::where('categorie', '=', $cat)->get();

    return view('Produits', [
       'products' => $produits,
       'categorie' => $cat
       ]);

}

public function email()
{
    return view('email');
}

public function sendEmail(Request $request)
{
    $data = [
        'recipient_email' => $request->input('recipient_email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
    ];

    // Envoyer l'e-mail en utilisant la classe Mailable
    mail::to($data['recipient_email'])->send(new TestMail($data));

    return back()->with('success','Email sent successfully!');
}

}
