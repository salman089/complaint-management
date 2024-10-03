<x-app-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    Welcome Back Admin, {{ Auth::user()->name }} !
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="py-2">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="p-6 text-gray-900">

                        <div class="py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div
                                class="py-2 overflow-hidden transition-colors duration-300 bg-gray-100 shadow-sm hover:bg-gray-300 sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <strong class="flex justify-center text-xl text-gray-900">Customer
                                        Overview</strong><br>

                                    <table class="min-w-full mt-4 divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Type</th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Count</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900">Total Customers</td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $users->count() }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div
                                class="py-2 overflow-hidden transition-colors duration-300 bg-gray-100 shadow-sm hover:bg-gray-300 sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <strong class="flex justify-center text-xl text-gray-900">Employee
                                        Overview</strong><br>

                                    <table class="min-w-full mt-4 divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Type</th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Count</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900">Total Employees</td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $employees->count() }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div
                                class="py-2 overflow-hidden transition-colors duration-300 bg-gray-100 shadow-sm hover:bg-gray-300 sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <strong class="flex justify-center text-xl text-gray-900">Complaints
                                        Overview</strong><br>

                                    <table class="min-w-full mt-4 divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Status</th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Count</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900">Pending Complaints
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $pending->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900">Quoted Complaints
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $quoted->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900">Accepted Complaints
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $accepted->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900">Rejected Complaints
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $rejected->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900">Closed Complaints
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $closed->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900">Assigned Complaints
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $assigned->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900">Completed Complaints
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $completed->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900"><strong
                                                        class="text-gray-900">Total Complaints</strong></td>
                                                <td class="px-6 py-4 text-sm text-gray-500"><strong
                                                        class="text-gray-900">{{ $complaints->count() }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div
                                class="py-2 overflow-hidden transition-colors duration-300 bg-gray-100 shadow-sm hover:bg-gray-300 sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <strong class="flex justify-center text-xl text-gray-900">Revenue
                                        Overview</strong><br>

                                    <table class="min-w-full mt-4 divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Type</th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Value</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-900"><strong
                                                        class="text-gray-900">Total Revenue</strong></td>
                                                <td class="px-6 py-4 text-sm text-gray-500"><strong
                                                        class="text-gray-900">₹{{ $total }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
