<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Review Corner') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('/css/main.css') }}">
        <link href="https://unpkg.com/tailwindcss@^1.9/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <livewire:styles />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.x/dist/alpine.min.js" defer></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans bg-gray-900 antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')


            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        <footer class="border border-t border-gray-800">
            <div class="container mx-auto text-sm px-4 py-6">
                
            </div>
        </footer>
        <livewire:scripts />
        <script>
            var msg = '{{Session::get('msg')}}';
            var exist = '{{Session::has('msg')}}';
            if(exist){
                alert(msg);
            }
        </script>
    </body>
</html>
