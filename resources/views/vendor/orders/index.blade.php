@extends('layouts.app')

@section('title', 'Commandes Recues - RAHBA')

@section('content')
<div class="flex min-h-screen bg-slate-50/50">
    @include('components.vendor-sidebar')

    <div class="flex-1 p-8">
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Commandes Recues</h1>
                <p class="text-sm text-slate-500 mt-1">Commandes contenant vos produits.</p>
            </div>
            <form method="GET" action="{{ route('vendor.orders.index') }}">
                <select onchange="if(this.value) window.location='{{ url('/vendor/orders/filter') }}/'+this.value; else window.location='{{ route('vendor.orders.index') }}'" class="text-xs font-bold bg-white border border-slate-200 rounded-xl px-4 py-3 shadow-xs outline-hidden">
                    <option value="">Tous les statuts</option>
                    @foreach(['pending', 'processing', 'delivered', 'cancelled'] as $itemStatus)
                        <option value="{{ $itemStatus }}" @selected(($status ?? '') === $itemStatus)>{{ $itemStatus }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="bg-white rounded-2xl border border-slate-100 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <th class="py-4 px-6">Commande</th>
                            <th class="py-4 px-6">Client</th>
                            <th class="py-4 px-6">Date</th>
                            <th class="py-4 px-6">Montant vendeur</th>
                            <th class="py-4 px-6">Statut</th>
                            <th class="py-4 px-6 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($orders as $order)
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="py-4 px-6 font-bold text-slate-900">{{ $order->order_number }}</td>
                                <td class="py-4 px-6 text-slate-600">{{ $order->user->name ?? '-' }}</td>
                                <td class="py-4 px-6 text-slate-500">{{ $order->created_at->format('d/m/Y') }}</td>
                                <td class="py-4 px-6 font-semibold text-slate-900">{{ number_format($order->items->where('product.user_id', auth()->id())->sum('subtotal'), 2) }} DH</td>
                                <td class="py-4 px-6"><span class="inline-flex px-2.5 py-1 bg-amber-50 text-amber-700 rounded-full font-bold text-xs">{{ $order->status }}</span></td>
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('vendor.orders.show', $order->id) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 hover:bg-amber-600 hover:text-white text-slate-700 rounded-lg text-xs font-bold transition">
                                        Gerer <i class="fa-solid fa-angle-right text-[10px]"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="py-12 text-center text-sm text-slate-500">Aucune commande recue.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">{{ $orders->links() }}</div>
    </div>
</div>
@endsection
