@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs - Admin')

@section('admin-content')
<div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h1 class="text-2xl font-black text-slate-900">Base Utilisateurs</h1>
        <p class="text-sm text-slate-500 mt-1">Supervisez et ajustez les statuts d'accès de la plateforme.</p>
    </div>
    
    <!-- Zone Filtres & Recherche -->
    <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
        <input type="text" placeholder="Rechercher par nom/email..." 
            class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm outline-hidden focus:border-amber-500 transition">
        <select class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm outline-hidden font-semibold text-slate-600">
            <option value="">Rôle</option>
            <option value="client">Client</option>
            <option value="vendor">Vendeur</option>
        </select>
    </div>
</div>

<!-- Grand tableau utilisateurs -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-xs overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                    <th class="py-4 px-6">Identité</th>
                    <th class="py-4 px-6">Email</th>
                    <th class="py-4 px-6">Rôle</th>
                    <th class="py-4 px-6">Statut</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="py-4 px-6 font-bold text-slate-900">Hamza</td>
                    <td class="py-4 px-6 text-slate-600">hamza@email.com</td>
                    <td class="py-4 px-6 font-semibold text-slate-500">Vendeur</td>
                    <td class="py-4 px-6">
                        <span class="inline-flex items-center px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-bold">Actif</span>
                    </td>
                    <td class="py-4 px-6 text-right flex justify-end gap-2">
                        <a href="#" class="px-2.5 py-1.5 bg-slate-100 text-slate-700 rounded-lg text-xs font-bold hover:bg-slate-200 transition">Détails</a>
                        <button class="px-2.5 py-1.5 bg-amber-50 text-amber-700 rounded-lg text-xs font-bold hover:bg-amber-600 hover:text-white transition cursor-pointer">Désactiver</button>
                        <button class="px-2.5 py-1.5 bg-rose-50 text-rose-700 rounded-lg text-xs font-bold hover:bg-rose-600 hover:text-white transition cursor-pointer">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection