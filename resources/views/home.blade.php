@extends('components.main')

@section('title', 'Card search')

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

    <form class="flex flex-wrap justify-center bg-black-300 w-full mt-3 mb-3" action="{{ route('cardList') }}" method="GET">
        <input value="{{ request()['name'] ?? '' }}" name='name'
            class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-200 text-gray-800 rounded" type="text" placeholder="name">
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
                    <div class="w-full flex justify-center">
                        <form class='mt-3 ml-auto mr-auto' action="{{ route('cardRegistrationViewParameters') }}"
                            method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="name" value='{{ $card->name }}'>
                            <input type="hidden" name="cmc" value='{{ $card->cmc }}'>
                            <input type="hidden" name="type" value='{{ $card->type }}'>
                            <input type="hidden" name="rarity" value='{{ $card->rarity }}'>

                            @php
                                if (property_exists($card, 'power') && isset($card->power)) {
                                    echo "<input type='hidden' name='power' value='{$card->power}'>";
                                }
                                
                                if (property_exists($card, 'toughness') && isset($card->toughness)) {
                                    echo "<input type='hidden' name='toughness' value='{$card->toughness}'>";
                                }
                                
                                if (property_exists($card, 'colors') && isset($card->colors)) {
                                    foreach ($card->colors as $color) {
                                        echo "<input type='hidden' name='colors[]' value='{$color}'>";
                                    }
                                }
                                
                                if (property_exists($card, 'imageUrl') && isset($card->imageUrl)) {
                                    echo "<input type='hidden' name='imageUrl' value='{$card->imageUrl}'>";
                                }
                            @endphp

                            <button type='submit'
                                class="px-2 pr-3 pl-3 py-2 font-bold bg-green-400 text-gray-800 rounded hover:bg-green-500">
                                Add to collection </button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @if (strlen($urlParameters) == 0 && count($cards) > 0)
        <div class="pagination flex flex-wrap justify-center mt-8">
            @if ($page > 1)
                <a href="{{ route('cardList', 'page=' . $page - 1 . $urlParameters) }}"
                    class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-200 text-gray-800 rounded hover:bg-gray-300 hover:scale-105">
                    <img class="w-4 mt-auto mb-auto" src="icons\buttons\arrow-left.png" alt="left-arrow">
                </a>
            @endif
            <a class="px-4 py-2 m-1 font-bold bg-blue-600 text-white">{{ $page }}</a>
            <a href="{{ route('cardList', 'page=' . $page + 1 . $urlParameters) }}"
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-200 text-gray-800 rounded hover:bg-gray-300 hover:scale-105">
                <img class="w-4 mt-auto mb-auto" src="icons\buttons\arrow-right.png" alt="right-arrow">
            </a>
        </div>
    @endif

@endsection
