@extends('layouts.admin')

@section('title', 'Console Admin - RAHBA')

@section('admin-content')
<!-- Cartes statistiques -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
        <span class="block text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Utilisateurs</span>
        <span class="text-2xl font-black text-slate-900">1,240</span>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
        <span class="block text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Produits</span>
        <span class="text-2xl font-black text-slate-900">842</span>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
        <span class="block text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Commandes</span>
        <span class="text-2xl font-black text-slate-900">3,120</span>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
        <span class="block text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Chiffre d'Affaires</span>
        <span class="text-2xl font-black text-amber-600">145,200.00 DH</span>
    </div>
</div>

<!-- Tableaux de suivi rapide -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
    <!-- Derniers Utilisateurs -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-4">
        <h3 class="text-base font-bold text-slate-900">Nouveaux Comptes</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="py-3 pr-4 font-bold text-slate-800">Hamza</td>
                        <td class="py-3 px-4 text-slate-500">Client</td>
                        <td class="py-3 pl-4 text-right">
                            <a href="#" class="text-xs font-bold text-amber-600 hover:underline">Gérer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Commandes Récentes -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-4">
        <h3 class="text-base font-bold text-slate-900">Flux des Commandes</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="py-3 pr-4 font-bold text-slate-900">#CMD-94827</td>
                        <td class="py-3 px-4 font-semibold text-slate-700">350.00 DH</td>
                        <td class="py-3 pl-4 text-right">
                            <span class="inline-flex items-center px-2 py-0.5 bg-amber-50 text-amber-700 rounded-full text-xs font-bold">En cours</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection