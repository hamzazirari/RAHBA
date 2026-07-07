@extends('layouts.app')

@section('title', ($vendor->shop_name ?? $vendor->name) . ' - RAHBA')

@section('content')
<div class="bg-slate-900 text-white py-12 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-amber-500 rounded-2xl flex items-center justify-center text-slate-900 font-black text-2xl shadow-xs">
                    {{ strtoupper(substr($vendor->shop_name ?? $vendor->name, 0, 2)) }}
                </div>
                <div>
                    <h1 class="text-3xl font-black tracking-tight">{{ $vendor->shop_name ?? $vendor->name }}</h1>
                    <p class="text-sm text-slate-400 mt-1">
                        <i class="fa-solid fa-location-dot text-amber-500 mr-1"></i> {{ $vendor->address ?: 'Adresse non renseignée' }} &bull;
                        <span class="text-slate-300 font-semibold">Membre depuis {{ $vendor->created_at?->format('Y') ?? date('Y') }}</span>
                    </p>
                </div>
            </div>

            <div class="flex gap-6 text-sm">
                <div class="bg-slate-800/60 p-4 rounded-xl border border-slate-700/50 text-center min-w-[100px]">
                    <span class="block text-slate-400 text-xs font-bold uppercase mb-1">Avis</span>
                    <span class="text-amber-400 font-black flex items-center justify-center gap-1">
                        {{ number_format($reviews->avg('rating') ?? 0, 1) }} <i class="fa-solid fa-star text-xs"></i>
                    </span>
                </div>
                <div class="bg-slate-800/60 p-4 rounded-xl border border-slate-700/50 text-center min-w-[100px]">
                    <span class="block text-slate-400 text-xs font-bold uppercase mb-1">Produits</span>
                    <span class="text-white font-black">{{ $products->total() }} article(s)</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <aside class="space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-4">
                <h3 class="font-bold text-slate-900 text-base pb-2 border-b border-slate-100">À propos de nous</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ $vendor->shop_description ?: 'Aucune description de boutique n’a encore été ajoutée.' }}
                </p>

                <div class="space-y-2.5 pt-2 text-sm text-slate-600">
                    <p class="flex items-center gap-2"><i class="fa-solid fa-phone text-amber-600 w-4"></i> {{ $vendor->phone ?: 'Numéro non renseigné' }}</p>
                    <p class="flex items-center gap-2"><i class="fa-solid fa-envelope text-amber-600 w-4"></i> {{ $vendor->email }}</p>
                </div>
            </div>
        </aside>

        <main class="lg:col-span-3 space-y-6">
            <div class="flex justify-between items-center bg-white p-4 rounded-2xl border border-slate-100 shadow-xs">
                <p class="text-sm text-slate-500 font-medium">Affichage de <span class="font-bold text-slate-800">{{ $products->count() }} produit(s)</span></p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($products as $product)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-xs overflow-hidden hover:shadow-md transition flex flex-col group">
                        <div class="relative bg-slate-50 pt-[100%] overflow-hidden">
                            <img src="{{ $product->image_src }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">{{ $product->category->name ?? 'Produit' }}</span>
                            <h3 class="font-bold text-slate-800 text-sm group-hover:text-amber-600 transition truncate">{{ $product->name }}</h3>
                            <div class="flex items-center gap-1 text-xs text-amber-500 mt-1.5">
                                <i class="fa-solid fa-star"></i> <span class="font-bold text-slate-700">{{ number_format($product->reviews_avg_rating ?? 0, 1) }}</span> <span class="text-slate-400">({{ $product->reviews->count() }})</span>
                            </div>
                            <div class="mt-4 pt-4 border-t border-slate-50 flex items-center justify-between gap-2">
                                <span class="text-base font-black text-slate-900">{{ number_format($product->price, 2, ',', ' ') }} DH</span>
                                <a href="{{ route('products.show', $product->id) }}" class="px-3 py-2 bg-amber-50 text-amber-700 hover:bg-amber-600 hover:text-white rounded-xl font-bold text-xs transition">Voir l'article</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-2xl border border-slate-100 shadow-xs p-8 text-center text-slate-500">
                        Cette boutique n’a pas encore publié de produits.
                    </div>
                @endforelse
            </div>
        </main>
    </div>
</div>
@endsection