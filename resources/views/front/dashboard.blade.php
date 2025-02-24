@extends('base')

@section('main')
    @if( count($books) >=1 )


        <!-- resources/views/family-account.blade.php -->
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Family Account</title>
            <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        </head>
        <body class="bg-gray-100">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6">Select a Profile</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Example Profile Cards -->
                @foreach($profiles as $profile)
                    <div class="bg-white rounded-lg shadow-md p-4 text-center">
                        <img src="{{ $profile->avatar }}" alt="{{ $profile->name }}" class="w-24 h-24 rounded-full mx-auto mb-4">
                        <h2 class="text-xl font-semibold">{{ $profile->name }}</h2>
                        <a href="{{ route('profile.select', $profile->id) }}" class="mt-4 inline-block bg-blue-500 text-white rounded-lg px-4 py-2">Select</a>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                <h2 class="text-2xl font-bold mb-4">Add a New Profile</h2>
                <form action="{{ route('profile.add') }}" method="POST" class="flex flex-col">
                    @csrf
                    <input type="text" name="name" placeholder="Profile Name" required class="border border-gray-300 rounded-lg p-2 mb-4">
                    <input type="url" name="avatar" placeholder="Profile Avatar URL" required class="border border-gray-300 rounded-lg p-2 mb-4">
                    <button type="submit" class="bg-green-500 text-white rounded-lg px-4 py-2">Add Profile</button>
                </form>
            </div>
        </div>
        </body>
        </html>
    @else
        <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <p class="flex justify-center text-5xl">you don't have any books</p>
        </div>
    @endif


@endsection
