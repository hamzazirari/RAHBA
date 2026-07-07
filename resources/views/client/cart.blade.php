-- Active: 1777018450648@@127.0.0.1@3306
@extends('layouts.app')

@section('title', 'Mon Panier')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow">
    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-8">Votre Panier</h1>

    <div class="lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-start">
        
        <section class="lg:col-span-7 space-y-4">
            {{-- Boucle dynamique sur la session ou la table panier --}}
            @forelse($cartItems as $id => $item)
                <div class="bg-white p-4 sm:p-6 rounded-2xl border border-slate-100 shadow-xs flex gap-4 sm:gap-6 relative group">
                    <div class="w-20 h-20 sm:w-28 sm:h-28 bg-slate-100 rounded-xl overflow-hidden flex-shrink-0 border border-slate-100">
                        <img src="{{ $item['image_url'] ?? 'https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=300' }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                    </div>

                    <div class="flex-grow flex flex-col justify-between py-0.5">
                        <div>
                            <div class="flex justify-between gap-2">
                                <h3 class="text-sm sm:text-base font-bold text-slate-800 line-clamp-2">
                                    {{ $item['name'] }}
                                </h3>
                                <form action="{{ route('cart.remove', $id) }}" method="POST" class="hidden sm:block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-slate-400 hover:text-rose-600 transition p-1 cursor-pointer">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                            <p class="text-xs text-slate-400 mt-1">Boutique : <span class="font-semibold text-amber-600">{{ $item['shop_name'] ?? 'Vendeur Rahba' }}</span></p>
                        </div>

                        <div class="flex items-center justify-between mt-4 sm:mt-0">
                            <div class="flex items-center border border-slate-200 bg-slate-50 rounded-xl overflow-hidden">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                                    <button type="submit" class="px-3 py-1 text-slate-600 hover:bg-slate-200 transition font-bold cursor-pointer" {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>-</button>
                                </form>
                                <span class="px-3 py-1 text-sm font-black text-slate-800 bg-white border-x border-slate-200">{{ $item['quantity'] }}</span>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                                    <button type="submit" class="px-3 py-1 text-slate-600 hover:bg-slate-200 transition font-bold cursor-pointer">+</button>
                                </form>
                            </div>
                            
                            <span class="text-base sm:text-lg font-black text-slate-900">{{ number_format($item['price'] * $item['quantity'], 2) }} DH</span>
                        </div>
                    </div>

                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="sm:hidden absolute top-4 right-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-slate-400 hover:text-rose-600 transition cursor-pointer">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </div>
            @empty
                <div class="text-center py-16 bg-white rounded-2xl border border-slate-100 shadow-xs">
                    <i class="fa-solid fa-basket-shopping text-slate-200 text-6xl mb-4"></i>
                    <p class="text-base text-slate-500 font-medium">Votre panier est vide.</p>
                    <a href="{{ route('products::index') }}" class="mt-4 inline-flex items-center bg-amber-600 text-white px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-amber-700 transition">
                        Retourner au catalogue
                    </a>
                </div>
            @endforelse
        </section>

        <section class="lg:col-span-5 mt-8 lg:mt-0">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-4">Résumé de la commande</h2>
                
                <div class="space-y-4 mt-4 text-sm">
                    <div class="flex justify-between text-slate-600">
                        <span>Sous-total</span>
                        <span class="font-semibold text-slate-900">{{ number_format($totalAmount ?? 0, 2) }} DH</span>
                    </div>
                    <div class="flex justify-between text-slate-600">
                        <span>Livraison</span>
                        <span class="text-emerald-600 font-bold">Gratuit</span>
                    </div>
                    <div class="border-t border-slate-100 pt-4 flex justify-between text-base font-black text-slate-900">
                        <span>Total</span>
                        <span class="text-xl text-amber-600">{{ number_format($totalAmount ?? 0, 2) }} DH</span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('checkout.index') }}" class="block w-full bg-amber-600 hover:bg-amber-700 text-white text-center font-bold py-3.5 px-4 rounded-xl transition shadow-xs cursor-pointer">
                        Passer à la caisse <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection