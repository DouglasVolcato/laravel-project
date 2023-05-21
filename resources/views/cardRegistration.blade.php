@extends('components.main')

@section('title', 'Add Card')

@section('content')
    <form class="flex flex-wrap justify-center bg-black-300 w-2/4 m-auto p-5 rounded bg-green-600 mt-3 mb-3"
        action="{{ route('cardRegistration') }}" method="GET">
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
            <p class="mr-2 font-bold text-gray-500 text-center">Owned quantity:</p>
            <input required name='quantity' class="px-2 pr-3 pl-3 py-2 m-1 font-bold bg-gray-300 text-gray-800 rounded"
                type="number" placeholder="owned quantity">
        </div>
        <div class="w-50 m-2 bg-gray-200 p-2 mt-1 mb-1 rounded flex flex-col">
            <p class="mr-2 font-bold text-gray-500 text-center">Utility:</p>
            <div class="flex flex-wrap items-center m-1">
                <tr>
                    <td>
                        <label for="utility-none" class="mr-1 text-gray-500 p-1">
                            <input id="utility-none" name="utility[]" type="checkbox" value="none" class="mr-1">
                            None
                        </label>
                    </td>
                    <td>
                        <label for="utility-ramp" class="mr-1 text-gray-500 p-1">
                            <input id="utility-ramp" name="utility[]" type="checkbox" value="ramp" class="mr-1">
                            Ramp
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utility-draw" class="mr-1 text-gray-500 p-1">
                            <input id="utility-draw" name="utility[]" type="checkbox" value="draw" class="mr-1">
                            Draw
                        </label>
                    </td>
                    <td>
                        <label for="utility-burn" class="mr-1 text-gray-500 p-1">
                            <input id="utility-burn" name="utility[]" type="checkbox" value="burn" class="mr-1">
                            Burn
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utility-discard" class="mr-1 text-gray-500 p-1">
                            <input id="utility-discard" name="utility[]" type="checkbox" value="discard" class="mr-1">
                            Discard
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utility-lifegain" class="mr-1 text-gray-500 p-1">
                            <input id="utility-lifegain" name="utility[]" type="checkbox" value="lifegain" class="mr-1">
                            Lifegain
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utility-removal" class="mr-1 text-gray-500 p-1">
                            <input id="utility-removal" name="utility[]" type="checkbox" value="removal"
                                class="mr-1">
                            Removal
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utility-tutoring" class="mr-1 text-gray-500 p-1">
                            <input id="utility-tutoring" name="utility[]" type="checkbox" value="tutoring"
                                class="mr-1">
                            Tutoring
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utility-recursion" class="mr-1 text-gray-500 p-1">
                            <input id="utility-recursion" name="utility[]" type="checkbox" value="recursion"
                                class="mr-1">
                            Recursion
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utility-counterspell" class="mr-1 text-gray-500 p-1">
                            <input id="utility-counterspell" name="utility[]" type="checkbox" value="counterspell"
                                class="mr-1">
                            Counterspell
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="utility-tokenGeneration" class="mr-1 text-gray-500 p-1">
                            <input id="utility-tokenGeneration" name="utility[]" type="checkbox" value="tokenGeneration"
                                class="mr-1">
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
                            <input @php echo  'checked'; @endphp id="color-white" name="colors[]" type="checkbox"
                                value="white" class="mr-1">
                            White
                        </label>
                    </td>
                    <td>
                        <label for="color-black" class="mr-1 text-gray-500 p-1">
                            <input id="color-black" name="colors[]" type="checkbox" value="black" class="mr-1">
                            Black
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="color-blue" class="mr-1 text-gray-500 p-1">
                            <input id="color-blue" name="colors[]" type="checkbox" value="blue" class="mr-1">
                            Blue
                        </label>
                    </td>
                    <td>
                        <label for="color-green" class="mr-1 text-gray-500 p-1">
                            <input id="color-green" name="colors[]" type="checkbox" value="green" class="mr-1">
                            Green
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="color-red" class="mr-1 text-gray-500 p-1">
                            <input id="color-red" name="colors[]" type="checkbox" value="red" class="mr-1">
                            Red
                        </label>
                    </td>
                    <td>
                        <label for="color-null" class=" text-gray-500 p-1">
                            <input id="color-null" name="colors[]" type="checkbox" value="null" class="mr-1">
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
