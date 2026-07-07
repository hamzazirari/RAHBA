<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false; // On utilise juste 'created_at' personnalisé selon ton diagramme

    protected $fillable = ['order_id', 'total_items', 'total_price', 'created_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}