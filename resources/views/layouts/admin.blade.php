<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Panel Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/YOUR_KIT.js" crossorigin="anonymous"></script>
</head>
<body class="bg-slate-50/50 antialiased">

    <div class="flex min-h-screen">
        
        <aside class="w-64 bg-slate-900 text-white flex flex-col justify-between border-r border-slate-800 shrink-0">
            <div class="p-6">
                <div class="flex items-center gap-2 font-black text-xl tracking-tight text-amber-500 mb-8">
                    <i class="fa-solid fa-screwdriver-wrench"></i> RAHBA ADMIN
                </div>
                <nav class="space-y-1">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 bg-amber-600 font-bold rounded-xl text-sm text-white transition">
                        <i class="fa-solid fa-chart-pie text-base"></i> Vue d'ensemble
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white font-bold rounded-xl text-sm transition">
                        <i class="fa-solid fa-users text-base"></i> Utilisateurs
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white font-bold rounded-xl text-sm transition">
                        <i class="fa-solid fa-tags text-base"></i> Catégories
                    </a>
                </nav>
            </div>
            <div class="p-4 border-t border-slate-800">
                <button class="w-full flex items-center gap-3 px-4 py-3 text-rose-400 hover:bg-rose-500/10 font-bold rounded-xl text-sm transition text-left cursor-pointer">
                    <i class="fa-solid fa-arrow-right-from-bracket text-base"></i> Quitter le panel
                </button>
            </div>
        </aside>

        <div class="flex-1">
            <header class="bg-white border-b border-slate-100 py-4 px-8 flex justify-between items-center shadow-xs">
                <div class="text-sm font-semibold text-slate-500">Console de gestion globale</div>
                <div class="flex items-center gap-3">
                    <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full"></span>
                    <span class="text-sm font-bold text-slate-800">Admin Principal</span>
                </div>
            </header>

            <main class="p-8">
                @yield('admin-content')
            </main>
        </div>

    </div>

</body>
</html>