<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            {{-- Header affiché uniquement si ce n'est pas login ou register --}}
            @unless(request()->routeIs('login') || request()->routeIs('register'))
                @auth
                    @if(auth()->user()->role === 'vendor')
                        @include('layouts.partials.vendor-header')
                    @else
                        @include('layouts.partials.header')
                    @endif
                @else
                    @include('layouts.partials.header')
                @endauth
            @endunless

            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            @if(session('success') || session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
                    @if(session('success'))
                        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl text-sm font-semibold">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-rose-50 border border-rose-100 text-rose-700 px-4 py-3 rounded-xl text-sm font-semibold">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            @endif

            <main>
                @yield('content')
            </main>

            {{-- Footer affiché uniquement si ce n'est pas login ou register --}}
            @unless(request()->routeIs('login') || request()->routeIs('register'))
                @include('layouts.partials.footer')
            @endunless
        </div>
    </body>
</html>
