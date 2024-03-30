<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;
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




