<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'quantite', 'ahead', 'active','image', 'categorie_id'];

    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }

    public function promotion(): BelongsToMany
    {
        return $this->belongstoMany(
            Promotion::class,
            'product_promotion',
            'product',
            'promotion'
        );
    }
}
