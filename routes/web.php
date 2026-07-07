<?php

use App\Http\Controllers\Public\{HomeController, ProductController, VendorShopController};
use App\Http\Controllers\Client\{CartController, CheckoutController, OrderController, ReviewController, ClientProfileController};
use Illuminate\Support\Facades\Route;

// --- SECTION 1 : ROUTES PUBLIQUES (Correspondent à resources/views/public) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalogue', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/shop/{vendorId}', [VendorShopController::class, 'show'])->name('vendor.shop');

// --- SECTION 2 : ROUTES CLIENT (Correspondent à resources/views/client) ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard (celui qui manquait)
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    // Panier
    Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout/pay', [CheckoutController::class, 'processPayment'])->name('checkout.process');
    Route::get('/checkout/success/{id}', [CheckoutController::class, 'paymentSuccess'])->name('checkout.success');

    // Commandes & Avis
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.myOrders');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/review/{id}', [ReviewController::class, 'store'])->name('review.store');
    
    // Profil
    Route::get('/profile', [ClientProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ClientProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';