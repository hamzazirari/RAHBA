<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'name', 'description', 'price', 'stock', 'image_url', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getImageSrcAttribute()
    {
        if (!$this->image_url) {
            return 'https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=600';
        }

        if (str_starts_with($this->image_url, 'http://') || str_starts_with($this->image_url, 'https://')) {
            return $this->image_url;
        }

        return asset($this->image_url);
    }

    // Le produit appartient à un vendeur (User)
    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Le produit appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
