<?php

namespace App\Models;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'image',
        'category_id'
    ];//pour que les donnees sera ajoute
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}



