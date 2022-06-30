<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'start_date', 'end_date', 'price_promo', 'percentage','image'];


    public function product(): BelongsToMany
    {
        return $this->belongstoMany(
            Product::class,
            'product_promotion',
            'promotion',
            'product'
        );
    }
}
