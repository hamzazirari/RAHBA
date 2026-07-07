<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RAHBA MARKETPLACE')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="flex flex-col h-full font-sans text-slate-800 antialiased">

    @include('layouts.partials.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('layouts.partials.footer')

</body>
</html>