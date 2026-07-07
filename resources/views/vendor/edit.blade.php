@extends('layouts.app')

@section('title', 'Modifier le produit - RAHBA')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- En-tête -->
    <div class="mb-8">
        <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-amber-600 transition">
            <i class="fa-solid fa-arrow-left text-xs"></i> Retour à mes produits
        </a>
        <h1 class="text-3xl font-black text-slate-900 tracking-tight mt-3">Modifier le produit</h1>
        <p class="text-sm text-slate-500 mt-1">Modifiez les informations de votre produit ci-dessous.</p>
    </div>

    <!-- Formulaire de modification -->
    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT') {{-- Requis par Laravel pour la modification --}}

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Aperçu et changement d'image -->
            <div class="md:col-span-1 space-y-4">
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-xs">
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-3">Image actuelle</label>
                    <div class="border-2 border-dashed border-slate-200 hover:border-amber-400 rounded-xl p-4 transition text-center bg-slate-50/50 cursor-pointer relative group flex flex-col items-center justify-center min-h-[200px]">
                        <input type="file" name="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        
                        {{-- Image existante pré-remplie pour l'exemple --}}
                        <img src="https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=300" class="w-full h-40 object-cover rounded-lg mb-2">
                        <span class="block text-[10px] text-amber-600 font-bold group-hover:text-amber-700">Cliquez pour modifier la photo</span>
                    </div>
                </div>
            </div>

            <!-- Informations pré-remplies via $product -->
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5">
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom du produit</label>
                        <input type="text" name="name" required value="Souris Gaming Sans Fil RGB" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Catégorie</label>
                        <select name="category" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                            <option value="electronics" selected>Électronique</option>
                            <option value="fashion">Mode & Vêtements</option>
                            <option value="food">Alimentation & Épicerie</option>
                            <option value="crafts">Artisanat local</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Description du produit</label>
                        <textarea name="description" rows="5" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden resize-none">Une excellente souris gaming sans fil avec un capteur haute précision et rétroéclairage RGB personnalisable.</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Prix (DH)</label>
                            <div class="relative">
                                <input type="number" step="0.01" name="price" required value="350.00" 
                                    class="w-full pl-4 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden font-semibold">
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-bold text-slate-400 pointer-events-none">DH</div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Quantité en stock</label>
                            <input type="number" name="stock" required value="12" 
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden font-semibold">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <button type="button" class="px-5 py-3 border border-slate-200 bg-white text-slate-600 font-bold rounded-xl text-sm hover:bg-slate-50 transition cursor-pointer">Annuler</button>
                    <button type="submit" class="px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-sm transition shadow-xs cursor-pointer">
                        <i class="fa-solid fa-floppy-disk mr-1.5"></i> Enregistrer les modifications
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection