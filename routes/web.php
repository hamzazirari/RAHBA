<?php

use App\Http\Controllers\Public\{HomeController, ProductController, VendorShopController};
use App\Http\Controllers\Client\{CartController, CheckoutController, OrderController, ReviewController, ClientProfileController};
use App\Http\Controllers\Vendor\{VendorDashboardController, VendorProductController, VendorOrderController, VendorProfileController};
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// --- SECTION 1 : ROUTES PUBLIQUES (Correspondent à resources/views/public) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/catalogue', [ProductController::class, 'index'])->name('products.index');
Route::get('/catalogue/filter', [ProductController::class, 'filter'])->name('products.filter');
Route::get('/catalogue/search/{keyword?}', [ProductController::class, 'search'])->name('products.search');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/product/{id}/reviews', [ProductController::class, 'reviews'])->name('products.reviews');
Route::get('/shop/{vendorId}', [VendorShopController::class, 'show'])->name('vendor.shop');
Route::get('/shop/{vendorId}/products', [VendorShopController::class, 'products'])->name('vendor.products.public');
Route::get('/shop/{vendorId}/reviews', [VendorShopController::class, 'reviews'])->name('vendor.reviews.public');

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
    Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout/pay', [CheckoutController::class, 'processPayment'])->name('checkout.process');
    Route::post('/checkout/confirm', [CheckoutController::class, 'confirmOrder'])->name('checkout.confirm');
    Route::get('/checkout/success/{id}', [CheckoutController::class, 'paymentSuccess'])->name('checkout.success');
    Route::get('/checkout/failed', [CheckoutController::class, 'paymentFailed'])->name('checkout.failed');

    // Commandes & Avis
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.myOrders');
    Route::get('/my-orders/filter/{status}', [OrderController::class, 'filter'])->name('orders.filter');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/order/{id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    Route::get('/order/{id}/export', [OrderController::class, 'export'])->name('orders.export');
    Route::get('/review/create/{id}', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review/{id}', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::patch('/review/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/{id}', [ReviewController::class, 'delete'])->name('review.delete');
    
    // Profil
    Route::get('/profile', [ClientProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ClientProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ClientProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ClientProfileController::class, 'changePassword'])->name('profile.password');
    Route::patch('/profile/password', [ClientProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:vendor'])
    ->prefix('vendor')
    ->name('vendor.')
    ->group(function () {
        Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/stats', [VendorDashboardController::class, 'getStats'])->name('dashboard.stats');
        Route::get('/dashboard/sales-chart', [VendorDashboardController::class, 'getSalesChart'])->name('dashboard.sales-chart');
        Route::get('/dashboard/recent-orders', [VendorDashboardController::class, 'getRecentOrders'])->name('dashboard.recent-orders');
        Route::get('/dashboard/top-products', [VendorDashboardController::class, 'getTopProducts'])->name('dashboard.top-products');

        Route::get('/products', [VendorProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [VendorProductController::class, 'create'])->name('products.create');
        Route::post('/products', [VendorProductController::class, 'store'])->name('products.store');
        Route::get('/products/search/{keyword}', [VendorProductController::class, 'search'])->name('products.search');
        Route::get('/products/{productId}/edit', [VendorProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{productId}', [VendorProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{productId}', [VendorProductController::class, 'delete'])->name('products.delete');
        Route::patch('/products/{productId}/toggle-active', [VendorProductController::class, 'toggleActive'])->name('products.toggle-active');

        Route::get('/orders', [VendorOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/filter/{status}', [VendorOrderController::class, 'filter'])->name('orders.filter');
        Route::get('/orders/{orderId}', [VendorOrderController::class, 'show'])->name('orders.show');
        Route::patch('/orders/{orderId}/status/{status?}', [VendorOrderController::class, 'updateStatus'])->name('orders.update-status');
        Route::get('/orders/{orderId}/export', [VendorOrderController::class, 'export'])->name('orders.export');
        Route::get('/orders/{orderId}/client-info', [VendorOrderController::class, 'getClientInfo'])->name('orders.client-info');

        Route::get('/profile', [VendorProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [VendorProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [VendorProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile/password', [VendorProfileController::class, 'changePassword'])->name('profile.password');
        Route::patch('/profile/password', [VendorProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('/profile/stats', [VendorProfileController::class, 'getVendorStats'])->name('profile.stats');
    });

require __DIR__.'/auth.php';
