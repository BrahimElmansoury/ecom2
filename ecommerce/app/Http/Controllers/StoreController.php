<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\panier;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $products = Product::query()->orderBy('created_at','desc')->get();
       // return view('store.index', compact('products'));
       $products = Product::query()->with('category')->paginate(10);
       //$paniers=Panier::all();
       $idProduits = Panier::pluck('id_produit');

       // Récupérer les détails des produits dans la table `products` en fonction de leurs IDs
       $productsInPanier = Product::whereIn('id', $idProduits)->get();
      
    //  dd($paniers);
       return view('store.index',compact('products','productsInPanier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product=new Product();
        return view('product.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formFields=$request->validated();
        if($request->hasFile('image'))
        {
            $formFields['image'] = $request->file('image')->store('product','public');
        }
        Product::create($formFields);
        return to_route('products.index')->with('success',"Product created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        
        
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $formFields=$request->validated();
        if($request->hasFile('image')) 
            {
                $formFields['image']=$request->file('image')->store('product','public');

            }
        $product->fill($formFields)->save();
        return to_route('products.index')->with('success','Porduct updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //$product->softDeletes();
        $product->delete();
        return to_route('products.index')->with('success',"Product deleted successfully");

    }
}
