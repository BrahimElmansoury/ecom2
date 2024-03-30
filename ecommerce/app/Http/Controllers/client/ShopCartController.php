<?php

namespace App\Http\Controllers\client;

use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Client;
use App\Models\Product;
use App\Models\panier;
use App\Models\Paniers;


use App\Models\Commande;
use App\Models\Payement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        // Vérifier si la table "Paniers" est vide
        $paniersCount = Paniers::count();
    
        if ($paniersCount == 0) {
            // Si la table "Paniers" est vide, créer un nouveau panier
            $newPanier = new Paniers();
            $newPanier->save();
        }
    
        // Vérifier s'il existe déjà un enregistrement dans la table "Panier" pour ce produit
        $existingPanier = Panier::where('id_produit', $product->id)->first();
    
        if (!$existingPanier) {
            // S'il n'y a pas d'enregistrement pour ce produit, créer un nouveau panier
            $panier = new Panier();
            $panier->id_produit = $product->id;
            $panier->quantity = 1; // Par défaut, la quantité est 1
            $panier->price = $product->price;
            $panier->id_gpanier = Paniers::latest()->first()->id_gpanier; // Récupérer l'ID du dernier Panier
            $panier->save();
        }
    
        // Récupérer tous les produits dans le panier actuel
        $idProduits = Panier::pluck('id_produit');
        $products = Product::whereIn('id', $idProduits)->get();
    
        return view('client.cart', compact('product', 'products'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     

        
        // Valider les autres données du formulaire
    $validatedData = $request->validate([
        'fname' => 'required|string',
        'lname' => 'required|string',
        'city' => 'required|string',
        'rue' => 'required|string',
        'code-postal' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string',
        'tel' => 'required|string',
    ]);

    // Enregistrer les données de l'utilisateur dans la table des clients
    $hashedPassword = Hash::make($validatedData['password']);

    $client = new Client();
    $client->prenom = $validatedData['fname'];
    $client->nom = $validatedData['lname'];
    $client->ville = $validatedData['city'];
    $client->rue = $validatedData['rue'];
    $client->code_postal = $validatedData['code-postal'];
    $client->email = $validatedData['email'];
    $client->password = $hashedPassword;
    $client->telephone = $validatedData['tel'];
    $client->save();

    // Récupérer l'ID du client nouvellement créé
    $clientId = $client->id;
  

         // Valider les données du formulaire de paiement
    $validatedPaymentData = $request->validate([
        
        'card_number' => 'required|string',
        'expiry_date' => 'required|string',
        'cvv' => 'required|string',
        
    ]);
    $produitId=$request->id;
    // Créer une nouvelle instance de paiement et l'enregistrer dans la base de données
    $payement = new Payement();
    $payement->numero_card = $validatedPaymentData['card_number'];
    $payement->id_client = $clientId; 
    $payement->data_expiration = $validatedPaymentData['expiry_date'];
    $payement->ccv = $validatedPaymentData['cvv'];
    $payement->type_payment=$request->card_type;
    $payement->save();

    // Récupérer l'ID du paiement nouvellement créé
    $payementId = $payement->id;

  
   
    // Enregistrer la commande dans la table Commanded
    $commande = new Commande();
    
    $commande->id_client = $clientId;
    $commande->id_gpanier= Paniers::latest()->first()->id_gpanier; 
    $commande->date_cmd = now(); // Utilisez la date actuelle ou la date de la commande

    $commande->montant_total=$request->total;
    $commande->save();
    

        
        return redirect()->route('homepage');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
    public function checkout(Request $request,$id)
    {

        
        $product = Product::findOrFail($id);
        $totalPrice = $request->query('total');
     


        return view('client.checkout',compact('product','totalPrice'));
    }
}
