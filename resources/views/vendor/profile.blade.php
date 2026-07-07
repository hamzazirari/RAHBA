@extends('layouts.app')

@section('title', 'Profil Boutique - RAHBA')

@section('content')
<div class="flex min-h-screen bg-slate-50/50">
    @include('components.vendor-sidebar')

    <div class="flex-1 p-8 max-w-5xl">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Profil de la Boutique</h1>
            <p class="text-sm text-slate-500 mt-1">Configurez votre vitrine publique et votre compte vendeur.</p>
        </div>

        @if(session('status') === 'profile-updated')
            <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl text-sm font-semibold">Profil mis a jour.</div>
        @endif
        @if(session('status') === 'password-updated')
            <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl text-sm font-semibold">Mot de passe mis a jour.</div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <section class="lg:col-span-2 space-y-6">
                <form action="{{ route('vendor.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5">
                    @csrf
                    @method('PATCH')

                    <h3 class="text-base font-bold text-slate-900 border-b border-slate-50 pb-3">Details de la vitrine</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom</label>
                            <input type="text" name="name" value="{{ old('name', $vendor->name) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                            @error('name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email', $vendor->email) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                            @error('email') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Telephone</label>
                            <input type="text" name="phone" value="{{ old('phone', $vendor->phone) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                            @error('phone') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Photo</label>
                            <input type="file" name="profile_photo" accept="image/jpeg,image/png,image/webp" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm">
                            @error('profile_photo') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Adresse</label>
                        <textarea name="address" rows="2" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden resize-none">{{ old('address', $vendor->address) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom de la boutique</label>
                        <input type="text" name="shop_name" value="{{ old('shop_name', $vendor->shop_name) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                        @error('shop_name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Description boutique</label>
                        <textarea name="shop_description" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden resize-none">{{ old('shop_description', $vendor->shop_description) }}</textarea>
                        @error('shop_description') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button class="px-5 py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl text-xs transition cursor-pointer">
                        Mettre a jour la boutique
                    </button>
                </form>

                <form action="{{ route('vendor.profile.password.update') }}" method="POST" class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5">
                    @csrf
                    @method('PATCH')
                    <h3 class="text-base font-bold text-slate-900 border-b border-slate-50 pb-3">Changer le mot de passe</h3>

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
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Confirmation</label>
                            <input type="password" name="password_confirmation" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                        </div>
                    </div>

                    <button class="px-5 py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-xs transition cursor-pointer">
                        Modifier le mot de passe
                    </button>
                </form>
            </section>

            <aside class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-5 h-fit text-center">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Avis boutique</h3>
                <div class="py-4">
                    <span class="block text-4xl font-black text-slate-900">{{ number_format($stats['average_rating'] ?? 0, 1) }}</span>
                    <div class="flex items-center justify-center gap-1 text-amber-400 my-2">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fa-solid fa-star {{ $i <= round($stats['average_rating'] ?? 0) ? '' : 'text-slate-200' }}"></i>
                        @endfor
                    </div>
                    <span class="text-xs text-slate-400 font-semibold">{{ $stats['reviews_count'] ?? 0 }} avis clients</span>
                </div>
                <div class="border-t border-slate-100 pt-4 text-sm">
                    <span class="block text-slate-400 font-bold uppercase text-xs">Produits</span>
                    <span class="block text-2xl font-black text-slate-900 mt-1">{{ $stats['products_count'] ?? 0 }}</span>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
