<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarteFidelite extends Model
{
    use HasFactory;

    protected $table = 'carte_fidelite';

    protected $fillable = [
        'id_client',
        'point'
    ];

    // Relation avec le modèle Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client', 'id');
    }
}
