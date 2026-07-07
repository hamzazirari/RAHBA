<header class="bg-white border-b border-slate-100 shadow-xs sticky top-0 z-50">
    <!-- Barre supérieure (Top Bar) -->
    <div class="bg-slate-900 text-slate-300 text-xs py-2 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <p><i class="fa-solid fa-truck-fast text-amber-500 mr-1"></i> Livraison rapide sur Safi et partout au Maroc</p>
        <div class="flex gap-4">
            <a href="#" class="hover:text-amber-500 transition">Aide & Support</a>
            <a href="{{ route('register.vendor') }}" class="text-amber-400 font-bold hover:text-amber-500 transition">Devenir Vendeur</a>
        </div>
    </div>

    <!-- Navigation principale -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-4">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-3xl font-black tracking-tight text-amber-600 flex items-center gap-2">
                    <i class="fa-solid fa-shop text-2xl"></i>
                    <span>RAHBA</span>
                </a>
            </div>

            <!-- Barre de recherche -->
            <div class="flex-1 max-w-2xl hidden md:block">
                <form action="{{ route('products.index') }}" method="GET" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un produit, une marque, une boutique..." class="w-full pl-12 pr-4 py-3 bg-slate-100 border border-transparent rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition-all outline-hidden text-sm">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </form>
            </div>

            <!-- Actions Utilisateur / Panier -->
            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-700 hover:text-amber-600 px-4 py-2.5 border border-slate-200 rounded-xl transition">
                        <i class="fa-regular fa-user mr-2"></i>Connexion
                    </a>
                @endguest

                @auth
                    <a href="#" class="text-sm font-bold text-slate-700 hover:text-amber-600 transition">
                        <i class="fa-regular fa-circle-user text-xl"></i>
                    </a>
                @endauth

                <span class="h-6 w-px bg-slate-200"></span>

                <!-- Icône Panier -->
                <a href="#" class="relative p-2.5 text-slate-600 hover:text-amber-600 transition rounded-xl hover:bg-slate-50">
                    <i class="fa-solid fa-basket-shopping text-xl"></i>
                    <span class="absolute top-1 right-1 bg-amber-600 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full">0</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Menu des catégories -->
    <nav class="bg-slate-50 border-t border-slate-100 hidden sm:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex gap-6 py-3 text-sm font-semibold text-slate-600">
            <a href="{{ route('products.index') }}" class="hover:text-amber-600 transition text-amber-600 flex items-center gap-1"><i class="fa-solid fa-border-all"></i> Tout le catalogue</a>
            <a href="#" class="hover:text-amber-600 transition">Électronique</a>
            <a href="#" class="hover:text-amber-600 transition">Mode</a>
            <a href="#" class="hover:text-amber-600 transition">Alimentation</a>
            <a href="#" class="hover:text-amber-600 transition">Artisanat</a>
        </div>
    </nav>
</header>