@extends('layouts.app')

@section('title', 'Inscription Vendeur')

@section('content')
<div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-slate-50">
    <div class="sm:mx-auto w-full max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-slate-900 tracking-tight">
            Devenir <span class="text-amber-600">Vendeur</span> sur Rahba
        </h2>
        <p class="mt-2 text-center text-sm text-slate-600">
            Ou 
            <a href="{{ route('login') }}" class="font-semibold text-amber-600 hover:text-amber-500 transition">
                Se connecter
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto w-full max-w-md">
        <div class="bg-white py-8 px-4 shadow-sm border border-slate-100 rounded-2xl sm:px-10">
            <form class="space-y-6" action="{{ route('register.vendor.store') }}" method="POST">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700">Nom complet du responsable</label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required 
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('name') border-rose-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-hidden text-sm transition-all">
                    </div>
                    @error('name')
                        <p class="mt-1.5 text-xs text-rose-600 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="shopName" class="block text-sm font-medium text-slate-700">Nom de la boutique</label>
                    <div class="mt-1">
                        <input id="shopName" name="shopName" type="text" value="{{ old('shopName') }}" required 
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('shopName') border-rose-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-hidden text-sm transition-all">
                    </div>
                    @error('shopName')
                        <p class="mt-1.5 text-xs text-rose-600 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">Adresse email professionnelle</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required 
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('email') border-rose-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-hidden text-sm transition-all">
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-xs text-rose-600 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-slate-700">Numéro de téléphone</label>
                    <div class="mt-1">
                        <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" required 
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('phone') border-rose-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-hidden text-sm transition-all">
                    </div>
                    @error('phone')
                        <p class="mt-1.5 text-xs text-rose-600 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">Mot de passe</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required 
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('password') border-rose-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-hidden text-sm transition-all">
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-xs text-rose-600 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirmer le mot de passe</label>
                    <div class="mt-1">
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-hidden text-sm transition-all">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-xs text-sm font-bold text-white bg-amber-600 hover:bg-amber-700 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition cursor-pointer">
                        Créer ma boutique
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection