@extends('layouts.app')

@section('title', 'Créer un compte - RAHBA')

@section('content')
<div class="max-w-md mx-auto my-12 bg-white p-8 rounded-2xl border border-slate-100 shadow-xs" 
     x-data="{ role: '{{ old('role', 'client') }}' }">
    
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Rejoignez RAHBA</h1>
        <p class="text-xs text-slate-400 mt-1">Créez votre compte en quelques secondes.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Vous êtes ?</label>
            <select name="role" x-model="role" required 
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 focus:bg-white focus:border-amber-500 transition outline-hidden">
                <option value="client">Acheteur (Client)</option>
                <option value="vendor">Commerçant (Vendeur)</option>
            </select>
            @error('role')
                <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom complet</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 transition outline-hidden">
            @error('name')
                <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Adresse Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 transition outline-hidden">
            @error('email')
                <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Numéro de téléphone</label>
            <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+212..."
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 transition outline-hidden">
            @error('phone')
                <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div x-show="role === 'vendor'" x-transition class="space-y-4 pt-2 border-t border-slate-100">
            <div>
                <label class="block text-xs font-bold text-amber-700 uppercase mb-2">Nom de votre Boutique</label>
                <input type="text" name="shop_name" value="{{ old('shop_name') }}" 
                    x-bind:required="role === 'vendor'"
                    placeholder="Ex: TechShop Safi"
                    class="w-full px-4 py-3 bg-amber-50/50 border border-amber-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 transition outline-hidden">
                @error('shop_name')
                    <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-amber-700 uppercase mb-2">Description de la boutique</label>
                <textarea name="shop_description" rows="3" 
                    placeholder="Décrivez brièvement ce que vous vendez..."
                    class="w-full px-4 py-3 bg-amber-50/50 border border-amber-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 transition resize-none outline-hidden">{{ old('shop_description') }}</textarea>
                @error('shop_description')
                    <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Mot de passe</label>
            <input type="password" name="password" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 transition outline-hidden">
            @error('password')
                <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 transition outline-hidden">
        </div>

        <button type="submit" class="w-full py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl text-sm transition shadow-xs cursor-pointer">
            Créer mon compte
        </button>
    </form>
    <div class="mt-6 text-center text-sm text-slate-600">
    Déjà un compte ? 
    <a href="{{ route('login') }}" class="text-amber-600 font-bold hover:underline">Connectez-vous</a>
</div>
</div>
@endsection