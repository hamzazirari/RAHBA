<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\ProductController;
use App\Http\Controllers\Public\VendorController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Auth\ClientRegisterController;
use App\Http\Controllers\Auth\VendorRegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Client\CartController;



// Page 5 : Accueil (Homepage)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Page 6 : Catalogue / Tous les produits
Route::get('/products', [ProductController::class, 'index'])->name('products::index');

// Page 7 : Détails du Produit
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Page 8 : Boutique du Vendeur
Route::get('/vendors/{id}', [VendorController::class, 'show'])->name('vendors.show');




Route::middleware('guest')->group(function () {
    
    // Page 1 : Inscription Client
    Route::get('/register/client', [ClientRegisterController::class, 'create'])->name('register.client');
    Route::post('/register/client', [ClientRegisterController::class, 'store'])->name('register.client.store');

    // Page 2 : Inscription Vendeur
    Route::get('/register/vendor', [VendorRegisterController::class, 'create'])->name('register.vendor');
    Route::post('/register/vendor', [VendorRegisterController::class, 'store'])->name('register.vendor.store');

    // Page 3 : Connexion (Login)
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    

});



Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');