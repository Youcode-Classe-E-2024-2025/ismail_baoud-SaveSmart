@extends('base')

@section('main')

    <!-- Add Font Awesome for professional icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Main Container -->
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 text-slate-600 relative overflow-x-hidden">
        <!-- Subtle Decorative Elements -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-100/40 rounded-full filter blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute top-1/2 right-0 w-96 h-96 bg-indigo-100/40 rounded-full filter blur-3xl translate-x-1/2"></div>

        <div class="container mx-auto px-4 py-12 relative">
            <!-- Gentle Header -->
            <div class="text-center mb-10 relative">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 text-slate-700">
                    <i class="fa-solid fa-wallet text-blue-500"></i> Gestion Financière
                </h1>
                <div class="h-1 w-24 mx-auto bg-blue-200 rounded-full"></div>
            </div>

            <!-- Summary Cards -->
            <div class="w-screen max-w-full mb-10">
                <div class="flex flex-col items-center md:flex-row gap-4">
                    <!-- Balance Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex-1 border-t-4 border-green-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-gray-500 text-sm font-medium">Balance</h3>
                                <p class="text-2xl font-bold @if($balence >= 0)text-gray-800 @else text-red-500 @endif ">${{$balence}}</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fa-solid fa-sack-dollar text-green-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex-1 border-t-4 border-blue-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-gray-500 text-sm font-medium">Revenue</h3>
                                <p class="text-2xl font-bold text-gray-800">${{$totalRevenu}}</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fa-solid fa-arrow-trend-up text-blue-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Expenses Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex-1 border-t-4 border-red-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-gray-500 text-sm font-medium">Expenses</h3>
                                <p class="text-2xl font-bold text-gray-800">${{ $totalDepense }}</p>
                            </div>
                            <div class="bg-red-100 p-3 rounded-full">
                                <i class="fa-solid fa-arrow-trend-down text-red-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Two-Column Layout for Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Left Column - Forms and Tables -->
                <div class="space-y-8">
                    <!-- Transaction Form -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                        <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                            <span class="bg-blue-50 p-2 rounded-xl text-blue-500">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                            Nouvelle Transaction
                        </h2>
                        <form action="/storeTransactions" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @csrf
                            <div class="space-y-2 group">
                                <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Type</label>
                                <select name="type" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300">
                                    <option value="revenu">Revenu</option>
                                    <option value="depense">Dépense</option>
                                </select>
                            </div>
                            <div class="space-y-2 group">
                                <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Type</label>
                                <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300">
                                    <option value="fix">fix</option>
                                    <option value="variable">variable</option>
                                </select>
                            </div>
                            <div class="space-y-2 group">
                                <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Montant (€)</label>
                                <input type="text" name="amount" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300" placeholder="Ex: 100.00">
                                @error('amount')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-y-2 group">
                                <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Catégorie</label>
                                <select name="category" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-y-2 md:col-span-2 group">
                                <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Description</label>
                                <input type="text" name="description" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300" placeholder="Description de la transaction">
                                @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <button type="submit" class="w-full bg-blue-500 text-white font-medium px-6 py-3 rounded-xl hover:bg-blue-600 active:scale-[0.98] transition-all duration-300 shadow-sm hover:shadow">
                                    <i class="fa-solid fa-plus mr-2"></i> Ajouter la transaction
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Category Management -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                        <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                            <span class="bg-amber-50 p-2 rounded-xl text-amber-500">
                                <i class="fa-solid fa-tags"></i>
                            </span>
                            Gestion des Catégories
                        </h2>
                        <form action="/storeCategory" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            @csrf
                            <div class="space-y-2 group">
                                <label class="block text-sm font-medium text-slate-600 group-hover:text-amber-600 transition-colors">Nom de la catégorie</label>
                                <input type="text" name="name" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-amber-100 focus:border-amber-400 transition-all duration-300" placeholder="Ex: Loisirs">
                                @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="w-full bg-amber-500 text-white font-medium px-6 py-3 rounded-xl hover:bg-amber-600 active:scale-[0.98] transition-all duration-300 shadow-sm hover:shadow">
                                    <i class="fa-solid fa-plus mr-2"></i> Ajouter Catégorie
                                </button>
                            </div>
                        </form>
                        <div class="overflow-hidden rounded-xl border border-slate-200">
                            <div class="max-h-32 overflow-y-auto"> <!-- Add a max-height and overflow property for scrolling -->
                                <table class="w-full">
                                    <thead class="bg-slate-50">
                                    <tr>
                                        <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">Nom</th>
                                        <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200">
                                    @foreach($categories as $category)
                                        <tr class="hover:bg-slate-50/50 transition-colors">
                                            <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-sm bg-amber-50 text-amber-600">
                                {{$category->name}}
                            </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <a href="/destroyCategory/{{$category->id}}" class="inline-flex items-center gap-2 px-3 py-1 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                                                    <i class="fa-solid fa-trash-can"></i> Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Right Column - Charts and Visualizations -->
                <div class="space-y-8">
                    <!-- Chart Section - Budget Distribution -->

                    <!-- Chart Section - Revenue -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                        <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                            <span class="bg-violet-50 p-2 rounded-xl text-violet-500">
                                <i class="fa-solid fa-chart-pie"></i>
                            </span>
                            Répartition du Budget revenu
                        </h2>
                        <div class="h-[300px] w-full">
                            <canvas id="budgetChart"></canvas>
                        </div>
                    </div>

                    <!-- Chart Section - Expenses -->
                    <div class="bg-white/80 backdrop-blur-sm mt-9 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                        <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                            <span class="bg-violet-50 p-2 rounded-xl text-violet-500">
                                <i class="fa-solid fa-chart-pie"></i>
                            </span>
                            Répartition du Budget depense
                        </h2>
                        <div class="h-[300px] w-full">
                            <canvas id="budgetChart1"></canvas>
                        </div>
                    </div>


                </div>
            </div>
            <div class="bg-white/8 grid grid-cols-2 w-full backdrop-blur-sm rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                <div>
                <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                            <span class="bg-violet-50 p-2 rounded-xl text-violet-500">
                                <i class="fa-solid fa-chart-column"></i>
                            </span>
                    Répartition du Budget chart
                </h2>
                <div class="h-[300px] w-full">
                    <canvas id="budgetChart2"></canvas>
                </div>
                </div>
                    <div>

                    <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                            <span class="bg-violet-50 p-2 rounded-xl text-violet-500">
                                <i class="fa-solid fa-chart-column"></i>
                            </span>
                        Répartition du Budget chart
                    </h2>
                    <div class="h-[300px] w-full">
                        <canvas id="budgetChart3"></canvas>
                    </div>
                </div>
            </div>


            <!-- Full Width Transactions Table -->
            <div class="mt-8 bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                    <span class="bg-emerald-50 p-2 rounded-xl text-emerald-500">
                        <i class="fa-solid fa-list-ul"></i>
                    </span>
                    Historique des Transactions
                </h2>
                <div class="overflow-x-auto">
                    <div class="overflow-hidden rounded-xl border border-slate-200">
                        <table class="w-full">
                            <thead class="bg-slate-50">
                            <tr>
                                <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">Type</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">status</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">Montant</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">Catégorie</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">Description</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">Utilisateur</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                            @foreach($transactions as $transaction)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="py-3 px-4">
                                       <span class="px-3 py-1 rounded-full text-sm font-medium inline-flex items-center gap-1
                                        {{$transaction->type === 'revenu'
                                               ? 'bg-emerald-50 text-emerald-600'
                                               : 'bg-red-50 text-red-600'}}">
                                               @if($transaction->type === 'revenu')
                                               <i class="fa-solid fa-arrow-trend-up"></i>
                                           @else
                                               <i class="fa-solid fa-arrow-trend-down"></i>
                                           @endif
                                           {{$transaction->type}}
                                       </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 rounded-full text-sm font-medium
                                            {{$transaction->status === 'variable'
                                            ? 'bg-emerald-50 text-emerald-600'
                                            : 'bg-red-50 text-red-600'}}">
                                            <i class="fa-solid {{$transaction->status === 'variable' ? 'fa-shuffle' : 'fa-thumbtack'}} mr-1"></i>
                                            {{$transaction->status}}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 font-medium">{{$transaction->amount}} €</td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 rounded-full text-sm bg-slate-100 text-slate-600">
                                            <i class="fa-solid fa-tag mr-1"></i> {{$transaction->category->name}}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-slate-500">{{$transaction->description}}</td>
                                    <td class="py-3 px-4 text-slate-500">
                                        <i class="fa-solid fa-user mr-1"></i> {{$transaction->user->firstName . ' ' . $transaction->user->lastName}}
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex gap-2 opacity-80 group-hover:opacity-100 transition-opacity">
                                            <button class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors edit-transaction" data-transaction='@json($transaction)'>
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </button>
                                            <a href="/destroy_trans/{{$transaction->id}}" class="px-3 py-1 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                                                <i class="fa-solid fa-trash-can"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="updateTransactionModal" class="hidden fixed inset-0 bg-slate-900/20 backdrop-blur-sm z-50">
        <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-lg p-4">
            <div class="bg-white rounded-3xl p-8 shadow-xl transform transition-all duration-300 opacity-0 scale-95 border border-slate-200" id="modalContent">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-slate-700">
                        <i class="fa-solid fa-pen-to-square mr-2"></i> Modifier la Transaction
                    </h2>
                    <button id="closeUpdateModal" class="text-slate-400 hover:text-slate-600 transition-colors">
                        <i class="fa-solid fa-times text-xl"></i>
                    </button>
                </div>
                <form action="/updateTransaction" method="POST" id="updateTransactionForm" class="space-y-6">
                    @csrf
                    <input type="hidden" name="transaction_id" id="transaction_id">
                    <div class="space-y-2 group">
                        <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Montant (€)</label>
                        <input type="number" name="amount" id="update_amount" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300">
                        @error('amount')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-2 group">
                        <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Catégorie</label>
                        <select name="category" id="update_category" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-2 group">
                        <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Description</label>
                        <input type="text" name="description" id="update_description" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300">
                        @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white font-medium px-6 py-3 rounded-xl hover:bg-blue-600 active:scale-[0.98] transition-all duration-300 shadow-sm hover:shadow">
                        <i class="fa-solid fa-save mr-2"></i> Enregistrer les modifications
                    </button>
                </form>
            </div>
        </div>
    </div>
{{--    <form method="POST" action="{{ route('savingStore') }}">--}}
{{--        @csrf--}}
{{--        <div class="space-y-4 text-center">--}}
{{--            <div>--}}
{{--                <label for="saving_amount" class="block text-sm font-medium text-neutral-700 mb-1">--}}
{{--                    <i class="fa-solid fa-euro-sign mr-2"></i>Amount to Save--}}
{{--                </label>--}}
{{--                <input type="text" name="saved" id="saving_amount" required--}}
{{--                       class="w-auto rounded-xl border-neutral-300 shadow-sm py-3 bg-gray-300 text-black text-center focus:border-primary-500 focus:ring-primary-500 transition-colors">--}}
{{--                @error('saving_amount')--}}
{{--                <p class="mt-1 text-sm text-red-600">--}}
{{--                    <i class="fa-solid fa-circle-exclamation mr-1"></i>--}}
{{--                    {{ $message }}--}}
{{--                </p>--}}
{{--                @enderror--}}
{{--            </div>--}}
    <section class="my-8">
        <h2 class="text-3xl font-semibold text-center text-gray-900 mb-4">Generate PDF</h2>

        <form action="{{ route('generateStatisticsPdf') }}" method="GET">
            @csrf

            <button type="submit"
                    class="px-6 py-3 text-sm font-medium text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 transition-all duration-300 active:scale-[0.98] w-full flex items-center justify-center gap-3">
                <span>Generate PDF</span>
            </button>
        </form>
    </section>

    {{--        </div>--}}
{{--    </form>--}}
{{--    <div class="container mx-auto p-6">--}}
{{--        <h1 class="text-3xl font-semibold text-center mb-6">Your Financial Way</h1>--}}

{{--        <div class="grid grid-cols-1 md:grid-cols-2 text-center gap-6">--}}
{{--            <div class="bg-white p-6 rounded-lg shadow-lg">--}}
{{--                <h3 class="text-lg font-medium">Total Revenue</h3>--}}
{{--                <p class="text-2xl text-blue-500">${{ number_format($totalRevenu, 2) }}</p>--}}
{{--            </div>--}}
{{--            <div class="bg-white p-6 rounded-lg shadow-lg">--}}
{{--                <h3 class="text-lg font-medium">Current Balance</h3>--}}
{{--                <p class="text-2xl text-green-500">${{ number_format($balence, 2) }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <h4 class="text-xl text-center font-medium mt-8 mb-4">Budget Breakdown</h4>--}}
{{--        <div class="grid grid-cols-1 sm:grid-cols-2 text-center md:grid-cols-3 gap-6">--}}
{{--            <div class="bg-white p-6 rounded-lg shadow-lg">--}}
{{--                <h5 class="font-medium text-lg">Essentials</h5>--}}
{{--                <p class="text-xl text-yellow-500">${{ number_format($algorithm['besoins'], 2) }}</p>--}}
{{--            </div>--}}
{{--            <div class="bg-white p-6 rounded-lg shadow-lg">--}}
{{--                <h5 class="font-medium text-lg">Leisure</h5>--}}
{{--                <p class="text-xl text-pink-500">${{ number_format($algorithm['envies'], 2) }}</p>--}}
{{--            </div>--}}
{{--            <div class="bg-white p-6 rounded-lg shadow-lg">--}}
{{--                <h5 class="font-medium text-lg">Savings</h5>--}}
{{--                <p class="text-xl text-green-600">${{ number_format($algorithm['epargne'], 2) }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <h4 class="text-xl text-center font-medium mt-8 mb-4">Optimized Budget</h4>--}}
{{--        <div class="grid grid-cols-1 text-center sm:grid-cols-2 gap-6">--}}
{{--            <div class="bg-white p-6 rounded-lg shadow-lg">--}}
{{--                <h5 class="font-medium text-lg">Fixed Expenses</h5>--}}
{{--                <p class="text-xl text-red-500">${{ number_format($optimizedBudget['optimized_expenses']['fixed_expenses'], 2) }}</p>--}}
{{--            </div>--}}
{{--            <div class="bg-white p-6  rounded-lg shadow-lg">--}}
{{--                <h5 class="font-medium text-lg">Variable Expenses</h5>--}}
{{--                <p class="text-xl text-orange-500">${{ number_format($optimizedBudget['optimized_expenses']['variable_expenses'], 2) }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="bg-white p-6 rounded-lg text-center shadow-lg">--}}
{{--        <h4 class="text-xl font-medium mt-8 mb-4">Remaining Balance</h4>--}}
{{--        <p class="text-2xl text-blue-700">${{ number_format($optimizedBudget['remaining_balance'], 2) }}</p>--}}
{{--            </div>--}}

{{--        <!-- Chart.js for displaying the budget breakdown -->--}}
{{--        <div class="mt-8">--}}
{{--            <canvas id="budgetChart3"></canvas>--}}
{{--        </div>--}}
{{--    </div>--}}

    <script>
        const ctx = document.getElementById('budgetChart3').getContext('2d');
        const budgetChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Essentials', 'Leisure', 'Savings'],
                datasets: [{
                    label: 'Budget Distribution',
                    data: [
                        {{ number_format($algorithm['besoins'], 2) }},
                        {{ number_format($algorithm['envies'], 2) }},
                        {{ number_format($algorithm['epargne'], 2) }},
                    ],
                    backgroundColor: ['#FFEB3B', '#F06292', '#66BB6A'],
                    hoverOffset: 4,
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': $' + tooltipItem.raw.toFixed(2);
                            }
                        }
                    }
                },
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('budgetChart2').getContext('2d');

            var chartData = @json($algorithm); // Laravel passes data as JSON

            new Chart(ctx, {
                type: 'bar', // Change to 'pie', 'line', etc., as needed
                data: {
                    labels: Object.keys(chartData), // ['loisire', 'elever', 'pargne']
                    datasets: [{
                        label: 'Budget Distribution',
                        data: Object.values(chartData), // [200, 500, 300]
                        backgroundColor: ['#ff6384', '#36a2eb', '#ffce56'],
                    }]
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('budgetChart3').getContext('2d');

            var chartData = @json($algorithm2); // Laravel passes data as JSON

            new Chart(ctx, {
                type: 'bar', // Change to 'pie', 'line', etc., as needed
                data: {
                    labels: Object.keys(chartData), // ['loisire', 'elever', 'pargne']
                    datasets: [{
                        label: 'Budget Distribution',
                        data: Object.values(chartData), // [200, 500, 300]
                        backgroundColor: ['#ff6384', '#36a2eb', '#ffce56','#36a2eb'],
                    }]
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            // Chart Configuration
            fetch('/api/category-totals/revenu')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => item.category.name);

                    const amounts = data.map(item => item.total);
                    const colors = [
                        'rgba(59, 130, 246, 0.6)',  // Blue
                        'rgba(16, 185, 129, 0.6)',  // Emerald
                        'rgba(245, 158, 11, 0.6)',  // Amber
                        'rgba(99, 102, 241, 0.6)',  // Indigo
                        'rgba(139, 92, 246, 0.6)',  // Violet
                    ];

                    const ctx = document.getElementById('budgetChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: amounts,
                                backgroundColor: colors,
                                borderColor: '#ffffff',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        color: '#475569',
                                        padding: 20,
                                        font: {
                                            size: 14,
                                            family: 'system-ui'
                                        }
                                    }
                                }
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true,
                                duration: 1000,
                                easing: 'easeInOutQuad'
                            }
                        }
                    });
                })
                .catch(error => console.error('Erreur lors du chargement des données:', error));
            fetch('/api/category-totals/depense')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => item.category.name);

                    const amounts = data.map(item => item.total);
                    const colors = [
                        'rgba(59, 130, 246, 0.6)',  // Blue
                        'rgba(16, 185, 129, 0.6)',  // Emerald
                        'rgba(245, 158, 11, 0.6)',  // Amber
                        'rgba(99, 102, 241, 0.6)',  // Indigo
                        'rgba(139, 92, 246, 0.6)',  // Violet
                    ];

                    const ctx = document.getElementById('budgetChart1').getContext('2d');
                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: amounts,
                                backgroundColor: colors,
                                borderColor: '#ffffff',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        color: '#475569',
                                        padding: 20,
                                        font: {
                                            size: 14,
                                            family: 'system-ui'
                                        }
                                    }
                                }
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true,
                                duration: 1000,
                                easing: 'easeInOutQuad'
                            }
                        }
                    });
                })
                .catch(error => console.error('Erreur lors du chargement des données:', error));

            // Modal Functionality with smooth transitions
            const modal = document.getElementById('updateTransactionModal');
            const modalContent = document.getElementById('modalContent');

            function openUpdateModal(transaction) {
                modal.classList.remove('hidden');
                requestAnimationFrame(() => {
                    modalContent.classList.remove('opacity-0', 'scale-95');
                    modalContent.classList.add('opacity-100', 'scale-100');
                });

                document.getElementById('transaction_id').value = transaction.id;
                document.getElementById('update_amount').value = transaction.amount;
                document.getElementById('update_category').value = transaction.category.id;
                document.getElementById('update_description').value = transaction.description;
            }

            document.getElementById('closeUpdateModal').addEventListener('click', function() {
                modalContent.classList.remove('opacity-100', 'scale-100');
                modalContent.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            });

            // Initialize edit transaction buttons
            document.querySelectorAll('.edit-transaction').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const transaction = JSON.parse(this.dataset.transaction);
                    openUpdateModal(transaction);
                });
            });
        });
    </script>
@endsection

