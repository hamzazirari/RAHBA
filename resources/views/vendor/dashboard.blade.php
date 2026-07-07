@extends('layouts.app')

@section('title', 'Tableau de bord Vendeur - RAHBA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Ma Boutique</h1>
            <p class="text-sm text-slate-500 mt-1">Suivez vos produits, commandes et revenus.</p>
        </div>
        <a href="{{ route('vendor.products.create') }}" class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-5 rounded-xl transition shadow-xs text-sm cursor-pointer">
            <i class="fa-solid fa-plus text-xs"></i> Ajouter un produit
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Revenus</span>
            <span class="block text-2xl font-black text-slate-900 mt-1">{{ number_format($stats['revenue_total'] ?? 0, 2) }} DH</span>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Commandes</span>
            <span class="block text-2xl font-black text-slate-900 mt-1">{{ $stats['orders_count'] ?? 0 }}</span>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Produits</span>
            <span class="block text-2xl font-black text-slate-900 mt-1">{{ $stats['products_count'] ?? 0 }}</span>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Avis</span>
            <span class="block text-2xl font-black text-slate-900 mt-1">{{ number_format($stats['average_rating'] ?? 0, 1) }} <span class="text-xs font-medium text-slate-400">/5</span></span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-xs overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center">
                <h2 class="font-bold text-slate-900 text-base">Dernieres commandes</h2>
                <a href="{{ route('vendor.orders.index') }}" class="text-xs font-bold text-amber-600 hover:underline">Voir tout</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 text-xs font-bold uppercase tracking-wider">
                            <th class="py-3 px-6">Commande</th>
                            <th class="py-3 px-6">Client</th>
                            <th class="py-3 px-6">Total</th>
                            <th class="py-3 px-6">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                        @forelse($recentOrders as $order)
                            <tr>
                                <td class="py-4 px-6 font-bold text-slate-900">
                                    <a href="{{ route('vendor.orders.show', $order->id) }}" class="hover:text-amber-600">{{ $order->order_number }}</a>
                                </td>
                                <td class="py-4 px-6">{{ $order->user->name ?? '-' }}</td>
                                <td class="py-4 px-6 font-black">{{ number_format($order->items->where('product.user_id', auth()->id())->sum('subtotal'), 2) }} DH</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-0.5 bg-amber-50 text-amber-700 rounded-full text-xs font-bold">{{ $order->status }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="py-10 text-center text-sm text-slate-500">Aucune commande recue.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs space-y-3">
            <h2 class="font-bold text-slate-900 text-base border-b border-slate-100 pb-3 mb-4">Top produits</h2>
            @forelse($topProducts as $product)
                <div class="flex items-center justify-between p-3.5 bg-slate-50 rounded-xl">
                    <span class="text-sm font-bold text-slate-700 truncate">{{ $product->name }}</span>
                    <span class="text-xs font-black text-amber-600">{{ $product->sold_quantity }} vendus</span>
                </div>
            @empty
                <p class="text-sm text-slate-500">Aucune vente pour le moment.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
