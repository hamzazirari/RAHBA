@extends('layouts.app')

@section('title', 'Gérer mes produits - RAHBA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- En-tête & Bouton d'action -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <div class="flex items-center gap-2 text-sm font-semibold text-slate-400 mb-1">
                <a href="#" class="hover:text-amber-600 transition">Tableau de bord</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="text-slate-600">Mes Produits</span>
            </div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Mes Produits en ligne</h1>
        </div>
        <a href="#" class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-5 rounded-xl transition shadow-xs text-sm cursor-pointer">
            <i class="fa-solid fa-plus text-xs"></i> Ajouter un nouveau produit
        </a>
    </div>

    <!-- Filtres rapides et recherche interne -->
    <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-xs mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="relative w-full md:w-96">
            <input type="text" placeholder="Rechercher dans mes produits..." class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 transition outline-hidden">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
            </div>
        </div>
        <div class="flex gap-2 w-full md:w-auto overflow-x-auto">
            <button class="px-4 py-2 bg-slate-900 text-white text-xs font-bold rounded-lg whitespace-nowrap">Tous (8)</button>
            <button class="px-4 py-2 bg-slate-50 hover:bg-slate-100 text-slate-600 text-xs font-bold rounded-lg border border-slate-200/60 whitespace-nowrap">Actifs (6)</button>
            <button class="px-4 py-2 bg-slate-50 hover:bg-slate-100 text-slate-600 text-xs font-bold rounded-lg border border-slate-200/60 whitespace-nowrap">Rupture de stock (2)</button>
        </div>
    </div>

    <!-- Tableau de gestion du catalogue -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 text-xs font-bold uppercase tracking-wider">
                        <th class="py-3.5 px-6">Produit</th>
                        <th class="py-3.5 px-6">Catégorie</th>
                        <th class="py-3.5 px-6">Prix</th>
                        <th class="py-3.5 px-6">Stock</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    
                    <!-- Produit 1 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 flex items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=100" class="w-12 h-12 rounded-xl object-cover border bg-slate-50 flex-shrink-0">
                            <div class="min-w-0">
                                <span class="block font-bold text-slate-900 truncate max-w-[240px]">Souris Gaming Sans Fil RGB</span>
                                <span class="text-[11px] text-slate-400 font-mono mt-0.5 block">ID: #PROD-837</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold">Électronique</span>
                        </td>
                        <td class="py-4 px-6 font-black text-slate-900">350.00 DH</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-md text-xs font-bold">
                                12 en stock
                            </span>
                        </td>
                        <td class="py-4 px-6 text-right space-x-1 whitespace-nowrap">
                            <a href="#" class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-slate-200 text-slate-600 hover:text-amber-600 hover:border-amber-200 transition bg-white shadow-xs">
                                <i class="fa-solid fa-pen text-xs"></i>
                            </a>
                            <button class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-slate-200 text-slate-400 hover:text-rose-600 hover:border-rose-200 transition bg-white shadow-xs cursor-pointer">
                                <i class="fa-solid fa-trash-can text-xs"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Produit 2 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 flex items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=100" class="w-12 h-12 rounded-xl object-cover border bg-slate-50 flex-shrink-0">
                            <div class="min-w-0">
                                <span class="block font-bold text-slate-900 truncate max-w-[240px]">Clavier Mécanique Pro RGB</span>
                                <span class="text-[11px] text-slate-400 font-mono mt-0.5 block">ID: #PROD-492</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold">Électronique</span>
                        </td>
                        <td class="py-4 px-6 font-black text-slate-900">650.00 DH</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 bg-rose-50 text-rose-700 rounded-md text-xs font-bold">
                                Rupture
                            </span>
                        </td>
                        <td class="py-4 px-6 text-right space-x-1 whitespace-nowrap">
                            <a href="#" class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-slate-200 text-slate-600 hover:text-amber-600 hover:border-amber-200 transition bg-white shadow-xs">
                                <i class="fa-solid fa-pen text-xs"></i>
                            </a>
                            <button class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-slate-200 text-slate-400 hover:text-rose-600 hover:border-rose-200 transition bg-white shadow-xs cursor-pointer">
                                <i class="fa-solid fa-trash-can text-xs"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection