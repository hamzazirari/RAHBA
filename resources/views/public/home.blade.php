@extends('layouts.app')

@section('title', 'Le Grand Marché Digital')

@section('content')
<section class="bg-gradient-to-br from-amber-50 to-orange-100 py-16 sm:py-24 border-b border-amber-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight max-w-3xl mx-auto leading-tight">
            Le grand marché digital, <span class="text-amber-600">simple et direct.</span>
        </h1>
        <p class="mt-6 text-lg text-slate-600 max-w-2xl mx-auto">
            Découvrez des milliers de produits, soutenez les vendeurs locaux et gérez vos commandes en toute transparence.
        </p>
        
        <div class="mt-10 max-w-xl mx-auto px-2">
            <form action="{{ route('products.index') }}" method="GET" class="relative">
                <input type="text" name="search" placeholder="Que recherchez-vous aujourd'hui au marché ?" 
                    class="w-full pl-12 pr-4 py-4 bg-white border border-slate-200 rounded-2xl shadow-md focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition-all outline-hidden text-base">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-lg"></i>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Parcourir les catégories</h2>
    </div>
    
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="group bg-white p-6 rounded-xl border border-slate-100 shadow-xs hover:shadow-md hover:border-amber-200 text-center transition">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center mx-auto text-xl group-hover:bg-amber-600 group-hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-tags"></i>
                </div>
                <p class="mt-4 text-sm font-semibold text-slate-700 group-hover:text-amber-600 transition truncate">{{ $category->name }}</p>
            </a>
        @empty
            <p class="text-sm text-slate-500 col-span-full text-center">Aucune catégorie disponible pour le moment.</p>
        @endforelse
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 border-t border-slate-100">
    <h2 class="text-2xl font-bold text-slate-900 tracking-tight mb-8">Produits en vedette</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($featuredProducts as $product)
            {{-- COMPOSANT CARD PRODUIT --}}
            <div class="group bg-white border border-slate-100 rounded-xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col">
                <div class="relative bg-slate-100 aspect-square w-full overflow-hidden">
                    <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=500' }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 left-3 bg-white/95 text-slate-800 text-xs font-semibold px-2.5 py-1 rounded-md shadow-xs">
                        {{ $product->user->shopName ?? 'Boutique RAHBA' }}
                    </span>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <a href="{{ route('products.show', $product->id) }}" class="text-base font-semibold text-slate-800 hover:text-amber-600 line-clamp-2 transition mb-2">
                        {{ $product->name }}
                    </a>
                    
                    {{-- Note moyenne --}}
                    <div class="flex items-center gap-1 text-xs text-amber-500 mb-4">
                        <i class="fa-solid fa-star"></i>
                        <span class="text-slate-500 ml-1 font-medium">({{ number_format($product->reviews_avg_rating ?? 5.0, 1) }})</span>
                    </div>

                    <div class="mt-auto flex items-center justify-between pt-3 border-t border-slate-50">
                        <span class="text-xl font-black text-slate-900">{{ number_format($product->price, 2) }} DH</span>
                        
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="p-2.5 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-600 hover:text-white transition cursor-pointer">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-sm text-slate-500 col-span-full text-center">Aucun produit en vedette actuellement.</p>
        @endforelse
    </div>
</section>
@endsection