@extends('layouts.app')

@section('title', 'Détails de la commande #CMD-94827 - RAHBA')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-amber-600 transition">
                <i class="fa-solid fa-arrow-left text-xs"></i> Retour à mes commandes
            </a>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight mt-3">Commande n° #CMD-94827</h1>
            <p class="text-xs text-slate-500 mt-1">Passée le 10 Juin 2026 à 14:32</p>
        </div>
        <div>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-50 text-amber-700 rounded-full font-bold text-xs border border-amber-200">
                <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span> En cours de livraison
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
                <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-4 mb-4">Articles commandés</h2>
                
                <div class="divide-y divide-slate-100">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-4 first:pt-0 last:pb-0 gap-4">
                        <div class="flex items-center gap-4">
                            <img src="https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=150" class="w-16 h-16 rounded-xl object-cover border bg-slate-50 flex-shrink-0">
                            <div class="min-w-0">
                                <h4 class="text-sm font-bold text-slate-800 truncate max-w-[200px] sm:max-w-xs">Souris Gaming Sans Fil RGB</h4>
                                <p class="text-xs text-slate-400 mt-0.5">Quantité : 1 &bull; <span class="font-semibold text-amber-600">TechShop Safi</span></p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-4">
                            <span class="text-sm font-black text-slate-900">350.00 DH</span>
                            <button class="px-3 py-1.5 bg-slate-50 hover:bg-amber-50 text-slate-700 hover:text-amber-700 rounded-lg text-xs font-bold border border-slate-200 transition cursor-pointer">
                                <i class="fa-regular fa-star mr-1"></i> Laisser un avis
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Adresse de livraison</h3>
                    <p class="text-sm font-bold text-slate-800">Hamza</p>
                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Quartier Mfata, Rue 4, N° 12<br>Safi, Maroc</p>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Contact & Paiement</h3>
                    <p class="text-sm text-slate-600"><span class="font-semibold text-slate-800">Téléphone:</span> +212 612 34 56 78</p>
                    <p class="text-sm text-slate-600 mt-2"><span class="font-semibold text-slate-800">Méthode:</span> Paiement à la livraison (COD)</p>
                </div>
            </div>

        </div>

        <div class="space-y-6">
            
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
                <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-4 mb-6">Suivi du colis</h2>
                
                <div class="relative pl-6 space-y-6 before:absolute before:inset-y-0 before:left-2 before:w-0.5 before:bg-slate-100">
                    
                    <div class="relative before:absolute before:left-[-22px] before:top-1 before:w-3 before:h-3 before:rounded-full before:bg-emerald-500 before:ring-4 before:ring-emerald-100">
                        <p class="text-xs font-bold text-slate-900">Commande validée</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">10 Juin 2026 à 14:32</p>
                    </div>

                    <div class="relative before:absolute before:left-[-22px] before:top-1 before:w-3 before:h-3 before:rounded-full before:bg-amber-500 before:ring-4 before:ring-amber-100">
                        <p class="text-xs font-bold text-amber-700">En cours de livraison</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Le livreur est en route vers votre adresse à Safi.</p>
                    </div>

                    <div class="relative opacity-50 before:absolute before:left-[-22px] before:top-1 before:w-3 before:h-3 before:rounded-full before:bg-slate-200">
                        <p class="text-xs font-bold text-slate-500">Livré & Payé</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">En attente de réception.</p>
                    </div>

                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-3">
                <div class="flex justify-between text-sm text-slate-600">
                    <span>Sous-total</span>
                    <span class="font-semibold text-slate-900">350.00 DH</span>
                </div>
                <div class="flex justify-between text-sm text-slate-600">
                    <span>Livraison</span>
                    <span class="text-emerald-600 font-bold">Gratuit</span>
                </div>
                <div class="border-t border-slate-100 pt-3 flex justify-between text-sm font-black text-slate-900">
                    <span>Total payé</span>
                    <span class="text-lg text-amber-600">350.00 DH</span>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection