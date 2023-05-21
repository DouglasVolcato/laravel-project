@extends('components.main')

@section('title', 'Card Collection')

@section('content')
    <div class="flex flex-wrap justify-evenly bg-black-300 w-full" id="card-container">
        @php
            $index = 0;
        @endphp
        @if (isset($cards) && $cards != '' && count($cards) > 0)
            @foreach ($cards as $card)
                <div
                    class="bg-green-400 rounded-lg p-4 max-w-fit m-5 hover:bg-green-300 flex flex-wrap h-fit justify-center shadow-2xl">
                    <div class="w-60">
                        <img src="{{ $card->imageUrl }}" alt="{{ $card->name }}" class="rounded object-cover mb-4 w-64">
                    </div>
                    <div class="w-60">
                        <div class="p-1 m-1 ml-3 rounded bg-white overflow-y-auto h-72">
                            <h1 class="text-gray-600 font-bold text-center">{{ $card->name }}</h1>
                            <p class="text-gray-600 text-center">Type: {{ $card->type }}</p>
                            <p class="text-gray-600 text-center">Mana cost: {{ $card->cmc }}</p>
                            <p class="text-gray-600 text-center">Rarity: {{ $card->rarity }}</p>
                            <p class="text-gray-600 text-center">Power: {{ $card->power }}</p>
                            <p class="text-gray-600 text-center">Toughness: {{ $card->toughness }}</p>
                            <p class="text-gray-600 text-center">Owned quantity: {{ $card->quantity }}</p>
                            <p class="text-gray-600 text-center mt-2 mb-2 font-bold">Colors:
                            <div class="flex flex-wrap w-52 m-auto justify-center">
                                @foreach ($card->colors as $color)
                                    <div
                                        class="bg-white-500 text-black font-bold px-2 py-1 m-1 rounded border border-gray-700">
                                        {{ $color }}</div>
                                @endforeach
                            </div>
                            </p>
                            @if (isset($card->utilities) && count($card->utilities) > 0)
                                <p class="text-gray-600 text-center font-bold">Utilities:
                                <div class="flex flex-wrap w-52 m-auto justify-center">
                                    @foreach ($card->utilities as $utilities)
                                        @if (trim($utilities) !== '')
                                            <div class="bg-gray-500 text-white px-2 py-1 rounded m-1">{{ $utilities }}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </p>
                            @endif
                        </div>
                        <form class='w-full flex justify-center' action="{{ route('cardRegistrationViewParameters') }}"
                            method="POST">
                            <input type="hidden" name="index" value='{{ $index }}'>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="name" value='{{ $card->name }}'>
                            <input type="hidden" name="cmc" value='{{ $card->cmc }}'>
                            <input type="hidden" name="type" value='{{ $card->type }}'>
                            <input type="hidden" name="rarity" value='{{ $card->rarity }}'>
                            <input type="hidden" name="quantity" value='{{ $card->quantity }}'>
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
                                
                                if (property_exists($card, 'utilities') && isset($card->utilities)) {
                                    foreach ($card->utilities as $utility) {
                                        echo "<input type='hidden' name='utilities[]' value='{$utility}'>";
                                    }
                                }
                                
                                if (property_exists($card, 'imageUrl') && isset($card->imageUrl)) {
                                    echo "<input type='hidden' name='imageUrl' value='{$card->imageUrl}'>";
                                }
                            @endphp

                            <button type='submit'
                                class="px-2 pr-3 pl-3 py-2 m-1 mt-3 font-bold bg-green-700 text-white rounded hover:bg-green-400">
                                Edit </button>
                            <a href="{{ route('removeCard', ['index' => $index]) }}"
                                class="px-2 pr-3 pl-3 py-2 m-1 mt-3 font-bold bg-red-700 text-white rounded hover:bg-red-400">
                                Remove
                            </a>
                        </form>
                    </div>
                </div>
                @php
                    $index++;
                @endphp
            @endforeach
        @endif
    </div>
@endsection
