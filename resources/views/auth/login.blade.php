@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-slate-50">
    <div class="sm:mx-auto w-full max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-slate-900 tracking-tight">
            Connexion à <span class="text-amber-600">RAHBA</span>
        </h2>
        <div class="mt-2 text-center text-sm text-slate-600 flex justify-center gap-2">
            <span>Nouveau sur le marché ?</span>
            <div class="flex gap-1.5">
                <a href="{{ route('register.client') }}" class="font-semibold text-amber-600 hover:text-amber-500 transition">Client</a>
                <span class="text-slate-300">|</span>
                <a href="{{ route('register.vendor') }}" class="font-semibold text-amber-600 hover:text-amber-500 transition">Vendeur</a>
            </div>
        </div>
    </div>

    <div class="mt-8 sm:mx-auto w-full max-w-md">
        <div class="bg-white py-8 px-4 shadow-sm border border-slate-100 rounded-2xl sm:px-10">
            <form class="space-y-6" action="{{ route('login.store') }}" method="POST">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">Adresse email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('email') border-rose-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-hidden text-sm transition-all">
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-xs text-rose-600 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">Mot de passe</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('password') border-rose-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-hidden text-sm transition-all">
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-xs text-rose-600 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" 
                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-slate-300 rounded-sm">
                        <label for="remember_me" class="ml-2 block text-sm text-slate-700 select-none">
                            Se souvenir de moi
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-amber-600 hover:text-amber-500 transition">
                            Mot de passe oublié ?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-xs text-sm font-bold text-white bg-amber-600 hover:bg-amber-700 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition cursor-pointer">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection