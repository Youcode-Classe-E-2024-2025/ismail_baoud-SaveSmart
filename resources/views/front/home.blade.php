@extends('base')

@section('main')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Select a Profile</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($profiles as $profile)
                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                    <img src="{{ asset('storage/'.$profile->image) }}" alt="{{ $profile->name }}" class="w-full h-24 rounded-full mx-auto mb-4">
                    <h2 class="text-xl w-full font-semibold">{{ $profile->name }}</h2>
                    <a href="/profile/{{ $profile->id }}" class="mt-4 inline-block bg-blue-500 text-white rounded-lg px-4 py-2">Select</a>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            <h2 class="text-2xl font-bold mb-4">Add a New Profile</h2>
            <form action="" method="POST" class="flex flex-col">
                @csrf
                <input type="text" name="name" placeholder="Profile Name" required class="border border-gray-300 rounded-lg p-2 mb-4">
                <input type="url" name="avatar" placeholder="Profile Avatar URL" required class="border border-gray-300 rounded-lg p-2 mb-4">
                <button type="submit" class="bg-green-500 text-white rounded-lg px-4 py-2">Add Profile</button>
            </form>
        </div>
    </div>
@endsection
