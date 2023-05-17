@extends('components.main')

@section('title', 'Card list')

@section('content')
    @php
        $urlParameters = '';
        $page = '';
        
        foreach (request()->query as $key => $value) {
            if ($key != 'page') {
                $urlParameters .= "&{$key}={$value}";
            } else {
                $page = $value;
            }
        }
        
        $page = isset($page) && $page != '' ? $page : 1;
    @endphp

    <form class="flex flex-wrap justify-center bg-black-300 w-full mt-3 mb-3" action="{{ route('cards') }}" method="GET">
        <input name='name' class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-200 text-gray-800 rounded" type="text"
            placeholder="name">
        <button
            class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-200 text-gray-800 rounded hover:bg-green-400 hover:scale-105"
            type="submit">Search</button>
    </form>

    <div class="flex flex-wrap justify-evenly bg-black-300 w-full" id="card-container">
        @foreach ($cards as $card)
            @if (isset($card->imageUrl))
                <div class="bg-white rounded-lg shadow-lg p-4 max-w-fit m-5 hover:bg-yellow-100">
                    <img src="{{ $card->imageUrl }}" alt="{{ $card->name }}" class="w-150 h-200 object-cover mb-4">
                    <h1 class="text-gray-600 font-bold text-center">{{ $card->name }}</h1>
                    <p class="text-gray-600 text-center">{{ $card->type }}</p>
                </div>
            @endif
        @endforeach
    </div>

    @if (strlen($urlParameters) == 0 && count($cards) > 0)
        <div class="pagination flex flex-wrap justify-center mt-8">
            @if ($page > 1)
                <a href="{{ route('cards', 'page=' . $page - 1 . $urlParameters) }}"
                    class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-200 text-gray-800 rounded hover:bg-gray-300 hover:scale-105">
                    <img class="w-4 mt-auto mb-auto" src="icons\buttons\arrow-left.png" alt="left-arrow">
                </a>
            @endif
            <a class="px-4 py-2 m-1 font-bold bg-blue-600 text-white">{{ $page }}</a>
            <a href="{{ route('cards', 'page=' . $page + 1 . $urlParameters) }}"
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-200 text-gray-800 rounded hover:bg-gray-300 hover:scale-105">
                <img class="w-4 mt-auto mb-auto" src="icons\buttons\arrow-right.png" alt="right-arrow">
            </a>
        </div>
    @endif

@endsection
