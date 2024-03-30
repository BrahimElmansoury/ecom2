<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\panier;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->paginate(1);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */

    //  public function create()
    //  {
    //      // Vous pouvez passer des données supplémentaires à la vue si nécessaire
    //      $categories = Category::all(); // Supposons que vous ayez un modèle Category également
    //      return view('products.create', compact('categories'));
    //  }

    public function create()
    {
        // Créez une instance vide de Product
        $product = new Product();
        // Récupérez toutes les catégories
        $categories = Category::all();
        // Retournez la vue pour créer un nouveau produit en passant le produit et les catégories
        return view('admin.create', compact('product', 'categories'));
    }
    
// Méthode pour stocker une nouvelle catégorie
public function storeCategory(Request $request)
{
    $request->validate([
        'cat_name' => 'required|string|max:255',
        
    ]);

    Category::create([
        'name' => $request->cat_name,
    ]);

    return redirect()->route('admin.category')->with('success', 'Category added successfully');
}    /**
     * Show the form for creating a new resource.
     */
   
    

    
    public function storeProduct(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'pname' => 'required|string',
            'price' => 'required|numeric',
            'sdesc' => 'required|string',
            'category' => 'required|numeric', // Assurez-vous que le champ de la catégorie est requis et numérique
            'quantite' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       
    
        // Créez un nouveau produit dans la base de données
        $product = new Product();
        $product->name = $validatedData['pname'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['sdesc'];
        $product->category_id= $validatedData['category']; // Utilisez la colonne "category_id"
        $product->quantity = $validatedData['quantite'];

    
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('product', 'public');
            $product->image = $validatedData['image']; // Assurez-vous d'assigner le chemin de l'image à la propriété "image"
        }
        
        
        // Enregistrez le produit
        $product->save();
    
        // Redirigez l'utilisateur vers la page de produit avec un message de succès
        return redirect()->route('admin.product')->with('success', 'Le produit a été ajouté avec succès.');
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
        return to_route('admin.index')->with('success',"Product created successfully");
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
         $products = Product::query()->with('category')->paginate(10);
 /*
        return view('client.product', compact('product','products'));
        */
      
         $product = Product::findOrFail($id);
         return view('client.product', compact('product','products'));

    }
    public function indexAdmin()
    {
        return view('admin.indexAdmin');
    }

    /**
     * Show the form for editing the specified resource.
     */
   
      // Méthode pour afficher le formulaire d'édition d'un produit
      public function edit(Product $product)
      {
          $categories = Category::all();
          return view('admin.edite', compact('product', 'categories'));
      }
  
      // Méthode pour mettre à jour les informations d'un produit
    //   public function update(Request $request, Product $product)
    //   {
    //      dd($request->all());
    //       // Valider les données de la requête
    //       $validatedData = $request->validate([
    //           'pname' => 'required|string',
    //           'price' => 'required|numeric',
    //           'sdesc' => 'required|string',
    //           'category' => 'required|numeric',
    //           'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //       ]);
          
    //       // Mettre à jour les attributs du produit avec les nouvelles valeurs
    //       $product->name = $validatedData['pname'];
    //       $product->price = $validatedData['price'];
    //       $product->description = $validatedData['sdesc'];
    //       $product->category_id = $validatedData['category'];
      
    //       // Mettre à jour l'image si elle est présente dans la requête
    //       if ($request->hasFile('image')) {
    //           $imagePath = $request->file('image')->store('product', 'public');
    //           $product->image = $imagePath;
    //       }
      
    //       // Enregistrer les modifications apportées au produit
    //       $product->save();
      
    //       // Rediriger avec un message de succès
    //       return redirect()->route('admin.product')->with('success', 'Product updated successfully');
    //   }
    public function update(Request $request, Product $product)
{
    // dd($request->all());

    // Mettre à jour les attributs du produit avec les nouvelles valeurs
    $product->name = $request->input('pname');
    $product->price = $request->input('price');
    $product->description = $request->input('sdesc');
    $product->category_id = $request->input('category');

    // Mettre à jour l'image si elle est présente dans la requête
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('product', 'public');
        $product->image = $imagePath;
    }

    // Enregistrer les modifications apportées au produit
    $product->save();

    // Rediriger avec un message de succès
    return redirect()->route('admin.product')->with('success', 'Product updated successfully');
}

      
  
    public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('admin.product')->with('success', 'Product deleted successfully');
}


    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
   
    public function removeProduct(Request $request, $id)
    {
        
        
        // Recherchez l'entrée dans la table Panier avec l'id_produit correspondant
        $panier = panier::where('id_produit', $id)->first();
        
        if ($panier) {
            // Supprimez l'entrée du panier
           
            $panier->delete();
            
            return to_route('homepage')->with('success',"Product created successfully");
            
        } else {
            // Si le produit n'est pas trouvé dans le panier, retournez avec un message d'erreur
            return to_route('homepage')->with('error', 'Product not found in cart.');
        }
    }
}




















