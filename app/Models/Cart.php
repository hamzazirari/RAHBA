<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'total_items', 'total_price'];

    // Le panier appartient à un client (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un panier contient plusieurs éléments (items)
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}