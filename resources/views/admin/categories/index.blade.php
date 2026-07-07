@extends('layouts.admin')

@section('title', 'Gestion Catégories - Admin')

@section('admin-content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h1 class="text-2xl font-black text-slate-900">Arborescence des Catégories</h1>
        <p class="text-sm text-slate-500 mt-1">Créez et structurez les familles de produits du catalogue.</p>
    </div>
    
    <!-- Déclencheur Modal d'ajout -->
    <button class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 cursor-pointer">
        <i class="fa-solid fa-plus"></i> Ajouter une catégorie
    </button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Liste principale (2 Colonnes) -->
    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-xs overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                    <th class="py-4 px-6">Nom</th>
                    <th class="py-4 px-6">Articles liés</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="py-4 px-6">
                        <span class="font-bold text-slate-900 block">Électronique</span>
                        <span class="text-xs text-slate-400 font-medium block truncate max-w-[200px]">Téléphones, souris, claviers...</span>
                    </td>
                    <td class="py-4 px-6 font-semibold text-slate-600">142 produits</td>
                    <td class="py-4 px-6 text-right flex justify-end gap-2 mt-1">
                        <button class="px-2.5 py-1.5 bg-slate-100 text-slate-700 rounded-lg text-xs font-bold hover:bg-slate-200 transition cursor-pointer">Éditer</button>
                        <button class="px-2.5 py-1.5 bg-rose-50 text-rose-700 rounded-lg text-xs font-bold hover:bg-rose-600 hover:text-white transition cursor-pointer">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Formulaire d'ajout/édition (1 Colonne) -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-4 h-fit">
        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-50 pb-2">Nouvelle / Édition</h3>
        
        <form action="#" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1.5">Nom de la catégorie</label>
                <input type="text" name="name" required placeholder="Ex: Électronique"
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-hidden focus:bg-white focus:border-amber-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1.5">Description</label>
                <textarea name="description" rows="3" placeholder="Description de l'univers de produits..."
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-hidden focus:bg-white focus:border-amber-500 transition resize-none"></textarea>
            </div>
            <button type="submit" class="w-full py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-xs transition cursor-pointer">
                Enregistrer la catégorie
            </button>
        </form>
    </div>
</div>
@endsection