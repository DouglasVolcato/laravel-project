<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="icons\header\cards.svg">

    <title>@yield('title')</title>

    @vite('resources/css/app.css')
</head>

@component('components.header')
@endcomponent

<body class="antialiased bg-blue-600 pt-20 pb-20 content">
    <h1 class="text-3xl m-auto w-fit font-bold">@yield('title'):</h1>
    @yield('content')
</body>

@component('components.footer')
@endcomponent

</html>
