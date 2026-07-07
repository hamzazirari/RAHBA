@extends('layouts.app')

@section('title', 'Profil Boutique - RAHBA')

@section('content')
<div class="flex min-h-screen bg-slate-50/50">
    
    @include('components.vendor-sidebar')

    <div class="flex-1 p-8 max-w-4xl">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Profil de la Boutique</h1>
            <p class="text-sm text-slate-500 mt-1">Configurez votre vitrine publique et consultez la note de vos clients.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Formulaire Infos Boutique -->
            <div class="md:col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5">
                <h3 class="text-base font-bold text-slate-900 border-b border-slate-50 pb-3">Détails de la Vitrine</h3>
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom de la boutique</label>
                    <input type="text" name="shop_name" value="TechShop Safi" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Description / Biographie</label>
                    <textarea name="shop_description" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden resize-none">Spécialiste du matériel informatique et accessoires gaming à Safi.</textarea>
                </div>

                <div class="flex justify-end pt-2">
                    <button class="px-5 py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl text-xs transition cursor-pointer">
                        Mettre à jour la boutique
                    </button>
                </div>
            </div>

            <!-- Encadré Réputation & Notes -->
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5 h-fit text-center">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Avis de votre Boutique</h3>
                
                <div class="py-4">
                    <span class="block text-4xl font-black text-slate-900">4.8</span>
                    <div class="flex items-center justify-center gap-1 text-amber-400 my-2">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span class="text-xs text-slate-400 font-semibold">Basé sur 20 notes clients</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection