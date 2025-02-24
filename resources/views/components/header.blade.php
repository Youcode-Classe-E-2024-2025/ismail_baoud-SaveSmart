<nav class="bg-black shadow-lg">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex items-center space-x-3">
{{--                <img src="{{ asset('images.img1.png') }}" class="h-10 w-10" alt="not found" >--}}
                <span class="text-white text-xl font-bold">Save Smart</span>
            </div>
            <div class="hidden sm:block">
                <div class="flex space-x-4">
                    @if(session()->has('user'))
                        <a href="/profile" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Profile</a>
                        <a href="{{ route('home') }}" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Home</a>
                        <a href="/userDashboard" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Dashboard</a>
                        <a href="/addMember" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">add mamber</a>
                        <a href="/logout" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-red-600">Logout</a>

                    @else
                        <a href="/signin" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Sign In</a>
                        <a href="/signup" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Sign Up</a>
                    @endif
                </div>
            </div>
            <div class="sm:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white hover:bg-gray-700 p-2 rounded-md">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-16 6h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="hidden sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/dashboard" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Dashboard</a>
            <a href="/profile" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Profile</a>
            <a href="/signin" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Sign In</a>
            <a href="/signup" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Sign Up</a>
        </div>
    </div>
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</nav>
