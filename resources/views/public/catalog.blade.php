@extends('layouts.app')

@section('title', 'Tous nos produits')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="lg:grid lg:grid-cols-4 lg:gap-8">
        
        <aside class="lg:col-span-1 bg-white p-6 rounded-2xl border border-slate-100 shadow-xs h-fit mb-6 lg:mb-0">
            <form action="{{ route('products.index') }}" method="GET" class="space-y-6">
                
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Recherche</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom du produit..." 
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-hidden">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Catégories</label>
                    <div class="space-y-2 max-h-48 overflow-y-auto pr-2">
                        @foreach($categories as $category)
                            <label class="flex items-center text-sm text-slate-600 cursor-pointer select-none">
                                <input type="checkbox" name="categories[]" value="{{ $category->slug }}" 
                                    {{ is_array(request('categories')) && in_array($category->slug, request('categories')) ? 'checked' : '' }}
                                    class="rounded-sm border-slate-300 text-amber-600 focus:ring-amber-500 mr-2">
                                {{ $category->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Prix (DH)</label>
                    <div class="flex gap-2">
                        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full px-2 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-xs text-center">
                        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full px-2 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-xs text-center">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex gap-2">
                    <button type="submit" class="w-full py-2 bg-amber-600 text-white rounded-xl text-xs font-bold hover:bg-amber-700 transition cursor-pointer">
                        Filtrer
                    </button>
                    <a href="{{ route('products.index') }}" class="w-full py-2 bg-slate-100 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-200 text-center transition">
                        Effacer
                    </a>
                </div>
            </form>
        </aside>

        <section class="lg:col-span-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
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
                                <span class="text-lg font-black text-slate-900">{{ number_format($product->price, 2) }} DH</span>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-600 hover:text-white transition cursor-pointer">
                                        <i class="fa-solid fa-cart-plus text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 bg-white rounded-2xl border border-slate-100">
                        <i class="fa-solid fa-box-open text-slate-300 text-4xl mb-3"></i>
                        <p class="text-sm text-slate-500">Aucun produit ne correspond à vos critères.</p>
                    </div>
                
                @endforelse
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </section>

    </div>
</div>
@endsection