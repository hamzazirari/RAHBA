@extends('layouts.app')

@section('title', 'Gestion Commande - RAHBA')

@section('content')
<div class="flex min-h-screen bg-slate-50/50">
    @include('components.vendor-sidebar')

    <div class="flex-1 p-8 max-w-5xl">
        <div class="mb-8">
            <a href="{{ route('vendor.orders.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-amber-600 transition">
                <i class="fa-solid fa-arrow-left text-xs"></i> Retour aux commandes
            </a>
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mt-3">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">Commande {{ $order->order_number }}</h1>
                    <p class="text-xs text-slate-400 mt-0.5">Recue le {{ $order->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <form action="{{ route('vendor.orders.update-status', $order->id) }}" method="POST" class="flex items-center gap-2 bg-white p-2 rounded-xl border border-slate-200 shadow-xs">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="text-xs font-bold bg-slate-50 border border-slate-100 rounded-lg px-3 py-2 outline-hidden">
                        @foreach(['pending', 'processing', 'delivered', 'cancelled'] as $status)
                            <option value="{{ $status }}" @selected($order->status === $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-3 py-2 bg-amber-600 hover:bg-amber-700 text-white rounded-lg text-xs font-bold transition cursor-pointer">
                        Mettre a jour
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl text-sm font-semibold">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
                    <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-50 pb-4 mb-4">Vos articles</h2>
                    <div class="divide-y divide-slate-100">
                        @foreach($vendorItems as $item)
                            <div class="flex items-center justify-between py-4 first:pt-0 last:pb-0">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $item->product->image_url ? asset($item->product->image_url) : 'https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=100' }}" class="w-12 h-12 rounded-lg object-cover border bg-slate-50">
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-800">{{ $item->product->name }}</h4>
                                        <p class="text-xs text-slate-400 mt-0.5">Quantite : {{ $item->quantity }}</p>
                                    </div>
                                </div>
                                <span class="text-sm font-black text-slate-900">{{ number_format($item->subtotal, 2) }} DH</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-4 h-fit">
                <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-50 pb-3">Client & Livraison</h2>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase">Nom complet</p>
                    <p class="text-sm font-semibold text-slate-800 mt-0.5">{{ $order->user->name }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase">Telephone</p>
                    <p class="text-sm text-slate-600 mt-0.5">{{ $order->user->phone ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase">Adresse</p>
                    <p class="text-sm text-slate-600 mt-0.5 leading-relaxed">{{ $order->delivery_address }}</p>
                </div>
                <div class="pt-2 border-t border-slate-50 flex justify-between items-center">
                    <span class="text-xs font-bold text-slate-400 uppercase">Total vendeur</span>
                    <span class="text-base font-black text-amber-600">{{ number_format($vendorItems->sum('subtotal'), 2) }} DH</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
