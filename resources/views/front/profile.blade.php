@extends('base')

@section('main')
    <div class="container mx-auto p-6 bg-gray-100 min-h-screen">
        <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">👤 Votre Profil</h1>
        <!-- Profile Picture Section -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8 border-l-4 border-green-500">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">📸 Photo de Profil</h2>
            <div class="flex justify-center">
                <div class="w-48 h-48 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-500 shadow-xl">
                    @if( $user->image)
                        <img src="{{ asset('storage/'. $user->image) }}" alt="Profile Picture" class="w-full h-full rounded-full">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    @endif
                </div>
            </div>
        </div>
        <!-- Profile Update Form -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8 border-l-4 border-blue-500">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Mise à jour du profil</h2>
            <form action="/updateUser/{{$user->id}}" method="post" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-600">Prénom</label>
                    <input type="text" name="firstName" value="{{ $user->firstName }}"
                           class="w-full border p-3 rounded-lg bg-gray-50" placeholder="Prénom">
                    @error('firsName')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Nom</label>
                    <input type="text" name="lastName" value="{{ $user->lastName }}"
                           class="w-full border p-3 rounded-lg bg-gray-50" placeholder="Nom">
                    @error('lastName')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Téléphone</label>
                    <input type="text" name="phone" value="{{ $user->phone }}"
                           class="w-full border p-3 rounded-lg bg-gray-50" placeholder="Numéro de téléphone">
                    @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Créé le</label>
                    <input type="text" value="{{ $user->created_at }}"
                           class="w-full border p-3 rounded-lg bg-gray-50 text-gray-500" disabled>
                </div>
                <button type="submit" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-lg shadow-md transition">Mettre à jour</button>
            </form>
        </div>


    </div>
@endsection
