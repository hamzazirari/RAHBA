@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-xs">
        
        <div class="w-full aspect-square bg-slate-50 rounded-xl overflow-hidden border border-slate-100">
            <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=600' }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
        </div>

        <div class="mt-10 lg:mt-0 lg:pl-4 flex flex-col">
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $product->name }}</h1>
            
            <p class="mt-2 text-sm text-slate-500">
                Vendu par : 
                <a href="{{ route('vendor.shop', $product->user_id) }}" class="text-amber-600 font-semibold hover:underline">
                    {{ $product->user->shop_name ?? 'Boutique Inconnue' }}
                </a>
            </p>

            <div class="mt-4 flex items-center gap-4 border-b border-slate-100 pb-4">
                <span class="text-3xl font-black text-slate-900">{{ number_format($product->price, 2) }} DH</span>
                
                @if($product->stock > 0)
                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-emerald-50 text-emerald-800 border border-emerald-100">
                        En Stock ({{ $product->stock }})
                    </span>
                @else
                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-rose-50 text-rose-800 border border-rose-100">
                        Rupture de stock
                    </span>
                @endif
            </div>

            <div class="mt-6 flex-grow">
                <h3 class="text-sm font-bold text-slate-900">Description</h3>
                <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $product->description }}</p>
            </div>

            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-8 pt-6 border-t border-slate-100">
                @csrf
                <div class="flex items-center gap-4">
                    <div class="w-24">
                        <label for="quantity" class="sr-only">Quantité</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-center text-sm font-bold outline-hidden focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                    </div>
                    <button type="submit" {{ $product->stock <= 0 ? 'disabled' : '' }}
                        class="flex-1 bg-amber-600 text-white font-bold py-3 px-6 rounded-xl text-center hover:bg-amber-700 transition disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                        <i class="fa-solid fa-basket-shopping mr-2"></i> Ajouter au panier
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-12 bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-xs">
        <h3 class="text-xl font-bold text-slate-900 mb-6">Avis des clients</h3>
        
        <div class="space-y-6">
            @forelse($product->reviews as $review)
                <div class="border-b border-slate-100 pb-6 last:border-0 last:pb-0">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-bold text-slate-800">{{ $review->user->name ?? 'Utilisateur anonyme' }}</span>
                        <span class="text-xs text-slate-400">{{ $review->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex items-center gap-1 text-xs text-amber-500 mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fa-solid fa-star {{ $i <= $review->rating ? '' : 'text-slate-200' }}"></i>
                        @endfor
                    </div>
                    <p class="text-sm text-slate-600">{{ $review->comment }}</p>
                </div>
            @empty
                <p class="text-sm text-slate-500 text-center py-4">Aucun avis pour le moment. Soyez le premier à laisser une note !</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
