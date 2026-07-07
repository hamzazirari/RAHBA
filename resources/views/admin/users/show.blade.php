@extends('layouts.admin')

@section('title', 'Fiche Utilisateur - Admin')

@section('admin-content')
<div class="mb-8">
    <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-amber-600 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Retour à la liste
    </a>
    <h1 class="text-2xl font-black text-slate-900 tracking-tight mt-3">Fiche d'identification globale</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Profil de base -->
    <div class="md:col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-6">
        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-50 pb-3">Informations générales</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase">Nom complet</span>
                <span class="font-bold text-slate-800 mt-1 block">Hamza</span>
            </div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase">Adresse Email</span>
                <span class="font-semibold text-slate-600 mt-1 block">hamza@email.com</span>
            </div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase">Téléphone</span>
                <span class="text-slate-600 mt-1 block">+212 612 34 56 78</span>
            </div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase">Rôle & Statut</span>
                <span class="text-slate-700 mt-1 block font-bold">Vendeur &bull; <span class="text-emerald-600">Actif</span></span>
            </div>
        </div>

        <!-- Section dynamique si l'utilisateur est un vendeur -->
        <div class="mt-6 pt-6 border-t border-slate-100 space-y-4">
            <h4 class="text-xs font-bold text-amber-700 uppercase tracking-wider">Données Métiers (Vendeur)</h4>
            <div class="grid grid-cols-3 gap-4 text-center">
                <div class="bg-slate-50 p-4 rounded-xl">
                    <span class="block text-xs text-slate-400 font-semibold">Nom Boutique</span>
                    <span class="font-black text-slate-800 text-sm mt-1 block">TechShop Safi</span>
                </div>
                <div class="bg-slate-50 p-4 rounded-xl">
                    <span class="block text-xs text-slate-400 font-semibold">Produits en ligne</span>
                    <span class="font-black text-slate-800 text-sm mt-1 block">24</span>
                </div>
                <div class="bg-slate-50 p-4 rounded-xl">
                    <span class="block text-xs text-slate-400 font-semibold">Commandes honorées</span>
                    <span class="font-black text-slate-800 text-sm mt-1 block">112</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Panel Actions Directes -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-4 h-fit">
        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-50 pb-3">Actions de modération</h3>
        
        <button class="w-full py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-xs transition shadow-xs cursor-pointer">
            Éditer le statut d'accès
        </button>
        <button class="w-full py-3 bg-rose-50 text-rose-700 hover:bg-rose-600 hover:text-white font-bold rounded-xl text-xs transition cursor-pointer">
            Supprimer définitivement
        </button>
    </div>
</div>
@endsection