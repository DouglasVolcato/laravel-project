@extends('components.main')

@section('title', 'Add Card')

@section('content')
    <form class="flex flex-wrap justify-center bg-black-300 w-2/4 m-auto p-5 rounded bg-green-600 mt-3 mb-3"
        action="{{ isset($card) ? (isset($card->quantity) ? route('cardEdition') : route('cardRegistration')) : route('cardRegistration') }}"
        method="POST">
        @if (isset($card) && isset($card->quantity))
            <input type="hidden" name="_method" value="PATCH">
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Name:</p>
            <input required value="{{ isset($card) ? $card['name'] ?? '' : '' }}" name='name'
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-300 text-gray-800 rounded" type="text"
                placeholder="name">
        </div>
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Type:</p>
            <input required value="{{ isset($card) ? $card['type'] ?? '' : '' }}" name='type'
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-300 text-gray-800 rounded" type="text"
                placeholder="type">
        </div>
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Mana cost:</p>
            <input required value="{{ isset($card) ? $card['cmc'] ?? '' : '' }}" name='cmc'
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-300 text-gray-800 rounded" type="number"
                placeholder="mana cost">
        </div>
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Rarity:</p>
            <input required value="{{ isset($card) ? $card['rarity'] ?? '' : '' }}" name='rarity'
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-300 text-gray-800 rounded" type="text"
                placeholder="rarity">
        </div>
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Power:</p>
            <input required value="{{ isset($card) ? $card['power'] ?? '' : '' }}" name='power'
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-300 text-gray-800 rounded" type="number"
                placeholder="power">
        </div>
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Toughness:</p>
            <input required value="{{ isset($card) ? $card['toughness'] ?? '' : '' }}" name='toughness'
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-300 text-gray-800 rounded" type="number"
                placeholder="toughness">
        </div>
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Image url:</p>
            <input value="{{ isset($card) ? $card['imageUrl'] ?? '' : '' }}" name='imageUrl'
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-300 text-gray-800 rounded" type="text"
                placeholder="image url">
        </div>
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Owned quantity:</p>
            <input required value="{{ isset($card->quantity) ? $card->quantity ?? '' : '' }}" name='quantity'
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-300 text-gray-800 rounded" type="number"
                placeholder="owned quantity">
        </div>
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Utilities:</p>
            <div class="flex flex-wrap items-center m-1">
                <tr>
                    <td>
                        <label for="utilities-none" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-none" name="utilities[]" type="checkbox" value="none" class="mr-1"
                                @php echo isset($card->utilities) && in_array('none', $card->utilities) ? 'checked' : ''; @endphp>
                            None
                        </label>
                    </td>
                    <td>
                        <label for="utilities-ramp" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-ramp" name="utilities[]" type="checkbox" value="ramp" class="mr-1"
                                @php echo isset($card->utilities) && in_array('ramp', $card->utilities) ? 'checked' : ''; @endphp>
                            Ramp
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utilities-draw" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-draw" name="utilities[]" type="checkbox" value="draw" class="mr-1"
                                @php echo isset($card->utilities) && in_array('draw', $card->utilities) ? 'checked' : ''; @endphp>
                            Draw
                        </label>
                    </td>
                    <td>
                        <label for="utilities-burn" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-burn" name="utilities[]" type="checkbox" value="burn" class="mr-1"
                                @php echo isset($card->utilities) && in_array('burn', $card->utilities) ? 'checked' : ''; @endphp>
                            Burn
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utilities-discard" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-discard" name="utilities[]" type="checkbox" value="discard"
                                class="mr-1"
                                @php echo isset($card->utilities) && in_array('discard', $card->utilities) ? 'checked' : ''; @endphp>
                            Discard
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utilities-lifegain" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-lifegain" name="utilities[]" type="checkbox" value="lifegain"
                                class="mr-1"
                                @php echo isset($card->utilities) && in_array('lifegain', $card->utilities) ? 'checked' : ''; @endphp>
                            Lifegain
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utilities-removal" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-removal" name="utilities[]" type="checkbox" value="removal"
                                class="mr-1"
                                @php echo isset($card->utilities) && in_array('removal', $card->utilities) ? 'checked' : ''; @endphp>
                            Removal
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utilities-tutoring" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-tutoring" name="utilities[]" type="checkbox" value="tutoring"
                                class="mr-1"
                                @php echo isset($card->utilities) && in_array('tutoring', $card->utilities) ? 'checked' : ''; @endphp>
                            Tutoring
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utilities-recursion" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-recursion" name="utilities[]" type="checkbox" value="recursion"
                                class="mr-1"
                                @php echo isset($card->utilities) && in_array('recursion', $card->utilities) ? 'checked' : ''; @endphp>
                            Recursion
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utilities-counterspell" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-counterspell" name="utilities[]" type="checkbox" value="counterspell"
                                class="mr-1"
                                @php echo isset($card->utilities) && in_array('counterspell', $card->utilities) ? 'checked' : ''; @endphp>
                            Counterspell
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utilities-tokenGeneration" class="mr-1 text-gray-500 p-1">
                            <input id="utilities-tokenGeneration" name="utilities[]" type="checkbox"
                                value="tokenGeneration" class="mr-1"
                                @php echo isset($card->utilities) && in_array('tokenGeneration', $card->utilities) ? 'checked' : ''; @endphp>
                            Token Generation
                        </label>
                    </td>
                </tr>
            </div>
        </div>

        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded ">
            <p class="mr-2 font-bold text-gray-500 text-center">Colors:</p>
            <table class="flex flex-wrap items-center m-1">
                <tr>
                    <td>
                        <label for="color-white" class="mr-1  text-gray-500 p-1">
                            <input
                                @php echo isset($card->colors) && (in_array('W', $card->colors) || in_array('white', $card->colors)) ? 'checked' : ''; @endphp
                                id="color-white" name="colors[]" type="checkbox" value="white" class="mr-1">
                            White
                        </label>
                    </td>
                    <td>
                        <label for="color-black" class="mr-1 text-gray-500 p-1">
                            <input
                                @php echo isset($card->colors) && (in_array('B', $card->colors) || in_array('black', $card->colors)) ? 'checked' : ''; @endphp
                                id="color-black" name="colors[]" type="checkbox" value="black" class="mr-1">
                            Black
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="color-blue" class="mr-1 text-gray-500 p-1">
                            <input
                                @php echo isset($card->colors) && (in_array('U', $card->colors) || in_array('blue', $card->colors)) ? 'checked' : ''; @endphp
                                id="color-blue" name="colors[]" type="checkbox" value="blue" class="mr-1">
                            Blue
                        </label>
                    </td>
                    <td>
                        <label for="color-green" class="mr-1 text-gray-500 p-1">
                            <input
                                @php echo isset($card->colors) && (in_array('G', $card->colors) || in_array('green', $card->colors)) ? 'checked' : ''; @endphp
                                id="color-green" name="colors[]" type="checkbox" value="green" class="mr-1">
                            Green
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="color-red" class="mr-1 text-gray-500 p-1">
                            <input
                                @php echo isset($card->colors) && (in_array('R', $card->colors) || in_array('red', $card->colors)) ? 'checked' : ''; @endphp
                                id="color-red" name="colors[]" type="checkbox" value="red" class="mr-1">
                            Red
                        </label>
                    </td>
                    <td>
                        <label for="color-null" class=" text-gray-500 p-1">
                            <input @php echo !isset($card->colors) ? 'checked' : ''; @endphp id="color-null"
                                name="colors[]" type="checkbox" value="null" class="mr-1">
                            Null
                        </label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="w-full flex justify-center">
            <button
                class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-200 text-gray-800 rounded hover:bg-blue-300 hover:scale-105"
                type="submit">Send</button>
        </div>
    </form>
@endsection
