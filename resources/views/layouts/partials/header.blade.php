<header class="bg-white border-b border-slate-100 shadow-xs sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-4">
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-3xl font-black tracking-tight text-amber-600 flex items-center gap-2">
                    <i class="fa-solid fa-shop text-2xl"></i>
                    <span>RAHBA</span>
                </a>
            </div>

            <div class="flex-1 max-w-2xl hidden md:block">
                <form action="{{ route('products.index') }}" method="GET" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un produit..." class="w-full pl-12 pr-4 py-3 bg-slate-100 border border-transparent rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition-all outline-none text-sm">
                    <button type="submit" class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('profile.show') }}" class="text-sm font-bold text-slate-700 hover:text-amber-600 px-4 py-2.5 border border-slate-200 rounded-xl transition">Mon Profil</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-rose-600 hover:text-white hover:bg-rose-600 px-4 py-2.5 border border-rose-100 rounded-xl transition cursor-pointer">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-1.5"></i> Deconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-700 hover:text-amber-600 px-3 py-2.5 transition">Connexion</a>
                    <a href="{{ route('register') }}" class="text-sm font-bold bg-amber-600 text-white px-4 py-2.5 rounded-xl hover:bg-amber-700 transition">Inscription</a>
                @endauth
                
                <span class="h-6 w-px bg-slate-200"></span>
                <a href="{{ route('cart.view') }}" class="relative inline-flex items-center gap-2 px-3 py-2.5 text-sm font-bold text-slate-700 hover:text-amber-600 transition rounded-xl hover:bg-slate-50">
                    <i class="fa-solid fa-basket-shopping text-xl"></i>
                    <span class="hidden sm:inline">Mon Panier</span>
                    <span class="absolute top-1 right-1 bg-amber-600 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full">
                        {{ auth()->check() ? \App\Models\Cart::where('user_id', auth()->id())->first()?->items()->sum('quantity') ?? 0 : 0 }}
                    </span>
                </a>
            </div>
        </div>
    </div>


</header>
