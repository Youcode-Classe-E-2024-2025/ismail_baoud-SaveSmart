@extends('base')

@section('main')
    @if( count($books) >=1 )


@foreach($books as $book)
    <h1 class="flex justify-center text-3xl">Your Book </h1>

    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full sm:w-96 bg-white shadow-lg border border-gray-300 p-6">
            <div class="flex flex-col">
                <!-- Book Image -->
                <div class="w-full mb-4">
                    <img class="w-full h-80 object-cover" src="{{ asset('storage/' . $book->image) }}" alt="book">
                </div>

                <!-- Book Details -->
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $book->title }}</h2>
                    <h4 class="text-sm font-medium text-gray-600 mb-2">{{ $book->description }}</h4>
                    <h4 class="text-sm text-gray-500 mb-2">By: <span class="text-gray-800 font-semibold">{{ $book->author }}</span></h4>
                    <h4 class="text-xl font-semibold text-gray-800">$ {{ $book->price }}</h4>
                </div>

                <!-- Button -->
                <div class="mt-6">
                    <a href="/deleteReservation/{{ $book->id }}" class="block text-center bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 border border-red-800">🚫 return</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
    @else
        <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <p class="flex justify-center text-5xl">you don't have any books</p>
        </div>
    @endif


@endsection
