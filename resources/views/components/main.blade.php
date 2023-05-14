<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="icons\header\cards.svg">

        <title>@yield('title')</title>

        @vite('resources/css/app.css')
    </head>

    @component('components.navbar')
    @endcomponent

    <body class="antialiased bg-blue-600 pt-10 pb-10 content">
        @yield('content')
    </body>

    @component('components.footer')
    @endcomponent

</html>
