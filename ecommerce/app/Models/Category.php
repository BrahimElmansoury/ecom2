<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Déclaration explicite du nom de la table

    protected $fillable = [
        'name'
    ];//pour que les donnees sera ajoute
    public function products():HasMany
        {
            return $this->hasMany(Product::class);
        }
}
