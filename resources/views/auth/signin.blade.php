@extends('base')

@section('main')
    <section class="relative min-h-screen">
        <!-- Full-Screen Video Background -->
        <div class="absolute inset-0 w-full h-full">
            <video class="w-full h-full object-cover" autoplay loop muted>
                <source src="{{ asset('storage/book_video/v1.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <!-- Login Form (Left 50% of Screen) -->
        <div class="absolute right-0 top-13 w-1/2 h-[89%] flex items-center justify-center">
            <div class="w-full h-full flex flex-col justify-center items-center p-8 bg-white/80 backdrop-blur-md shadow-lg">
                <h1 class="text-2xl font-semibold text-gray-800 text-center">Welcome Back to TechLib</h1>
                <form method="post" action="{{ route('login.validate') }}" class="grid w-[50%] justify-center grid-cols-1 gap-6 mt-8">
                    @csrf

                    <div>
                        <label class="block mb-2 text-sm text-gray-800" for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter email" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-[#E8E8E8] border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-800" for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-[#E8E8E8] border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                            <label for="remember-me" class="text-gray-800 ml-3 block text-sm">Remember me</label>
                        </div>
                        <div>
                            <a href="#" class="text-blue-600 font-semibold text-sm hover:underline">Forgot Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="w-full px-6 py-3 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Sign in</button>
                    <p class="text-gray-800 text-sm text-center mt-6">Don't have an account? <a href="/signup" class="text-blue-600 font-semibold hover:underline ml-1">Register here</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection
