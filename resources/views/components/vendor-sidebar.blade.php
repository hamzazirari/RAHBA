<aside class="w-64 bg-white border-r border-slate-100 p-5 hidden lg:block">
    <div class="mb-6">
        <p class="text-xs font-bold uppercase tracking-wider text-amber-600">Espace vendeur</p>
        <h2 class="text-lg font-black text-slate-900 mt-1">{{ auth()->user()->shop_name ?? auth()->user()->name }}</h2>
    </div>

    <nav class="space-y-1">
        <a href="{{ route('vendor.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('vendor.dashboard*') ? 'bg-amber-50 text-amber-700' : 'text-slate-600 hover:bg-slate-50' }}">
            <i class="fa-solid fa-chart-pie w-4"></i> Dashboard
        </a>
        <a href="{{ route('vendor.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('vendor.products*') ? 'bg-amber-50 text-amber-700' : 'text-slate-600 hover:bg-slate-50' }}">
            <i class="fa-solid fa-boxes-stacked w-4"></i> Mes produits
        </a>
        <a href="{{ route('vendor.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('vendor.orders*') ? 'bg-amber-50 text-amber-700' : 'text-slate-600 hover:bg-slate-50' }}">
            <i class="fa-solid fa-receipt w-4"></i> Commandes
        </a>
        <a href="{{ route('vendor.profile.show') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('vendor.profile*') ? 'bg-amber-50 text-amber-700' : 'text-slate-600 hover:bg-slate-50' }}">
            <i class="fa-solid fa-store w-4"></i> Profil boutique
        </a>
    </nav>
</aside>
