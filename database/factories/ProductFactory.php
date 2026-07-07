<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 20, 2000), // Entre 20 DH et 2000 DH
            'stock' => fake()->numberBetween(5, 50),
            'image_url' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30', // Image générique propre
        ];
    }
}