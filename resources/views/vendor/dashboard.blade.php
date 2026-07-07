@extends('layouts.app')

@section('title', 'Tableau de bord Vendeur - RAHBA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Ma Boutique</h1>
            <p class="text-sm text-slate-500 mt-1">Gérez vos produits, suivez vos performances et vos ventes à Safi.</p>
        </div>
        <div>
            <a href="#" class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-5 rounded-xl transition shadow-xs text-sm cursor-pointer">
                <i class="fa-solid fa-plus text-xs"></i> Ajouter un produit
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs flex items-center justify-between">
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Ventes Totales</span>
                <span class="block text-2xl font-black text-slate-900 mt-1">4,850.00 DH</span>
            </div>
            <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 text-xl">
                <i class="fa-solid fa-wallet"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs flex items-center justify-between">
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Commandes</span>
                <span class="block text-2xl font-black text-slate-900 mt-1">14</span>
            </div>
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 text-xl">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs flex items-center justify-between">
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Produits en ligne</span>
                <span class="block text-2xl font-black text-slate-900 mt-1">8</span>
            </div>
            <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 text-xl">
                <i class="fa-solid fa-tags"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs flex items-center justify-between">
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Avis Clients</span>
                <span class="block text-2xl font-black text-slate-900 mt-1">4.8 <span class="text-xs font-medium text-slate-400">/5</span></span>
            </div>
            <div class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center text-rose-600 text-xl">
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-xs overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center">
                <h2 class="font-bold text-slate-900 text-base">Commandes de la semaine</h2>
                <a href="#" class="text-xs font-bold text-amber-600 hover:underline">Voir tout</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 text-xs font-bold uppercase tracking-wider">
                            <th class="py-3 px-6">Client</th>
                            <th class="py-3 px-6">Produit</th>
                            <th class="py-3 px-6">Prix</th>
                            <th class="py-3 px-6">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                        <tr>
                            <td class="py-4 px-6 font-bold text-slate-900">Ahmed D.</td>
                            <td class="py-4 px-6 truncate max-w-[180px]">Souris Gaming Sans Fil RGB</td>
                            <td class="py-4 px-6 font-black">350.00 DH</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-amber-50 text-amber-700 rounded-full text-xs font-bold">
                                    À préparer
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 font-bold text-slate-900">Youssef K.</td>
                            <td class="py-4 px-6 truncate max-w-[180px]">Clavier Mécanique Pro</td>
                            <td class="py-4 px-6 font-black">650.00 DH</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-emerald-50 text-emerald-700 rounded-full text-xs font-bold">
                                    Livré
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-3">
            <h2 class="font-bold text-slate-900 text-base border-b border-slate-100 pb-3 mb-4">Gestion</h2>
            
            <a href="#" class="flex items-center justify-between p-3.5 bg-slate-50 hover:bg-amber-50/50 rounded-xl transition group">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-boxes-stacked text-slate-400 group-hover:text-amber-600 text-base"></i>
                    <span class="text-sm font-bold text-slate-700 group-hover:text-amber-900">Mes Produits</span>
                </div>
                <i class="fa-solid fa-chevron-right text-xs text-slate-400 group-hover:text-amber-600"></i>
            </a>

            <a href="#" class="flex items-center justify-between p-3.5 bg-slate-50 hover:bg-amber-50/50 rounded-xl transition group">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-chart-line text-slate-400 group-hover:text-amber-600 text-base"></i>
                    <span class="text-sm font-bold text-slate-700 group-hover:text-amber-900">Rapports de ventes</span>
                </div>
                <i class="fa-solid fa-chevron-right text-xs text-slate-400 group-hover:text-amber-600"></i>
            </a>
        </div>

    </div>
</div>
@endsection