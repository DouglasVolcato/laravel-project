@extends('components.main')

@section('title', 'Home')

@section('content')
    <div class="flex flex-wrap justify-evenly bg-black-300 w-full" id="card-container">
        @foreach ($cards as $card)
            @if (isset($card->imageUrl))
                <div class="bg-white rounded-lg shadow-lg p-4 max-w-fit m-5">
                    <img src="{{ $card->imageUrl }}" alt="{{ $card->name }}" class="w-150 h-200 object-cover mb-4">
                    <h1 class="text-gray-600 font-bold text-center">{{ $card->name }}</h1>
                    <p class="text-gray-600 text-center">{{ $card->type }}</p>
                </div>
            @endif
        @endforeach
    </div>

    <div class="pagination flex flex-wrap justify-center mt-8">
        @for ($index = 1; $index <= 100; $index++)
            <a href="{{ route('cards', ['page' => $index]) }}"
                class="px-4 py-2 m-1 font-bold bg-gray-200 text-gray-800 rounded hover:bg-gray-300 {{ $index == 1 ? 'bg-blue-500 text-white' : '' }}">{{ $index }}</a>
        @endfor
    </div>

@endsection
