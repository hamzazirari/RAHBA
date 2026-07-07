@extends('layouts.app')

@section('title', 'Validation de la commande')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-8">Validation de votre commande</h1>

    <div class="lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-start">
        <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST" class="lg:col-span-7 space-y-6">
            @csrf

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-6">
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2 pb-4 border-b border-slate-100">
                    <i class="fa-solid fa-truck text-amber-600 text-lg"></i> Informations de livraison
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nom complet</label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Telephone</label>
                        <input type="tel" name="phone" value="{{ old('phone', auth()->user()->phone) }}" required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="sm:col-span-1">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Ville</label>
                        <select name="city" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                            <option value="Safi">Safi</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Rabat">Rabat</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Adresse exacte</label>
                        <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}" required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 transition outline-hidden">
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-4">
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2 pb-4 border-b border-slate-100">
                    <i class="fa-solid fa-credit-card text-amber-600 text-lg"></i> Mode de paiement
                </h2>

                <label class="flex items-start gap-4 p-4 bg-amber-50/50 border border-amber-200 rounded-xl cursor-pointer select-none">
                    <input type="radio" name="payment_method" value="cod" checked class="mt-1 text-amber-600 focus:ring-amber-500">
                    <div>
                        <span class="block text-sm font-bold text-slate-900">Paiement a la livraison</span>
                        <span class="block text-xs text-slate-500 mt-0.5">Payez en especes a la reception.</span>
                    </div>
                </label>
            </div>
        </form>

        <section class="lg:col-span-5 mt-8 lg:mt-0 bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
            <h2 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-4 mb-4">Recapitulatif</h2>

            <div class="space-y-3 max-h-60 overflow-y-auto pr-2 mb-4">
                @forelse($cartItems as $item)
                    <div class="flex items-center gap-3 py-1">
                        <img src="{{ $item->product->image_src }}" class="w-12 h-12 rounded-lg object-cover bg-slate-50 border">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs font-bold text-slate-800 truncate">{{ $item->product->name }}</h4>
                            <span class="text-[11px] text-slate-400">Quantite: {{ $item->quantity }}</span>
                        </div>
                        <span class="text-xs font-black text-slate-900">{{ number_format($item->quantity * $item->product->price, 2) }} DH</span>
                    </div>
                @empty
                    <p class="text-sm text-slate-500">Votre panier est vide.</p>
                @endforelse
            </div>

            <div class="space-y-3 text-sm border-t border-slate-100 pt-4">
                <div class="flex justify-between text-slate-600">
                    <span>Sous-total</span>
                    <span class="font-semibold text-slate-900">{{ number_format($totalAmount ?? 0, 2) }} DH</span>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>Frais de livraison</span>
                    <span class="text-emerald-600 font-bold">Gratuit</span>
                </div>
                <div class="border-t border-slate-100 pt-4 flex justify-between text-base font-black text-slate-900">
                    <span>Total a payer</span>
                    <span class="text-xl text-amber-600">{{ number_format($totalAmount ?? 0, 2) }} DH</span>
                </div>
            </div>

            <button type="submit" form="checkout-form" class="w-full mt-6 bg-amber-600 hover:bg-amber-700 text-white font-bold py-3.5 px-4 rounded-xl transition shadow-xs cursor-pointer text-center">
                <i class="fa-solid fa-circle-check mr-2"></i> Confirmer ma commande
            </button>
        </section>
    </div>
</div>
@endsection
