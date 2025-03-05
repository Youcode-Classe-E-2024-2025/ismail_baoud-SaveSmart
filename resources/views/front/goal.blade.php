{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Budget & Savings Tracker</title>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">--}}
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
{{--    <script>--}}
{{--        tailwind.config = {--}}
{{--            theme: {--}}
{{--                extend: {--}}
{{--                    colors: {--}}
{{--                        primary: {--}}
{{--                            50: '#f0f9ff',--}}
{{--                            100: '#e0f2fe',--}}
{{--                            200: '#bae6fd',--}}
{{--                            300: '#7dd3fc',--}}
{{--                            400: '#38bdf8',--}}
{{--                            500: '#0ea5e9',--}}
{{--                            600: '#0284c7',--}}
{{--                            700: '#0369a1',--}}
{{--                        },--}}
{{--                        secondary: {--}}
{{--                            50: '#f0fdfa',--}}
{{--                            100: '#ccfbf1',--}}
{{--                            200: '#99f6e4',--}}
{{--                            300: '#5eead4',--}}
{{--                            400: '#2dd4bf',--}}
{{--                            500: '#14b8a6',--}}
{{--                            600: '#0d9488',--}}
{{--                        },--}}
{{--                        neutral: {--}}
{{--                            50: '#f8fafc',--}}
{{--                            100: '#f1f5f9',--}}
{{--                            200: '#e2e8f0',--}}
{{--                            300: '#cbd5e1',--}}
{{--                            400: '#94a3b8',--}}
{{--                            500: '#64748b',--}}
{{--                            600: '#475569',--}}
{{--                            700: '#334155',--}}
{{--                            800: '#1e293b',--}}
{{--                            900: '#0f172a',--}}
{{--                        }--}}
{{--                    },--}}
{{--                    fontFamily: {--}}
{{--                        sans: ['Inter', 'sans-serif'],--}}
{{--                    },--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--    <style type="text/tailwindcss">--}}
{{--        @layer utilities {--}}
{{--            .progress-bar {--}}
{{--                @apply h-2 rounded-full bg-neutral-200 overflow-hidden;--}}
{{--            }--}}
{{--            .progress-value {--}}
{{--                @apply h-full rounded-full;--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<body class="bg-neutral-50 font-sans text-neutral-800">--}}
{{--<div class="min-h-screen flex flex-col">--}}
    <!-- Header -->
@extends('base')

@section('main')

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-neutral-700">Monthly Income</h2>
                        <span class="p-2 bg-primary-100 text-primary-700 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                </svg>
                            </span>
                    </div>
                    <p class="mt-4 text-2xl font-semibold">€3,500.00</p>
                    <p class="text-sm text-neutral-500 mt-1">Last updated: May 15, 2023</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-neutral-700">Monthly Expenses</h2>
                        <span class="p-2 bg-secondary-100 text-secondary-700 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                            </span>
                    </div>
                    <p class="mt-4 text-2xl font-semibold">€2,450.00</p>
                    <p class="text-sm text-neutral-500 mt-1">Last updated: May 15, 2023</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-neutral-700">Savings</h2>
                        <span class="p-2 bg-primary-100 text-primary-700 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                                    <path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                                </svg>
                            </span>
                    </div>
                    <p class="mt-4 text-2xl font-semibold">€1,050.00</p>
                    <p class="text-sm text-neutral-500 mt-1">Last updated: May 15, 2023</p>
                </div>
            </div>



                    <!-- Budget Optimization -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100">
                        <h2 class="text-xl font-semibold text-neutral-800 mb-6">Budget Optimization</h2>

                        <!-- 50/30/20 Rule -->
                        <div class="mb-6">
                            <h3 class="font-medium text-lg mb-4">50/30/20 Rule Allocation</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-primary-50 p-4 rounded-lg border border-primary-100">
                                    <h4 class="font-medium text-primary-700">Needs (50%)</h4>
                                    <p class="text-2xl font-semibold mt-2">€1,750.00</p>
                                    <p class="text-sm text-neutral-500 mt-1">Housing, Food, Utilities, etc.</p>
                                </div>
                                <div class="bg-secondary-50 p-4 rounded-lg border border-secondary-100">
                                    <h4 class="font-medium text-secondary-700">Wants (30%)</h4>
                                    <p class="text-2xl font-semibold mt-2">€1,050.00</p>
                                    <p class="text-sm text-neutral-500 mt-1">Entertainment, Dining out, etc.</p>
                                </div>
                                <div class="bg-neutral-50 p-4 rounded-lg border border-neutral-200">
                                    <h4 class="font-medium text-neutral-700">Savings (20%)</h4>
                                    <p class="text-2xl font-semibold mt-2">€700.00</p>
                                    <p class="text-sm text-neutral-500 mt-1">Emergency fund, Goals, etc.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Current vs Optimized -->
                        <div>
                            <h3 class="font-medium text-lg mb-4">Current vs Optimized Budget</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-neutral-200">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Category</th>
                                        <th class="px-4 py-3 text-right text-xs font-medium text-neutral-500 uppercase tracking-wider">Current</th>
                                        <th class="px-4 py-3 text-right text-xs font-medium text-neutral-500 uppercase tracking-wider">Optimized</th>
                                        <th class="px-4 py-3 text-right text-xs font-medium text-neutral-500 uppercase tracking-wider">Difference</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-neutral-200">
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-neutral-800">Housing</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€1,000.00</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€1,000.00</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-neutral-800">Groceries</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€400.00</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€350.00</td>
                                        <td class="px-4 py-3 text-sm text-green-600 text-right">-€50.00</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-neutral-800">Utilities</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€200.00</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€200.00</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-neutral-800">Dining Out</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€350.00</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€250.00</td>
                                        <td class="px-4 py-3 text-sm text-green-600 text-right">-€100.00</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-neutral-800">Entertainment</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€250.00</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€200.00</td>
                                        <td class="px-4 py-3 text-sm text-green-600 text-right">-€50.00</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-neutral-800">Savings</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€500.00</td>
                                        <td class="px-4 py-3 text-sm text-neutral-800 text-right">€700.00</td>
                                        <td class="px-4 py-3 text-sm text-primary-600 text-right font-medium">+€200.00</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr class="bg-neutral-50">
                                        <td class="px-4 py-3 text-sm font-medium text-neutral-800">Total</td>
                                        <td class="px-4 py-3 text-sm font-medium text-neutral-800 text-right">€2,700.00</td>
                                        <td class="px-4 py-3 text-sm font-medium text-neutral-800 text-right">€2,700.00</td>
                                        <td class="px-4 py-3 text-sm font-medium text-neutral-800 text-right">€0.00</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Budget Breakdown & Export -->
                <div>
                    <!-- Budget Breakdown -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100 mb-8">
                        <h2 class="text-xl font-semibold text-neutral-800 mb-6">Budget Breakdown</h2>

                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium">Housing</span>
                                    <span class="text-sm">€1,000.00 (40.8%)</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-value bg-primary-500" style="width: 40.8%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium">Groceries</span>
                                    <span class="text-sm">€400.00 (16.3%)</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-value bg-primary-400" style="width: 16.3%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium">Utilities</span>
                                    <span class="text-sm">€200.00 (8.2%)</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-value bg-primary-300" style="width: 8.2%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium">Dining Out</span>
                                    <span class="text-sm">€350.00 (14.3%)</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-value bg-secondary-500" style="width: 14.3%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium">Entertainment</span>
                                    <span class="text-sm">€250.00 (10.2%)</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-value bg-secondary-400" style="width: 10.2%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium">Savings</span>
                                    <span class="text-sm">€500.00 (20.4%)</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-value bg-neutral-500" style="width: 20.4%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Export Options -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100">
                        <h2 class="text-xl font-semibold text-neutral-800 mb-6">Export Data</h2>

                        <div class="space-y-4">
                            <div class="border border-neutral-200 rounded-lg p-4 hover:bg-neutral-50 transition-colors cursor-pointer">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="ml-4">
                                        <h3 class="font-medium">Export as PDF</h3>
                                        <p class="text-sm text-neutral-500">Download a detailed PDF report of your budget and savings</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-neutral-200 rounded-lg p-4 hover:bg-neutral-50 transition-colors cursor-pointer">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="ml-4">
                                        <h3 class="font-medium">Export as CSV</h3>
                                        <p class="text-sm text-neutral-500">Download your data in CSV format for spreadsheet analysis</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-neutral-200 rounded-lg p-4 hover:bg-neutral-50 transition-colors cursor-pointer">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="ml-4">
                                        <h3 class="font-medium">Download Monthly Report</h3>
                                        <p class="text-sm text-neutral-500">Get a comprehensive monthly summary of your finances</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Add New Savings Goal Form -->


{{--    <!-- Edit Savings Goal Form -->--}}
{{--    <form method="POST" action="{{ route('savings-goals.update', ['id' => 1]) }}" class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100 mb-8">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}
{{--        <h2 class="text-xl font-semibold text-neutral-800 mb-6">Edit Savings Goal</h2>--}}

{{--        <div class="space-y-4">--}}
{{--            <div>--}}
{{--                <label for="edit_goal_name" class="block text-sm font-medium text-neutral-700 mb-1">Goal Name</label>--}}
{{--                <input type="text" name="goal_name" id="edit_goal_name" value="New Gaming PC" required--}}
{{--                       class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <label for="edit_target_amount" class="block text-sm font-medium text-neutral-700 mb-1">Target Amount (€)</label>--}}
{{--                <input type="number" name="target_amount" id="edit_target_amount" value="1500.00" min="0" step="0.01" required--}}
{{--                       class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <label for="edit_category" class="block text-sm font-medium text-neutral-700 mb-1">Category</label>--}}
{{--                <select name="category" id="edit_category" required--}}
{{--                        class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--                    <option value="technology" selected>Technology</option>--}}
{{--                    <option value="travel">Travel</option>--}}
{{--                    <option value="emergency">Emergency Fund</option>--}}
{{--                    <option value="education">Education</option>--}}
{{--                    <option value="home">Home</option>--}}
{{--                    <option value="other">Other</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <label for="edit_target_date" class="block text-sm font-medium text-neutral-700 mb-1">Target Date</label>--}}
{{--                <input type="date" name="target_date" id="edit_target_date" value="2023-08-15" required--}}
{{--                       class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--            </div>--}}

{{--            <div class="flex justify-end space-x-3">--}}
{{--                <button type="button" class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-md hover:bg-neutral-50">--}}
{{--                    Cancel--}}
{{--                </button>--}}
{{--                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-md hover:bg-primary-700">--}}
{{--                    Save Changes--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

{{--    <!-- Add Funds Form -->--}}
{{--    <form method="POST" action="{{ route('savings-goals.add-funds', ['id' => 1]) }}" class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100 mb-8">--}}
{{--        @csrf--}}
{{--        <h2 class="text-xl font-semibold text-neutral-800 mb-6">Add Funds to Goal</h2>--}}

{{--        <div class="space-y-4">--}}
{{--            <div>--}}
{{--                <p class="text-sm text-neutral-600 mb-4">--}}
{{--                    Adding funds to: <span class="font-medium text-neutral-800">New Gaming PC</span>--}}
{{--                </p>--}}
{{--                <p class="text-sm text-neutral-600 mb-4">--}}
{{--                    Current progress: €900.00 / €1,500.00--}}
{{--                </p>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <label for="amount" class="block text-sm font-medium text-neutral-700 mb-1">Amount to Add (€)</label>--}}
{{--                <input type="number" name="amount" id="amount" min="0" step="0.01" required--}}
{{--                       class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--                @error('amount')--}}
{{--                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <label for="date" class="block text-sm font-medium text-neutral-700 mb-1">Date</label>--}}
{{--                <input type="date" name="date" id="date" required--}}
{{--                       class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--                @error('date')--}}
{{--                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <label for="notes" class="block text-sm font-medium text-neutral-700 mb-1">Notes (Optional)</label>--}}
{{--                <textarea name="notes" id="notes" rows="2"--}}
{{--                          class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500"></textarea>--}}
{{--            </div>--}}

{{--            <div class="flex justify-end space-x-3">--}}
{{--                <button type="button" class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-md hover:bg-neutral-50">--}}
{{--                    Cancel--}}
{{--                </button>--}}
{{--                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-md hover:bg-primary-700">--}}
{{--                    Add Funds--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

{{--    <!-- Budget Optimization Settings Form -->--}}
{{--    <form method="POST" action="{{ route('budget.optimize') }}" class="bg-white rounded-lg shadow-sm p-6 border border-neutral-100">--}}
{{--        @csrf--}}
{{--        <h2 class="text-xl font-semibold text-neutral-800 mb-6">Budget Optimization Settings</h2>--}}

{{--        <div class="space-y-6">--}}
{{--            <div>--}}
{{--                <label class="block text-sm font-medium text-neutral-700 mb-3">Budget Distribution Method</label>--}}
{{--                <div class="space-y-3">--}}
{{--                    <label class="flex items-center">--}}
{{--                        <input type="radio" name="distribution_method" value="50-30-20" checked--}}
{{--                               class="h-4 w-4 text-primary-600 border-neutral-300 focus:ring-primary-500">--}}
{{--                        <span class="ml-2 text-sm text-neutral-700">50/30/20 Rule (Recommended)</span>--}}
{{--                    </label>--}}
{{--                    <label class="flex items-center">--}}
{{--                        <input type="radio" name="distribution_method" value="custom"--}}
{{--                               class="h-4 w-4 text-primary-600 border-neutral-300 focus:ring-primary-500">--}}
{{--                        <span class="ml-2 text-sm text-neutral-700">Custom Distribution</span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="border-t border-neutral-200 pt-6">--}}
{{--                <h3 class="text-sm font-medium text-neutral-700 mb-4">Custom Distribution Settings</h3>--}}
{{--                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">--}}
{{--                    <div>--}}
{{--                        <label for="needs_percentage" class="block text-sm font-medium text-neutral-700 mb-1">Needs (%)</label>--}}
{{--                        <input type="number" name="needs_percentage" id="needs_percentage" min="0" max="100" value="50"--}}
{{--                               class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <label for="wants_percentage" class="block text-sm font-medium text-neutral-700 mb-1">Wants (%)</label>--}}
{{--                        <input type="number" name="wants_percentage" id="wants_percentage" min="0" max="100" value="30"--}}
{{--                               class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <label for="savings_percentage" class="block text-sm font-medium text-neutral-700 mb-1">Savings (%)</label>--}}
{{--                        <input type="number" name="savings_percentage" id="savings_percentage" min="0" max="100" value="20"--}}
{{--                               class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <p class="mt-2 text-sm text-neutral-500">Total must equal 100%</p>--}}
{{--            </div>--}}

{{--            <div class="border-t border-neutral-200 pt-6">--}}
{{--                <h3 class="text-sm font-medium text-neutral-700 mb-4">Priority Settings</h3>--}}
{{--                <div class="space-y-4">--}}
{{--                    <div>--}}
{{--                        <label for="emergency_fund_target" class="block text-sm font-medium text-neutral-700 mb-1">Emergency Fund Target (€)</label>--}}
{{--                        <input type="number" name="emergency_fund_target" id="emergency_fund_target" min="0" value="5000"--}}
{{--                               class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <label for="savings_priority" class="block text-sm font-medium text-neutral-700 mb-1">Savings Priority</label>--}}
{{--                        <select name="savings_priority" id="savings_priority"--}}
{{--                                class="w-full rounded-md border-neutral-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">--}}
{{--                            <option value="emergency_first">Emergency Fund First</option>--}}
{{--                            <option value="balanced">Balanced Distribution</option>--}}
{{--                            <option value="goals_first">Savings Goals First</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="flex justify-end space-x-3">--}}
{{--                <button type="button" class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-md hover:bg-neutral-50">--}}
{{--                    Reset to Defaults--}}
{{--                </button>--}}
{{--                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-md hover:bg-primary-700">--}}
{{--                    Save Settings--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}



    <!-- Footer -->

{{--</div>--}}
{{--</body>--}}
{{--</html>--}}


@endsection

