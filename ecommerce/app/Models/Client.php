<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'email', 'password','telephone','ville','rue','code postal'
    ];
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'id_client');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_client');
    }
}
