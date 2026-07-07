<header class="bg-white border-b border-slate-100 shadow-xs sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-4">
            <a href="{{ route('vendor.dashboard') }}" class="text-3xl font-black tracking-tight text-amber-600 flex items-center gap-2">
                <i class="fa-solid fa-shop text-2xl"></i>
                <span>{{ auth()->user()->shop_name ?? 'RAHBA' }}</span>
            </a>

            <nav class="hidden md:flex items-center gap-2">
                <a href="{{ route('vendor.dashboard') }}" class="px-3 py-2 rounded-xl text-sm font-bold {{ request()->routeIs('vendor.dashboard*') ? 'bg-amber-50 text-amber-700 border border-amber-100' : 'text-slate-700 hover:bg-slate-50 hover:text-amber-600' }}">Dashboard</a>
                <a href="{{ route('vendor.products.index') }}" class="px-3 py-2 rounded-xl text-sm font-bold {{ request()->routeIs('vendor.products*') ? 'bg-amber-50 text-amber-700 border border-amber-100' : 'text-slate-700 hover:bg-slate-50 hover:text-amber-600' }}">Produits</a>
                <a href="{{ route('vendor.orders.index') }}" class="px-3 py-2 rounded-xl text-sm font-bold {{ request()->routeIs('vendor.orders*') ? 'bg-amber-50 text-amber-700 border border-amber-100' : 'text-slate-700 hover:bg-slate-50 hover:text-amber-600' }}">Commandes</a>
                <a href="{{ route('vendor.profile.show') }}" class="px-3 py-2 rounded-xl text-sm font-bold {{ request()->routeIs('vendor.profile*') ? 'bg-amber-50 text-amber-700 border border-amber-100' : 'text-slate-700 hover:bg-slate-50 hover:text-amber-600' }}">Profil boutique</a>
                <a href="{{ route('vendor.shop', auth()->id()) }}" class="px-3 py-2 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-50 hover:text-amber-600">Voir boutique</a>
            </nav>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm font-bold text-rose-600 hover:text-white hover:bg-rose-600 px-4 py-2.5 border border-rose-100 rounded-xl transition cursor-pointer">
                    <i class="fa-solid fa-arrow-right-from-bracket mr-1.5"></i> Deconnexion
                </button>
            </form>
        </div>
    </div>
</header>
