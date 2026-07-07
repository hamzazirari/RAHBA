@extends('layouts.app')

@section('title', 'Le Grand Marché Digital')

@section('content')

<!-- ===== HERO SECTION ===== -->
<section class="bg-gradient-to-br from-amber-50 to-orange-100 py-16 sm:py-20 border-b border-amber-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight max-w-3xl mx-auto leading-tight">
            Le grand marché digital, <span class="text-amber-600">simple et direct.</span>
        </h1>
        <p class="mt-6 text-lg text-slate-600 max-w-2xl mx-auto">
            Découvrez des milliers de produits, soutenez les vendeurs locaux et gérez vos commandes en toute transparence.
        </p>
    </div>
</section>

<!-- ===== SECTION RECHERCHE & FILTRES ===== -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="bg-white rounded-2xl border border-slate-100 shadow-lg p-8">
        
        <!-- TITRE -->
        <h2 class="text-2xl font-bold text-slate-900 mb-8 text-center">Trouvez vos produits artisanaux</h2>
        
        <!-- FORMULAIRE RECHERCHE & FILTRES -->
        <form action="{{ route('products.index') }}" method="GET" class="space-y-6">
            
            <!-- RECHERCHE PRINCIPALE -->
            <div class="relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Que recherchez-vous aujourd'hui ? (Pain, Miel, Pâtes...)" 
                    class="w-full pl-5 pr-14 py-4 bg-white border border-slate-200 rounded-xl shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition-all outline-none text-base"
                >
                <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 p-2.5 text-amber-600 hover:text-amber-700 transition">
                    <i class="fa-solid fa-magnifying-glass text-lg"></i>
                </button>
            </div>

            <!-- FILTRES EN GRILLE (Responsive) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <!-- CATÉGORIES -->
                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-2">Catégories</label>
                    <select 
                        name="category" 
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition-all outline-none text-sm bg-white"
                    >
                        <option value="">Toutes les catégories</option>
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @empty
                            <option disabled>Aucune catégorie</option>
                        @endforelse
                    </select>
                </div>

                <!-- PRIX MINIMUM -->
                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-2">Prix min (DH)</label>
                    <input 
                        type="number" 
                        name="min_price" 
                        value="{{ request('min_price') }}"
                        placeholder="0"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition-all outline-none text-sm"
                        min="0"
                    >
                </div>

                <!-- PRIX MAXIMUM -->
                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-2">Prix max (DH)</label>
                    <input 
                        type="number" 
                        name="max_price" 
                        value="{{ request('max_price') }}"
                        placeholder="5000"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition-all outline-none text-sm"
                        min="0"
                    >
                </div>

                <!-- TRI -->
                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-2">Trier par</label>
                    <select 
                        name="sort" 
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition-all outline-none text-sm bg-white"
                    >
                        <option value="">Pertinence</option>
                        <option value="price_asc" @selected(request('sort') === 'price_asc')>Prix: Croissant</option>
                        <option value="price_desc" @selected(request('sort') === 'price_desc')>Prix: Décroissant</option>
                        <option value="newest" @selected(request('sort') === 'newest')>Plus récent</option>
                    </select>
                </div>

            </div>

            <!-- BOUTONS -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4">
                <button 
                    type="submit" 
                    class="flex-1 py-3 bg-orange-500 from-amber-600 to-orange-600 text-black font-bold rounded-lg hover:from-amber-700 hover:to-orange-700 transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 group"
                >
                    <i class="fa-solid fa-magnifying-glass group-hover:scale-110 transition-transform"></i>
                    Rechercher
                </button>
                
                @if(request('search') || request('min_price') || request('max_price') || request('category') || request('sort'))
                    <a 
                        href="{{ route('home') }}" 
                        class="flex-1 py-3 bg-orange-400 text-slate-700 font-bold rounded-lg hover:bg-orange-600 transition-all flex items-center justify-center gap-2"
                    >
                        <i class="fa-solid fa-redo"></i>
                        Réinitialiser
                    </a>
                @endif
            </div>

        </form>

    </div>

</section>

<!-- ===== SECTION CATÉGORIES ===== -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-slate-100">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Parcourir les catégories</h2>
            <p class="text-slate-600 mt-2">Explorez nos différentes collections</p>
        </div>
        <a href="{{ route('products.index') }}" class="text-amber-600 hover:text-amber-700 font-semibold text-sm transition">
            Voir tout <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse($categories as $category)
            <a 
                href="{{ route('products.index', ['category' => $category->id]) }}" 
                class="group bg-white p-6 rounded-xl border border-slate-100 shadow-sm hover:shadow-lg hover:border-amber-300 text-center transition-all duration-300 hover:-translate-y-1"
            >
                <div class="w-14 h-14 bg-gradient-to-br from-amber-50 to-orange-50 text-amber-600 rounded-xl flex items-center justify-center mx-auto text-2xl group-hover:from-amber-600 group-hover:to-orange-600 group-hover:text-white group-hover:scale-110 transition-all duration-300">
                    <i class="fa-solid fa-tags"></i>
                </div>
                <p class="mt-4 text-sm font-bold text-slate-800 group-hover:text-amber-600 transition truncate">{{ $category->name }}</p>
            </a>
        @empty
            <p class="text-sm text-slate-500 col-span-full text-center py-8">Aucune catégorie disponible pour le moment.</p>
        @endforelse
    </div>
</section>

<!-- ===== SECTION PRODUITS EN VEDETTE ===== -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-slate-100">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Produits en vedette</h2>
            <p class="text-slate-600 mt-2">Les meilleures ventes de nos vendeurs</p>
        </div>
        <a href="{{ route('products.index') }}" class="text-amber-600 hover:text-amber-700 font-semibold text-sm transition">
            Voir tous <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($featuredProducts as $product)
            {{-- CARD PRODUIT --}}
            <div class="group bg-white border border-slate-100 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col hover:-translate-y-2">
                
                <!-- IMAGE -->
                <div class="relative bg-slate-100 aspect-square w-full overflow-hidden">
                    <img 
                        src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=500' }}" 
                        alt="{{ $product->name }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                    >
                    
                    <!-- BADGE VENDEUR -->
                    <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-slate-800 text-xs font-bold px-3 py-1.5 rounded-lg shadow-md">
                        {{ $product->user->shop_name ?? 'RAHBA' }}
                    </span>

                    <!-- BADGE STOCK -->
                    @if($product->stock <= 0)
                        <span class="absolute top-3 right-3 bg-red-500/95 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md">
                            Rupture
                        </span>
                    @elseif($product->stock <= 5)
                        <span class="absolute top-3 right-3 bg-orange-500/95 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md">
                            -{{ $product->stock }} restant
                        </span>
                    @endif
                </div>

                <!-- CONTENU -->
                <div class="p-5 flex flex-col flex-grow">
                    
                    <!-- CATÉGORIE -->
                    <span class="text-xs font-semibold text-amber-600 mb-2">
                        {{ $product->category->name ?? 'Produit' }}
                    </span>

                    <!-- NOM PRODUIT -->
                    <a 
                        href="{{ route('products.show', $product->id) }}" 
                        class="text-base font-bold text-slate-900 hover:text-amber-600 line-clamp-2 transition mb-3"
                    >
                        {{ $product->name }}
                    </a>
                    
                    <!-- NOTE MOYENNE -->
                    <div class="flex items-center gap-2 mb-4">
                        <div class="flex gap-0.5">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < floor($product->reviews_avg_rating ?? 5))
                                    <i class="fa-solid fa-star text-amber-400 text-xs"></i>
                                @else
                                    <i class="fa-regular fa-star text-slate-300 text-xs"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-xs text-slate-600 font-medium">
                            ({{ number_format($product->reviews_avg_rating ?? 5.0, 1) }})
                        </span>
                    </div>

                    <!-- PRIX & ACTION -->
                    <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100">
                        <div>
                            <span class="text-2xl font-black text-slate-900">{{ number_format($product->price, 0) }}</span>
                            <span class="text-sm text-slate-600 ml-1">DH</span>
                        </div>
                        
                        @if($product->stock > 0)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="p-3 bg-gradient-to-r from-amber-50 to-orange-50 text-amber-600 rounded-lg hover:from-amber-600 hover:to-orange-600 hover:text-white transition-all duration-300 shadow-md hover:shadow-lg group-hover:scale-110"
                                >
                                    <i class="fa-solid fa-cart-plus text-lg"></i>
                                </button>
                            </form>
                        @else
                            <button 
                                disabled 
                                class="p-3 bg-slate-100 text-slate-400 rounded-lg cursor-not-allowed opacity-50"
                            >
                                <i class="fa-solid fa-ban text-lg"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-sm text-slate-500 col-span-full text-center py-12">Aucun produit en vedette actuellement.</p>
        @endforelse
    </div>
</section>

@endsection
