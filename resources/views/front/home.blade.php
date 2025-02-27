@extends('base')

@section('main')
    <!-- Main Container -->
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 text-slate-600 relative overflow-x-hidden">
        <!-- Subtle Decorative Elements -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-100/40 rounded-full filter blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute top-1/2 right-0 w-96 h-96 bg-indigo-100/40 rounded-full filter blur-3xl translate-x-1/2"></div>

        <div class="container mx-auto px-4 py-12 relative">
            <!-- Gentle Header -->
            <div class="text-center mb-16 relative">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 text-slate-700">
                    💰 Gestion Financière
                </h1>
                <div class="h-1 w-24 mx-auto bg-blue-200 rounded-full"></div>
            </div>

            <!-- Transaction Form -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 mb-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                    <span class="bg-blue-50 p-2 rounded-xl text-blue-500">➕</span>
                    Nouvelle Transaction
                </h2>
                <form action="/storeTransactions" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @csrf
                    <div class="space-y-2 group">
                        <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Type</label>
                        <select name="type" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300">
                            <option value="revenu">Revenu</option>
                            <option value="depense">Dépense</option>
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
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-blue-500 text-white font-medium px-6 py-3 rounded-xl hover:bg-blue-600 active:scale-[0.98] transition-all duration-300 shadow-sm hover:shadow">
                            Ajouter la transaction
                        </button>
                    </div>
                </form>
            </div>

            <!-- Category Management -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 mb-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                    <span class="bg-amber-50 p-2 rounded-xl text-amber-500">🏷</span>
                    Gestion des Catégories
                </h2>
                <form action="/storeCategory" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
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
                            Ajouter Catégorie
                        </button>
                    </div>
                </form>
                <div class="overflow-hidden rounded-xl border border-slate-200">
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
                                        🗑️ Supprimer
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Transactions Table -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 mb-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                    <span class="bg-emerald-50 p-2 rounded-xl text-emerald-500">📜</span>
                    Historique des Transactions
                </h2>
                <div class="overflow-hidden rounded-xl border border-slate-200">
                    <table class="w-full">
                        <thead class="bg-slate-50">
                        <tr>
                            <th class="text-left py-3 px-4 text-sm font-medium text-slate-500">Type</th>
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
                                        <span class="px-3 py-1 rounded-full text-sm font-medium
                                            {{$transaction->type === 'revenu'
                                            ? 'bg-emerald-50 text-emerald-600'
                                            : 'bg-red-50 text-red-600'}}">
                                            {{$transaction->type}}
                                        </span>
                                    </td>
                                <td class="py-3 px-4 font-medium">{{$transaction->amount}} €</td>
                                <td class="py-3 px-4">
                                        <span class="px-3 py-1 rounded-full text-sm bg-slate-100 text-slate-600">

                            {{$transaction->category->name}}
                                        </span>
                                </td>
                                <td class="py-3 px-4 text-slate-500">{{$transaction->description}}</td>
                                <td class="py-3 px-4 text-slate-500">{{$transaction->user->firstName . ' ' . $transaction->user->lastName}}</td>
                                <td class="py-3 px-4">
                                    <div class="flex gap-2 opacity-80 group-hover:opacity-100 transition-opacity">
                                        <button class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors edit-transaction" data-transaction='@json($transaction)'>
                                            ✏️ Edit
                                        </button>
                                        <a href="/destroy_trans/{{$transaction->id}}" class="px-3 py-1 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                                            🗑️ Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Chart Section des revenu-->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                    <span class="bg-violet-50 p-2 rounded-xl text-violet-500">📊</span>
                    Répartition du Budget revenu
                </h2>
                <div class="h-[400px] w-full">
                    <canvas id="budgetChart"></canvas>
                </div>
            </div>
            <!-- Chart Section des depense-->
            <div class="bg-white/80 backdrop-blur-sm mt-8 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100">
                <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center gap-3">
                    <span class="bg-violet-50 p-2 rounded-xl text-violet-500">📊</span>
                    Répartition du Budget depense
                </h2>
                <div class="h-[400px] w-full">
                    <canvas id="budgetChart1"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="updateTransactionModal" class="hidden fixed inset-0 bg-slate-900/20 backdrop-blur-sm z-50">
        <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-lg p-4">
            <div class="bg-white rounded-3xl p-8 shadow-xl transform transition-all duration-300 opacity-0 scale-95 border border-slate-200" id="modalContent">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-slate-700">✏️ Modifier la Transaction</h2>
                    <button id="closeUpdateModal" class="text-slate-400 hover:text-slate-600 transition-colors">
                        ×
                    </button>
                </div>
                <form action="/updateTransaction" method="POST" id="updateTransactionForm" class="space-y-6">
                    @csrf
                    <input type="hidden" name="transaction_id" id="transaction_id">
                    <div class="space-y-2 group">
                        <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">Type</label>
                        <select name="type" id="update_type" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300">
                            <option value="revenu">Revenu</option>
                            <option value="depense">Dépense</option>
                        </select>
                        @error('type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
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
                        Enregistrer les modifications
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
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
                document.getElementById('update_type').value = transaction.type;
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
