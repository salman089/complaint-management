<x-app-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg shadow-xl bg-gradient-to-r from-gray-900 to-gray-700">
                <div class="p-8 text-white">
                    Welcome Back Admin, {{ Auth::user()->name }} !
                </div>
            </div>
        </div>
    </div>

    <div class="py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="py-1 sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong class="flex justify-center text-lg text-gray-900">Amount Overview</strong><br>

                    <table class="min-w-full mt-4 divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Type</th>
                                <th class="px-2 py-3 text-xs font-medium text-left text-gray-500 uppercase ">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">Pending</td>
                                <td class="px-2 py-4 text-sm text-gray-500">₹{{ number_format($pendingAmount, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">Paid</td>
                                <td class="px-2 py-4 text-sm text-gray-500">₹{{ number_format($paidAmount, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">Remaining</td>
                                <td class="px-2 py-4 text-sm text-gray-500">₹{{ number_format($remainingAmount, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900"><strong>Total</strong></td>
                                <td class="px-2 py-4 text-sm text-gray-500"><strong>₹{{ number_format($totalAmount, 2) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="py-1 sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong class="flex justify-center text-lg gray-900 text-">Customer Overview</strong><br>

                    <table class="min-w-full mt-4 divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Type</th>
                                <th class="px-5 py-3 text-xs font-medium text-left text-gray-500 uppercase">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">Customers</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $users->count() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="py-1 sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong class="flex justify-center text-lg text-gray-900">Employee Overview</strong><br>

                    <table class="min-w-full mt-4 divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Type</th>
                                <th class="px-5 py-3 text-xs font-medium text-left text-gray-500 uppercase">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">Employees</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $employees->count() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="py-1 sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong class="flex justify-center text-lg text-gray-900">Complaints Overview</strong><br>

                    <table class="min-w-full mt-4 divide-y divide-gray-200 sm:rounded-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Status</th>
                                <th class="px-5 py-3 text-xs font-medium text-left text-gray-500 uppercase">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">Pending</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $pending->count() }}</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-4 text-sm text-gray-900">Quoted</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $quoted->count() }}</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-4 text-sm text-gray-900">Accepted</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $accepted->count() }}</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-4 text-sm text-gray-900">Rejected</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $rejected->count() }}</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-4 text-sm text-gray-900">Assigned</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $assigned->count() }}</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-4 text-sm text-gray-900">In Progress</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $inprogress->count() }}</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-4 text-sm text-gray-900">Completed</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $completed->count() }}</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-4 text-sm text-gray-900">Closed</td>
                                <td class="px-5 py-4 text-sm text-gray-500">{{ $closed->count() }}</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-4 text-sm text-gray-900"><strong>Complaints</strong></td>
                                <td class="px-5 py-4 text-sm text-gray-500"><strong>{{ $complaints->count() }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
