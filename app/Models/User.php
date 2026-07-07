<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'shop_name',
        'shop_description',
        'profile_photo',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // 🏪 Un Vendeur (User avec le rôle 'vendor') possède plusieurs produits
    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    // 🛒 Un Client possède un Panier
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    // 📦 Un Client peut passer plusieurs commandes
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
