@extends('layouts.app')

@section('title', 'Ajouter un produit - RAHBA')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8">
        <a href="{{ route('vendor.products.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-amber-600 transition">
            <i class="fa-solid fa-arrow-left text-xs"></i> Retour a mes produits
        </a>
        <h1 class="text-3xl font-black text-slate-900 tracking-tight mt-3">Ajouter un nouveau produit</h1>
        <p class="text-sm text-slate-500 mt-1">Publiez un produit dans votre boutique.</p>
    </div>

    <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-xs">
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-3">Image du produit</label>
                    <label class="border-2 border-dashed border-slate-200 hover:border-amber-400 rounded-xl p-4 transition text-center bg-slate-50/50 cursor-pointer flex flex-col items-center justify-center min-h-[200px]">
                        <input type="file" name="image" required accept="image/jpeg,image/png,image/webp" class="hidden">
                        <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-2"></i>
                        <span class="block text-xs font-bold text-slate-700">Choisir une image</span>
                        <span class="block text-[10px] text-slate-400">JPG, PNG ou WEBP jusqu'a 5Mo</span>
                    </label>
                    @error('image') <p class="text-xs text-rose-600 mt-2">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="md:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom du produit</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                        @error('name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Categorie</label>
                        <select name="category_id" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                            <option value="">Selectionner une categorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Description</label>
                        <textarea name="description" rows="5" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden resize-none">{{ old('description') }}</textarea>
                        @error('description') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Prix (DH)</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden font-semibold">
                            @error('price') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Stock</label>
                            <input type="number" name="stock" value="{{ old('stock') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden font-semibold">
                            @error('stock') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('vendor.products.index') }}" class="px-5 py-3 border border-slate-200 bg-white text-slate-600 font-bold rounded-xl text-sm hover:bg-slate-50 transition">Annuler</a>
                    <button type="submit" class="px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-sm transition shadow-xs cursor-pointer">
                        <i class="fa-solid fa-circle-check mr-1.5"></i> Mettre en vente
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
