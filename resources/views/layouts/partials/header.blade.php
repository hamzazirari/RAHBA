<header class="sticky top-0 z-50 bg-white border-b border-slate-100 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-4">
            <div class="flex-shrink-0">
                <a href="/" class="text-3xl font-black tracking-tight text-amber-600 flex items-center gap-2">
                    <i class="fa-solid fa-shop text-2xl"></i>
                    <span>RAHBA</span>
                </a>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <a href="#" class="text-sm font-medium text-slate-700">Bonjour, {{ auth()->user()->name }}</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-amber-600 transition">Connexion</a>
                    <a href="{{ route('register.client') }}" class="bg-amber-600 text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-amber-700 transition">S'inscrire</a>
                @endauth
            </div>
        </div>
    </div>
</header>