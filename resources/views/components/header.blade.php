<nav class="bg-black shadow-lg">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex items-center space-x-3">
                <svg class="h-10 w-10" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="200" height="200" rx="20" fill="#1E293B"/>
                    <path d="M50 150V50C50 45.5817 53.5817 42 58 42H80C84.4183 42 88 45.5817 88 50V150M112 150V50C112 45.5817 115.582 42 120 42H142C146.418 42 150 45.5817 150 50V150" stroke="#38BDF8" stroke-width="10" stroke-linecap="round"/>
                    <rect x="50" y="150" width="100" height="10" fill="#38BDF8"/>
                    <circle cx="100" cy="110" r="5" fill="#38BDF8"/>
                </svg>
                <span class="text-white text-xl font-bold">TechLib</span>
            </div>
            <div class="hidden sm:block">
                <div class="flex space-x-4">
                    <a href="{{ route('home') }}" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Home</a>
                    @if(session('role') === 'user')
                        <a href="/profile" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Profile</a>
                        <a href="/userDashboard" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">User Dashboard</a>
                        <a href="/logout" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-red-600">Logout</a>
                    @elseif(session('role') === 'admin')
                        <a href="/profile" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Profile</a>
                        <a href="/adminDashboard" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Admin Dashboard</a>
                        <a href="{{ route('emprunts') }}" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Emprunts</a>
                        <a href="{{ route('createbook') }}" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700">Add Book</a>
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
