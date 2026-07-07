@extends('layouts.app')

@section('title', 'Modifier le produit - RAHBA')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8">
        <a href="{{ route('vendor.products.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-amber-600 transition">
            <i class="fa-solid fa-arrow-left text-xs"></i> Retour a mes produits
        </a>
        <h1 class="text-3xl font-black text-slate-900 tracking-tight mt-3">Modifier le produit</h1>
    </div>

    <form action="{{ route('vendor.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-xs">
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-3">Image actuelle</label>
                    <label class="border-2 border-dashed border-slate-200 hover:border-amber-400 rounded-xl p-4 transition text-center bg-slate-50/50 cursor-pointer flex flex-col items-center justify-center min-h-[220px]">
                        <input type="file" name="image" accept="image/jpeg,image/png,image/webp" class="hidden">
                        <img src="{{ $product->image_url ? asset($product->image_url) : 'https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=300' }}" class="w-full h-40 object-cover rounded-lg mb-2">
                        <span class="block text-[10px] text-amber-600 font-bold">Cliquer pour changer l'image</span>
                    </label>
                    @error('image') <p class="text-xs text-rose-600 mt-2">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="md:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom du produit</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                        @error('name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Categorie</label>
                        <select name="category_id" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Description</label>
                        <textarea name="description" rows="5" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden resize-none">{{ old('description', $product->description) }}</textarea>
                        @error('description') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Prix (DH)</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden font-semibold">
                            @error('price') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Stock</label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden font-semibold">
                            @error('stock') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('vendor.products.index') }}" class="px-5 py-3 border border-slate-200 bg-white text-slate-600 font-bold rounded-xl text-sm hover:bg-slate-50 transition">Annuler</a>
                    <button type="submit" class="px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-sm transition shadow-xs cursor-pointer">
                        <i class="fa-solid fa-floppy-disk mr-1.5"></i> Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
