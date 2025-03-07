@extends('base')
@section('main')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen gap-8 p-6 bg-gradient-to-br from-slate-50 to-blue-50">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm p-8 border border-neutral-100 flex items-center gap-4">
                <div class="bg-emerald-100 p-4 rounded-xl">
                    <i class="fa-solid fa-piggy-bank text-2xl text-emerald-600"></i>
                </div>
                <div>
                    <p class="text-sm text-neutral-600 font-medium">Total Savings</p>
                    <h4 class="text-2xl font-semibold text-neutral-800">€{{ $balance * 0.20}}</h4>
                </div>
            </div>
        </div>
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

        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm p-8 border border-neutral-100">
                <h2 class="text-xl font-semibold text-neutral-800 flex items-center gap-3 mb-6">
                    <i class="fa-solid fa-bullseye text-blue-600"></i>
                    Goals Allocation
                </h2>
                @if (!$allocated_goals)
                    <p class="text-gray-500">No goals available.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300 rounded-lg">
                            <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="p-3 text-left">Goal</th>
                                <th class="p-3 text-left">Target</th>
                                <th class="p-3 text-left">Allocated</th>
                                <th class="p-3 text-left">Completion Date</th>
                                <th class="p-3 text-left">Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($allocated_goals as $data)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="p-3">{{ $data['goal']->title }}</td>
                                    <td class="p-3 text-green-600 font-bold">€{{ number_format($data['goal']->target, 2) }}</td>
                                    <td class="p-3 text-blue-500 font-bold">€{{ number_format($data['allocated'], 2) }}</td>
                                    <td class="p-3 text-gray-700">{{ $data['completion_date'] }}</td>
                                    <td class="p-3">
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-primary-500 h-full rounded-full transition-all duration-500"
                                                 @if((($data['allocated'] / $data['goal']->target) * 100) <= 100)style="width: {{ ($data['allocated'] / $data['goal']->target) * 100 }}%"@else style="width: 100"@endif></div>
                                        </div>
                                        <span class="text-sm text-gray-600">{{ round(($data['allocated'] / $data['goal']->target) * 100, 2) }}%</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
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
