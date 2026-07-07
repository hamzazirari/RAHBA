@extends('layouts.app')

@section('title', 'Connexion - RAHBA')

@section('content')
<div class="max-w-md mx-auto my-16 bg-white p-8 rounded-2xl border border-slate-100 shadow-xs">
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">De retour parmi nous ?</h1>
        <p class="text-xs text-slate-400 mt-1">Connectez-vous pour accéder à votre espace.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Adresse Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
            @error('email')
                <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <div class="flex justify-between items-center mb-2">
                <label class="block text-xs font-bold text-slate-700 uppercase">Mot de passe</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs font-bold text-amber-600 hover:underline">Oublié ?</a>
                @endif
            </div>
            <input type="password" name="password" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
            @error('password')
                <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded border-slate-300 text-amber-600 focus:ring-amber-500">
            <label for="remember_me" class="ml-2 text-xs font-semibold text-slate-600">Se souvenir de moi</label>
        </div>

        <button type="submit" class="w-full py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl text-sm transition shadow-xs cursor-pointer">
            Se connecter
        </button>
    </form>
    <div class="mt-6 text-center text-sm text-slate-600">
    Pas encore de compte ? 
    <a href="{{ route('register') }}" class="text-amber-600 font-bold hover:underline">Inscrivez-vous</a>
</div>
</div>
@endsection