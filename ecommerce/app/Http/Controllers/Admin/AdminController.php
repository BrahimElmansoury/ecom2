<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function indexAdmin()
    {
        return view('admin.indexAdmin');
    }

    public function order()
    {
        $orders = Commande::all(); // Récupérez toutes les commandes de la base de données
      //  $orders->id_cl;

        return view('admin.order',compact('orders'));
    }
    public function product()
    {
        $products = Product::query()->paginate(10);
        $categories = Category::all();
        return view('admin.product', compact('products', 'categories'));
    }
   
    public function category()
    {
        $categories = Category::all();
        return view('admin.category', ['categories' => $categories]);
    }
    

 

    //
    public function showStockForm()
{
    $products = Product::all();
    return view('admin.stock', compact('products'));
}
public function addStock(Request $request)
    {
        // Recherchez le produit dans la base de données en fonction du nom du produit
        $product = Product::where('name', $request->pname)->first();
        //dd($request->pname);
       // dd($product);
        // Vérifiez si le produit existe
       
            // Créez une nouvelle entrée de stock pour le produit avec les données spécifiées
            $stock = new Stock();
            $stock->Product_name = $product->name;
            $stock->Stock_in = $request->quantity; // Utilisez quantity pour Stock_in si c'est la quantité entrante
            $stock->save();

            // Redirigez l'utilisateur avec un message de succès
            return redirect()->route('admin.stock')->with('success', 'Le stock a été ajouté avec succès.');
      
    }
}