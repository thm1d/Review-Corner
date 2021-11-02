<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">

        <title>{{ config('app.name', 'Review Corner') }}</title>
        
        
        <link rel="stylesheet" href="{{ URL::asset('/css/main.css') }}">
        <link href="https://unpkg.com/tailwindcss@^1.9/dist/tailwind.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.x/dist/alpine.min.js" defer></script>
    </head>
    <body>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            @include('layouts.superadmin.sidebar')
            
            <div class="flex-1 flex flex-col overflow-hidden">
                @include('layouts.superadmin.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        @yield('body')
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
