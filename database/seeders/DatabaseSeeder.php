<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ton compte Admin de Test
        User::factory()->create([
            'name' => 'Admin Rahba',
            'email' => 'admin@rahba.com',
            'role' => 'admin',
            'phone' => '+212600000000',
        ]);

        // 2. Création de 15 Comptes Clients (Acheteurs)
        User::factory(15)->create([
            'role' => 'client'
        ]);

        // 3. Création de 15 Comptes Vendeurs (avec Boutiques)
        $vendors = collect();
        for ($i = 1; $i <= 15; $i++) {
            $vendors->push(
                User::factory()->create([
                    'name' => "Vendeur Pro #$i",
                    'email' => "vendor$i@rahba.com",
                    'role' => 'vendor',
                    'shop_name' => fake()->company() . " Shop",
                    'shop_description' => "Bienvenue dans notre boutique spécialisée sur RAHBA.",
                ])
            );
        }

        // 4. Création de 15 Catégories
        $categoriesList = [
            'Électronique', 'Mode Homme', 'Mode Femme', 'Maison & Cuisine', 
            'Agriculture', 'Produits de Terroir', 'Outils & Artisanat', 'Téléphones', 
            'PC & Accessoires', 'Chaussures', 'Cosmétique', 'Électroménager', 
            'Sport & Fitness', 'Livres & Culture', 'Automobile'
        ];

        $categories = collect();
        foreach ($categoriesList as $name) {
            $categories->push(
                Category::create([
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'description' => "Découvrez notre sélection de produits pour la catégorie $name.",
                ])
            );
        }

        // 5. Création de 15 Produits au total
        // Pour que ce soit réaliste, on pioche un vendeur et une catégorie au hasard pour chaque produit
        for ($j = 1; $j <= 15; $j++) {
            Product::factory()->create([
                'user_id' => $vendors->random()->id,
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}