@extends('layouts.app')

@section('title', 'Mon Tableau de Bord')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900">Bonjour, Hamza 👋</h1>
            <p class="text-sm text-slate-500 mt-1">Bienvenue sur votre espace client. Suivez vos achats en temps réel.</p>
        </div>
        <div class="flex gap-3">
            <span class="px-4 py-2 bg-slate-50 rounded-xl text-xs font-bold border border-slate-100 text-slate-600">
                <i class="fa-solid fa-basket-shopping mr-1.5 text-amber-500"></i> 1 Commande en cours
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <aside class="lg:col-span-1 space-y-1">
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-amber-50 text-amber-700 font-bold rounded-xl text-sm transition">
                <i class="fa-solid fa-box text-base"></i> Mes Commandes
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-100 font-semibold rounded-xl text-sm transition">
                <i class="fa-regular fa-user text-base"></i> Informations Profil
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-rose-600 hover:bg-rose-50 font-semibold rounded-xl text-sm transition">
                <i class="fa-solid fa-arrow-right-from-bracket text-base"></i> Déconnexion
            </a>
        </aside>

        <section class="lg:col-span-3 space-y-6">
            <h2 class="text-lg font-bold text-slate-900">Historique des commandes</h2>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-xs overflow-hidden">
                <div class="bg-slate-50/70 px-6 py-4 border-b border-slate-100 grid grid-cols-2 sm:grid-cols-4 gap-4 text-xs">
                    <div>
                        <span class="block text-slate-400 font-bold uppercase tracking-wider">Date</span>
                        <span class="font-bold text-slate-800 mt-1 block">10 Juin 2026</span>
                    </div>
                    <div>
                        <span class="block text-slate-400 font-bold uppercase tracking-wider">N° Commande</span>
                        <span class="font-mono font-bold text-slate-800 mt-1 block">#CMD-94827</span>
                    </div>
                    <div>
                        <span class="block text-slate-400 font-bold uppercase tracking-wider">Total</span>
                        <span class="font-black text-slate-900 mt-1 block">350.00 DH</span>
                    </div>
                    <div class="text-left sm:text-right">
                        <span class="block text-slate-400 font-bold uppercase tracking-wider mb-1">Statut</span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-50 text-amber-700 rounded-full font-bold text-[11px] border border-amber-200">
                            <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span> En cours de livraison
                        </span>
                    </div>
                </div>

                <div class="p-6 space-y-4">
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=150" class="w-16 h-16 rounded-xl object-cover border bg-slate-50">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-bold text-slate-800 truncate">Souris Gaming Sans Fil RGB</h4>
                            <p class="text-xs text-slate-400 mt-0.5">Quantité : 1 &bull; Boutique : <span class="text-amber-600 font-semibold">TechShop Safi</span></p>
                        </div>
                        <div class="text-right">
                            <a href="#" class="text-xs font-bold text-amber-600 hover:text-amber-700 hover:underline transition">Voir le produit</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 
            <div class="text-center py-12 bg-white rounded-2xl border border-slate-100">
                <i class="fa-solid fa-box-open text-slate-200 text-5xl mb-3"></i>
                <p class="text-sm text-slate-500">Vous n'avez pas encore passé de commande.</p>
            </div> 
            --}}
        </section>
    </div>
</div>
@endsection