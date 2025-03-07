<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Statistics</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800 p-8">
<div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-xl space-y-8">
    <h1 class="text-4xl font-bold text-center text-indigo-600 mb-8">Website Statistics</h1>

    <!-- Transactions Section -->
    <section>
        <h2 class="text-3xl font-semibold text-gray-900 mb-4">Transactions</h2>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto text-sm text-left text-gray-600">
                <thead class="bg-indigo-100 text-indigo-600">
                <tr>
                    <th class="px-6 py-3 border-b">Transaction ID</th>
                    <th class="px-6 py-3 border-b">Amount</th>
                    <th class="px-6 py-3 border-b">Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($statistics['transactions'] as $transaction)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b">{{ $transaction->id }}</td>
                        <td class="px-6 py-4 border-b">${{ number_format($transaction->amount, 2) }}</td>
                        <td class="px-6 py-4 border-b">{{ $transaction->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Categories Section -->
    <section>
        <h2 class="text-3xl font-semibold text-gray-900 mb-4">Categories</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($statistics['categories'] as $category)
                <div class="bg-indigo-50 p-4 rounded-lg shadow-md hover:bg-indigo-100 transition duration-300">
                    <h3 class="text-xl font-semibold text-indigo-700">{{ $category->name }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Users Section -->
    <section>
        <h2 class="text-3xl font-semibold text-gray-900 mb-4">Users</h2>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto text-sm text-left text-gray-600">
                <thead class="bg-indigo-100 text-indigo-600">
                <tr>
                    <th class="px-6 py-3 border-b">User ID</th>
                    <th class="px-6 py-3 border-b">Name</th>
                    <th class="px-6 py-3 border-b">phone</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($statistics['users'] as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b">{{ $user->id }}</td>
                        <td class="px-6 py-4 border-b">{{ $user->firstName }} {{$user->lastName }}</td>
                        <td class="px-6 py-4 border-b">{{ $user->phone }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Users Section -->
    <section>
        <h2 class="text-3xl font-semibold text-gray-900 mb-4">goals</h2>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto text-sm text-left text-gray-600">
                <thead class="bg-indigo-100 text-indigo-600">
                <tr>
                    <th class="px-6 py-3 border-b">goal ID</th>
                    <th class="px-6 py-3 border-b">title</th>
                    <th class="px-6 py-3 border-b">target</th>
                    <th class="px-6 py-3 border-b">target date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($statistics['goals'] as $goal)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b">{{ $goal->id }}</td>
                        <td class="px-6 py-4 border-b">{{ $goal->title }}</td>
                        <td class="px-6 py-4 border-b">{{ $goal->target }}</td>
                        <td class="px-6 py-4 border-b">{{ $goal->target_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Accounts Section -->

</div>
</body>
</html>
