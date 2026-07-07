<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    // Pas de timestamps automatiques (created_at/updated_at) car on utilise 'added_at' selon ton diagramme
    public $timestamps = false; 

    protected $fillable = ['cart_id', 'product_id', 'quantity', 'added_at'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}