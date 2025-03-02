@extends('base')
@section('main')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column: Savings Goals -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-neutral-800">Savings Goals</h2>
                <button class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors">
                    Add New Goal
                </button>
            </div>

            <!-- Savings Goals List -->
            <div class="space-y-6">
                <!-- Goal 1 -->
                <div class="border border-neutral-200 rounded-lg p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-medium text-lg">New Gaming PC</h3>
                            <p class="text-neutral-500 text-sm">Target: €1,500.00</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-primary-600 font-medium">€900.00</span>
                            <span class="text-neutral-500 text-sm">saved</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span>Progress</span>
                            <span>60%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-value bg-primary-500" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-sm text-neutral-500">Target date: August 15, 2023</span>
                        <button class="text-sm text-primary-600 hover:text-primary-700">Edit</button>
                    </div>
                </div>

                <!-- Goal 2 -->
                <div class="border border-neutral-200 rounded-lg p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-medium text-lg">Summer Vacation</h3>
                            <p class="text-neutral-500 text-sm">Target: €2,000.00</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-primary-600 font-medium">€1,200.00</span>
                            <span class="text-neutral-500 text-sm">saved</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span>Progress</span>
                            <span>60%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-value bg-primary-500" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-sm text-neutral-500">Target date: July 1, 2023</span>
                        <button class="text-sm text-primary-600 hover:text-primary-700">Edit</button>
                    </div>
                </div>

                <!-- Goal 3 -->
                <div class="border border-neutral-200 rounded-lg p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-medium text-lg">Emergency Fund</h3>
                            <p class="text-neutral-500 text-sm">Target: €5,000.00</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-primary-600 font-medium">€1,750.00</span>
                            <span class="text-neutral-500 text-sm">saved</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span>Progress</span>
                            <span>35%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-value bg-primary-500" style="width: 35%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-sm text-neutral-500">Target date: December 31, 2023</span>
                        <button class="text-sm text-primary-600 hover:text-primary-700">Edit</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
