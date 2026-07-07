@extends('layouts.app')

@section('title', 'Commandes Reçues - RAHBA')

@section('content')
<div class="flex min-h-screen bg-slate-50/50">
    
    <!-- Inclure ton menu latéral vendeur ici -->
    @include('components.vendor-sidebar')

    <div class="flex-1 p-8">
        <!-- En-tête -->
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Commandes Reçues</h1>
                <p class="text-sm text-slate-500 mt-1">Suivez et gérez les ventes de votre boutique.</p>
            </div>
            
            <!-- Filtre par statut -->
            <select class="text-xs font-bold bg-white border border-slate-200 rounded-xl px-4 py-3 shadow-xs outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition">
                <option value="">Tous les statuts</option>
                <option value="pending">En attente</option>
                <option value="processing">En cours</option>
                <option value="delivered">Livré</option>
                <option value="cancelled">Annulé</option>
            </select>
        </div>

        <!-- Tableau des commandes -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <th class="py-4 px-6">N° Commande</th>
                            <th class="py-4 px-6">Client</th>
                            <th class="py-4 px-6">Date</th>
                            <th class="py-4 px-6">Montant</th>
                            <th class="py-4 px-6">Statut</th>
                            <th class="py-4 px-6 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        <!-- Exemple Ligne 1 -->
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-6 font-bold text-slate-900">#CMD-94827</td>
                            <td class="py-4 px-6 text-slate-600">Hamza</td>
                            <td class="py-4 px-6 text-slate-500">10 Juin 2026</td>
                            <td class="py-4 px-6 font-semibold text-slate-900">350.00 DH</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-amber-50 text-amber-700 rounded-full font-bold text-xs border border-amber-100">
                                    En cours
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a href="#" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 hover:bg-amber-600 hover:text-white text-slate-700 rounded-lg text-xs font-bold transition">
                                    Gérer <i class="fa-solid fa-angle-right text-[10px]"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection