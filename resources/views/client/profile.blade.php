@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-amber-600">
                    {{ $user->role === 'vendor' ? 'Compte vendeur' : 'Compte client' }}
                </p>
                <h1 class="text-3xl font-black text-slate-900 mt-1">{{ $user->name }}</h1>
                <p class="text-sm text-slate-500 mt-1">{{ $user->email }}</p>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl border border-amber-100 overflow-hidden">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                @else
                    <i class="fa-solid {{ $user->role === 'vendor' ? 'fa-store' : 'fa-user' }}"></i>
                @endif
            </div>
        </div>
    </div>

    @if(session('status') === 'profile-updated')
        <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl text-sm font-semibold">
            Profil mis a jour.
        </div>
    @endif

    @if(session('status') === 'password-updated')
        <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl text-sm font-semibold">
            Mot de passe mis a jour.
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs h-fit">
            <h2 class="text-lg font-bold text-slate-900 mb-4">Informations</h2>
            <div class="space-y-3 text-sm">
                <p class="flex justify-between gap-4">
                    <span class="text-slate-500">Role</span>
                    <span class="font-bold text-slate-800">{{ $user->role === 'vendor' ? 'Vendeur' : 'Client' }}</span>
                </p>
                <p class="flex justify-between gap-4">
                    <span class="text-slate-500">Telephone</span>
                    <span class="font-bold text-slate-800">{{ $user->phone ?? '-' }}</span>
                </p>
                <p class="flex justify-between gap-4">
                    <span class="text-slate-500">Commandes</span>
                    <span class="font-bold text-slate-800">{{ $user->orders->count() }}</span>
                </p>
                @if($user->role === 'vendor')
                    <p class="flex justify-between gap-4">
                        <span class="text-slate-500">Boutique</span>
                        <span class="font-bold text-slate-800 text-right">{{ $user->shop_name ?? '-' }}</span>
                    </p>
                @endif
            </div>
        </aside>

        <section class="lg:col-span-2 space-y-8">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" x-data="{ photoName: '' }" class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5">
                @csrf
                @method('PATCH')
                <input type="hidden" name="role" value="{{ $user->role }}">

                <div>
                    <h2 class="text-lg font-bold text-slate-900">Modifier mes informations</h2>
                    <p class="text-sm text-slate-500 mt-1">Mettez a jour votre nom et vos coordonnees.</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Photo de profil</label>
                    <label class="flex items-center gap-4 p-4 bg-slate-50 border border-dashed border-slate-300 rounded-xl cursor-pointer hover:border-amber-400 hover:bg-amber-50/40 transition">
                        <span class="w-14 h-14 rounded-xl bg-white border border-slate-200 text-amber-600 flex items-center justify-center text-xl shrink-0 overflow-hidden">
                            @if($user->profile_photo)
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                            @else
                                <i class="fa-solid fa-camera"></i>
                            @endif
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-bold text-slate-800">Choisir un fichier</span>
                            <span class="block text-xs text-slate-500 truncate" x-text="photoName || 'Remplacer votre photo - JPG, PNG ou WEBP'"></span>
                        </span>
                        <input type="file" name="profile_photo" accept="image/jpeg,image/png,image/webp" class="hidden" x-on:change="photoName = $event.target.files[0]?.name || ''">
                    </label>
                    @error('profile_photo') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                    @error('name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                        @error('email') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Telephone</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                        @error('phone') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Adresse</label>
                    <textarea name="address" rows="3" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden resize-none">{{ old('address', $user->address) }}</textarea>
                    @error('address') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                @if($user->role === 'vendor')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-slate-100">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom de boutique</label>
                            <input type="text" name="shop_name" value="{{ old('shop_name', $user->shop_name) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                            @error('shop_name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Description boutique</label>
                            <textarea name="shop_description" rows="3" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden resize-none">{{ old('shop_description', $user->shop_description) }}</textarea>
                            @error('shop_description') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                @endif

                <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-5 rounded-xl transition cursor-pointer">
                    Enregistrer
                </button>
            </form>

            <form action="{{ route('profile.password.update') }}" method="POST" class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <h2 class="text-lg font-bold text-slate-900">Changer le mot de passe</h2>
                    <p class="text-sm text-slate-500 mt-1">Utilisez un mot de passe fort pour proteger votre compte.</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Mot de passe actuel</label>
                    <input type="password" name="current_password" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                    @error('current_password') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nouveau mot de passe</label>
                        <input type="password" name="password" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                        @error('password') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Confirmer</label>
                        <input type="password" name="password_confirmation" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                    </div>
                </div>

                <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 px-5 rounded-xl transition cursor-pointer">
                    Modifier le mot de passe
                </button>
            </form>
        </section>
    </div>
</div>
@endsection
