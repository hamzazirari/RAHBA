@extends('layouts.app')

@section('title', 'Boutique ' . $vendor->shopName)

@section('content')
<div class="bg-gradient-to-r from-slate-800 to-slate-900 text-white py-12 border-b border-slate-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-amber-500 bg-amber-500/10 px-2.5 py-1 rounded-md border border-amber-500/20">Vendeur Partenaire</span>
                <h1 class="text-4xl font-extrabold mt-3 tracking-tight">{{ $vendor->shopName }}</h1>
                <p class="text-slate-400 text-sm mt-1 flex items-center gap-2">
                    <i class="fa-solid fa-user text-xs"></i> Gérant : {{ $vendor->name }}
                </p>
            </div>
            <div class="mt-4 md:mt-0 bg-white/5 border border-white/10 p-4 rounded-xl backdrop-blur-xs">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Contact Direct</h3>
                <p class="text-sm font-semibold mt-1"><i class="fa-solid fa-phone text-amber-500 mr-1.5"></i> {{ $vendor->phone }}</p>
                <p class="text-xs text-slate-400 mt-1"><i class="fa-solid fa-envelope text-amber-500 mr-1.5"></i> {{ $vendor->email }}</p>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-2xl font-bold text-slate-900 tracking-tight mb-8">Tous les produits de cette boutique</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="group bg-white border border-slate-100 rounded-xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col">
                <div class="relative bg-slate-100 aspect-square w-full overflow-hidden">
                    <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=500' }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <a href="{{ route('products.show', $product->id) }}" class="text-sm font-semibold text-slate-800 hover:text-amber-600 line-clamp-2 mb-2 transition">
                        {{ $product->name }}
                    </a>
                    <div class="flex items-center gap-1 text-xs text-amber-500 mb-4">
                        <i class="fa-solid fa-star"></i>
                        <span class="text-slate-500">({{ number_format($product->reviews_avg_rating ?? 5.0, 1) }})</span>
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
            <p class="text-sm text-slate-500 col-span-full text-center py-8">Cette boutique n'a pas encore de produits en ligne.</p>
        @endforelse
    </div>
</div>
@endsection