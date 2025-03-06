@extends('base')
@section('main')
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen gap-8 p-6 bg-gradient-to-br from-slate-50 to-blue-50">
        <!-- Header with Total Savings -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm p-8 border border-neutral-100 flex items-center gap-4">
                <div class="bg-emerald-100 p-4 rounded-xl">
                    <i class="fa-solid fa-piggy-bank text-2xl text-emerald-600"></i>
                </div>
                <div>
                    <p class="text-sm text-neutral-600 font-medium">Total Savings</p>
                    <h4 class="text-2xl font-semibold text-neutral-800">€{{ $saving}}</h4>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm p-8 border border-neutral-100">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-xl font-semibold text-neutral-800 flex items-center gap-3">
                        <i class="fa-solid fa-bullseye text-blue-600"></i>
                        Savings Goals
                    </h2>
                    <button type="button" id="createForm" class="px-4 py-2 bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition-all duration-300 flex items-center gap-2 active:scale-[0.98]">
                        <i class="fa-solid fa-plus"></i>
                        Add New Goal
                    </button>
                </div>

                <!-- Form to Add Savings -->
                <form id="form" method="POST" action="{{ route('goals.store') }}" class="hidden mb-8 bg-white rounded-xl shadow-sm p-6 border border-neutral-100 transform transition-all duration-300">
                    @csrf
                    <h2 class="text-xl font-semibold text-neutral-800 mb-6 flex items-center gap-3">
                        <i class="fa-solid fa-flag text-blue-600"></i>
                        Create New Savings Goal
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label for="goal_name" class="block text-sm font-medium text-neutral-700 mb-1">
                                <i class="fa-solid fa-tag mr-2"></i>Goal Name
                            </label>
                            <input type="text" name="title" id="goal_name" required
                                   class="w-full rounded-xl border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 transition-colors">
                            @error('title')
                            <p class="mt-1 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="target_amount" class="block text-sm font-medium text-neutral-700 mb-1">
                                <i class="fa-solid fa-euro-sign mr-2"></i>Target Amount
                            </label>
                            <input type="number" name="target" id="target_amount" min="0" step="0.01" required
                                   class="w-full rounded-xl border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 transition-colors">
                            @error('target')
                            <p class="mt-1 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="target_date" class="block text-sm font-medium text-neutral-700 mb-1">
                                <i class="fa-solid fa-calendar mr-2"></i>Target Date
                            </label>
                            <input type="date" name="target_date" id="target_date" required
                                   class="w-full rounded-xl border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 transition-colors">
                            @error('target_date')
                            <p class="mt-1 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" id="cancelForm"
                                    class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-xl hover:bg-neutral-50 transition-colors flex items-center gap-2">
                                <i class="fa-solid fa-xmark"></i>
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-xl hover:bg-primary-700 transition-all duration-300 active:scale-[0.98] flex items-center gap-2">
                                <i class="fa-solid fa-check"></i>
                                Create Goal
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Savings Goals List -->
                <div class="space-y-6">
                    @foreach($goals as $goal)
                        <div class="border border-neutral-200 rounded-xl p-6 hover:shadow-md transition-all duration-300">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-medium text-lg flex items-center gap-2">
                                        <i class="fa-solid fa-flag text-primary-600"></i>
                                        {{ $goal->title }}
                                    </h3>
                                    <p class="text-neutral-500 text-sm flex items-center gap-2">
                                        <i class="fa-solid fa-bullseye"></i>
                                        Target: €{{$goal->target}}
                                    </p>
                                </div>
                                <div class="flex items-center gap-2 bg-primary-50 px-3 py-1 rounded-lg">
                                    <i class="fa-solid fa-piggy-bank text-primary-600"></i>
                                    <span class="text-primary-600 font-medium">€{{$saving}}</span>
                                    <span class="text-neutral-500 text-sm">saved</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between text-sm mb-2">
                                <span class="flex items-center gap-2">
                                    <i class="fa-solid fa-chart-line text-primary-600"></i>
                                    Progress
                                </span>
                                    <span class="font-medium">{{ round(($saving / $goal->target) * 100, 2) }}%</span>
                                </div>
                                <div class="h-2 bg-neutral-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary-500 rounded-full transition-all duration-500"
                                         style="width: {{ ($balance / $goal->target) * 100 }}%"></div>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                            <span class="text-sm text-neutral-500 flex items-center gap-2">
                                <i class="fa-solid fa-calendar"></i>
                                Target date: {{$goal->target_date}}
                            </span>
                                <div class="flex items-center gap-3">

                                    <form action="/goleToTransaction" method="POST"
                                        @csrf
                                        <input class="hidden" name="target" value="{{$goal}}" >
                                        <button type="submit" class="text-sm text-red-600 hover:text-yellow-700 flex items-center gap-1 transition-colors">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Get it
                                        </button>
                                    </form>
                                    <button class="text-sm text-primary-600 hover:text-primary-700 flex items-center gap-1 transition-colors">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                    <form action="{{ route('goals.destroy', $goal->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this goal?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 hover:text-red-700 flex items-center gap-1 transition-colors">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Add Savings Input -->
                <div class="mt-8 bg-white p-6 border border-neutral-200 rounded-xl shadow-sm">
                    <h3 class="text-lg font-semibold text-neutral-800 mb-6 flex items-center gap-3">
                        <i class="fa-solid fa-plus text-emerald-600"></i>
                        Add Savings
                    </h3>
                    <form method="POST" action="">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="saving_amount" class="block text-sm font-medium text-neutral-700 mb-1">
                                    <i class="fa-solid fa-euro-sign mr-2"></i>Amount to Save
                                </label>
                                <input type="text" name="saving_amount" id="saving_amount" required
                                       class="w-full rounded-xl border-neutral-300 shadow-sm py-3 bg-gray-300 text-black text-center focus:border-primary-500 focus:ring-primary-500 transition-colors">
                                @error('saving_amount')
                                <p class="mt-1 text-sm text-red-600">
                                    <i class="fa-solid fa-circle-exclamation mr-1"></i>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 transition-all duration-300 active:scale-[0.98] w-full flex items-center justify-center gap-2">
                                <i class="fa-solid fa-piggy-bank"></i>
                                Add to Savings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createForm = document.getElementById('createForm');
            const form = document.getElementById('form');
            const cancelForm = document.getElementById('cancelForm');

            createForm.addEventListener('click', () => {
                form.classList.remove('hidden');
                form.classList.add('animate-in', 'fade-in', 'slide-in-from-top');
            });

            cancelForm.addEventListener('click', () => {
                form.classList.add('animate-out', 'fade-out', 'slide-out-to-top');
                setTimeout(() => {
                    form.classList.add('hidden');
                    form.classList.remove('animate-out', 'fade-out', 'slide-out-to-top');
                }, 300);
            });
        });
    </script>
@endsection

