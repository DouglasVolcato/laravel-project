@extends('components.main')

@section('title', 'Card Collection')

@section('content')
    <div class="flex flex-wrap justify-evenly bg-black-300 w-full" id="card-container">
        @php
            $index = 0;
        @endphp
        @if (isset($cards) && $cards != '' && count($cards) > 0)
            @foreach ($cards as $card)
                @php
                    $index++;
                @endphp
                <div class="bg-white rounded-lg shadow-lg p-4 max-w-fit m-5 hover:bg-yellow-100">
                    <h1 class="text-gray-600 font-bold text-center">{{ $card->name }}</h1>
                    <p class="text-gray-600 text-center">Type: {{ $card->type }}</p>
                    <p class="text-gray-600 text-center">Mana cost: {{ $card->cmc }}</p>
                    <p class="text-gray-600 text-center">Rarity: {{ $card->rarity }}</p>
                    <p class="text-gray-600 text-center">Power: {{ $card->power }}</p>
                    <p class="text-gray-600 text-center">Toughness: {{ $card->toughness }}</p>
                    <p class="text-gray-600 text-center">Owned quantity: {{ $card->quantity }}</p>
                    <p class="text-gray-600 text-center mt-2 mb-2">Colors:
                        @foreach ($card->colors as $color)
                            <span
                                class="bg-{{ $color }}-500 text-black font-bold px-2 py-1 rounded border border-{{ $color }}-700">{{ $color }}</span>
                        @endforeach
                    </p>
                    <p class="text-gray-600 text-center">Utility:
                        @foreach ($card->utility as $utility)
                            <span class="bg-gray-500 text-white px-2 py-1 rounded">{{ $utility }}</span>
                        @endforeach
                    </p>
                    <div class="w-full flex justify-center">
                        <a href="{{ route('removeCard', ['id' => $index]) }}"
                            class="px-2 pr-3 pl-3 py-2 mt-3 ml-auto mr-auto font-bold bg-red-700 text-white rounded hover:bg-red-400">
                            Remove
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
