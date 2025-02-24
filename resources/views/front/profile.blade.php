@extends('base')

@section('main')
    <div class="p-16 h-screen">

        <div class="p-8 bg-white shadow mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <h1 class="text-4xl font-semibold text-gray-800 mb-6">Welcome To Your Profile</h1>

                <div class="relative">
                    <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                        @if($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Picture" class="w-full h-full rounded-full">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        @endif
                    </div>
</div>

            </div>
            <form action="/updateUser/{{ $user->id }}" method="post">
                @csrf
            <div class="mt-20 text-center border-b border-gray-300 pb-12">
                <div class="flex flex-col items-center space-y-4">
                <input type="text" name="firsName" value="{{ $user->firsName }}"
                       class="w-80 px-4 py-2 border border-gray-300 rounded-lg text-center text-gray-700 text-lg font-medium bg-gray-100"
                       >
                    @error('firsName')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <input type="text" name="lastName" value="{{ $user->lastName }}"
                           class="w-80 px-4 py-2 border border-gray-300 rounded-lg text-center text-gray-700 text-lg font-medium bg-gray-100"
                    >
                    @error('lastName')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror



                    <input type="text" name="email" value="{{ $user->email }}"
                           class="w-80 px-4 py-2 border border-gray-300 rounded-lg text-center text-gray-800 text-lg font-medium bg-gray-100"
                           >
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type="text" name="phone" value="{{ $user->phone }}"
                           class="w-80 px-4 py-2 border border-gray-300 rounded-lg text-center text-gray-700 text-lg font-medium bg-gray-100"
                           >
                    @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror



                    <input type="text" value="{{ $user->created_at }}"
                           class="w-80  px-4 py-2 border border-gray-300 rounded-lg text-center text-gray-500 text-lg font-light bg-gray-100"
                           disabled>


                    <button type="submit" class="w-[17%] rounded-3xl py-5 bg-black h-full text-white">update</button>
                </div>
            </div>
            </form>


        </div>
    </div>
@endsection
