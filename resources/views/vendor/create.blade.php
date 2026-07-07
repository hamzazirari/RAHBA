@extends('layouts.app')

@section('title', 'Ajouter un produit - RAHBA')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- En-tête -->
    <div class="mb-8">
        <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-amber-600 transition">
            <i class="fa-solid fa-arrow-left text-xs"></i> Retour à mes produits
        </a>
        <h1 class="text-3xl font-black text-slate-900 tracking-tight mt-3">Ajouter un nouveau produit</h1>
        <p class="text-sm text-slate-500 mt-1">Remplissez les détails ci-dessous pour publier votre produit sur le catalogue.</p>
    </div>

    <!-- Formulaire d'ajout -->
    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Upload d'image -->
            <div class="md:col-span-1 space-y-4">
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-xs">
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-3">Image du produit</label>
                    <div class="border-2 border-dashed border-slate-200 hover:border-amber-400 rounded-xl p-4 transition text-center bg-slate-50/50 cursor-pointer relative group flex flex-col items-center justify-center min-h-[200px]">
                        <input type="file" name="image" required accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div class="space-y-2 pointer-events-none">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 group-hover:text-amber-600 transition"></i>
                            <span class="block text-xs font-bold text-slate-700">Glisser ou sélectionner</span>
                            <span class="block text-[10px] text-slate-400">PNG, JPG ou WEBP jusqu'à 5Mo</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations détaillées -->
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5">
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom du produit</label>
                        <input type="text" name="name" required placeholder="Ex: Clavier Mécanique Pro RGB" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Catégorie</label>
                        <select name="category" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                            <option value="">Sélectionner une catégorie</option>
                            <option value="electronics">Électronique</option>
                            <option value="fashion">Mode & Vêtements</option>
                            <option value="food">Alimentation & Épicerie</option>
                            <option value="crafts">Artisanat local</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Description du produit</label>
                        <textarea name="description" rows="5" required placeholder="Décrivez votre produit..." 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden resize-none"></textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Prix (DH)</label>
                            <div class="relative">
                                <input type="number" step="0.01" name="price" required placeholder="0.00" 
                                    class="w-full pl-4 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden font-semibold">
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-bold text-slate-400 pointer-events-none">DH</div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Quantité en stock</label>
                            <input type="number" name="stock" required placeholder="Ex: 10" 
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden font-semibold">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <button type="button" class="px-5 py-3 border border-slate-200 bg-white text-slate-600 font-bold rounded-xl text-sm hover:bg-slate-50 transition cursor-pointer">Annuler</button>
                    <button type="submit" class="px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-sm transition shadow-xs cursor-pointer">
                        <i class="fa-solid fa-circle-check mr-1.5"></i> Mettre en vente
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection