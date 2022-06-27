<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'quantite', 'ahead', 'active', 'categorie_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
