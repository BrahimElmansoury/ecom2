<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Payment;
use App\Models\Product;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commande'; // Assurez-vous que le nom de la table correspond à votre base de données

    protected $fillable = [
        
        'id_produit',
        'id_client',
        'Qtecmd',
        'date_cmd',
    ];

    // Définir les relations avec d'autres modèles, par exemple :
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }
}
