<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payement extends Model
{
    use HasFactory;
    protected $table = 'payement'; // Assurez-vous que le nom de la table correspond à votre base de données

    protected $fillable = [
        'id_client',
        'numero_card',
        'date_expiration',
    ];

    // Définir les relations avec d'autres modèles, par exemple :
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function commande()
    {
        return $this->hasMany(Commande::class, 'id_payment');
    }
}
