@extends('layouts.app')

@section('title', 'Gestion Commande #CMD-94827 - RAHBA')

@section('content')
<div class="flex min-h-screen bg-slate-50/50">
    
    @include('components.vendor-sidebar')

    <div class="flex-1 p-8 max-w-5xl">
        <!-- En-tête -->
        <div class="mb-8">
            <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-amber-600 transition">
                <i class="fa-solid fa-arrow-left text-xs"></i> Retour aux commandes
            </a>
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mt-3">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">Commande #CMD-94827</h1>
                    <p class="text-xs text-slate-400 mt-0.5">Reçue le 10 Juin 2026 à 14:32</p>
                </div>
                
                <!-- Formulaire de mise à jour du statut -->
                <form action="#" method="POST" class="flex items-center gap-2 bg-white p-2 rounded-xl border border-slate-200 shadow-xs">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="text-xs font-bold bg-slate-50 border border-slate-100 rounded-lg px-3 py-2 outline-hidden">
                        <option value="pending">En attente</option>
                        <option value="processing" selected>En cours</option>
                        <option value="delivered">Livré</option>
                        <option value="cancelled">Annulé</option>
                    </select>
                    <button type="submit" class="px-3 py-2 bg-amber-600 hover:bg-amber-700 text-white rounded-lg text-xs font-bold transition cursor-pointer">
                        Mettre à jour
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Articles commandés (2 colonnes) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
                    <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-50 pb-4 mb-4">Articles</h2>
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center gap-4">
                            <img src="https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=100" class="w-12 h-12 rounded-lg object-cover border bg-slate-50">
                            <div>
                                <h4 class="text-sm font-bold text-slate-800">Souris Gaming Sans Fil RGB</h4>
                                <p class="text-xs text-slate-400 mt-0.5">Quantité : 1</p>
                            </div>
                        </div>
                        <span class="text-sm font-black text-slate-900">350.00 DH</span>
                    </div>
                </div>
            </div>

            <!-- Infos Client (1 colonne) -->
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-4 h-fit">
                <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-50 pb-3">Client & Livraison</h2>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase">Nom complet</p>
                    <p class="text-sm font-semibold text-slate-800 mt-0.5">Hamza</p>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase">Téléphone</p>
                    <p class="text-sm text-slate-600 mt-0.5">+212 612 34 56 78</p>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase">Adresse</p>
                    <p class="text-sm text-slate-600 mt-0.5 leading-relaxed">Quartier Mfata, Rue 4, N° 12, Safi</p>
                </div>
                <div class="pt-2 border-t border-slate-50 flex justify-between items-center">
                    <span class="text-xs font-bold text-slate-400 uppercase">Total Commande</span>
                    <span class="text-base font-black text-amber-600">350.00 DH</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection