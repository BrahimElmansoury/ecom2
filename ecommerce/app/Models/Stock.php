<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'Product_name',
        'Stock_in',
        
    ];
    protected $table = 'stock';
    public $timestamps = false;
}

