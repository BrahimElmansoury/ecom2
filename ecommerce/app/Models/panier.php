<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Paniers;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_panier';

    protected $table = 'panier'; // Assurez-vous que le nom de la table correspond à votre base de données

    protected $fillable = [
        
        'id_produit',
        'quantity',
        'price',
    ];
    // Définir les relations avec d'autres modèles, par exemple 

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }
    public function paniers()
    {
        return $this->belongsTo(Paniers::class, 'id_gpanier');
    }
}
