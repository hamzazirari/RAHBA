<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'name', 'description', 'price', 'stock', 'image_url'];

    // Le produit appartient à un vendeur (User)
    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Le produit appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}