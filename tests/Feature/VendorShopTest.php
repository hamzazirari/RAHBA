<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VendorShopTest extends TestCase
{
    use RefreshDatabase;

    public function test_vendor_shop_page_displays_the_connected_vendor_data_and_products(): void
    {
        $category = Category::create([
            'name' => 'Électronique',
            'slug' => 'electronique',
            'description' => 'Électronique',
        ]);

        $vendor = User::factory()->create([
            'role' => 'vendor',
            'shop_name' => 'Ma Boutique Test',
            'shop_description' => 'Description boutique dynamique',
            'phone' => '+212600000000',
        ]);

        Product::factory()->create([
            'user_id' => $vendor->id,
            'category_id' => $category->id,
            'name' => 'Produit dynamique',
            'price' => 399.99,
            'stock' => 10,
            'is_active' => true,
        ]);

        $response = $this->get('/shop/' . $vendor->id);

        $response->assertOk();
        $response->assertSee('Ma Boutique Test');
        $response->assertSee('Description boutique dynamique');
        $response->assertSee('Produit dynamique');
        $response->assertSee('399,99');
    }
}
