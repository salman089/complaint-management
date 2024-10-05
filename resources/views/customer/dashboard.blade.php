<x-app-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg shadow-xl bg-gradient-to-r from-gray-900 to-gray-700">
                <div class="p-8 text-white">
                    Welcome Back Customer, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>

    <div class="py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="py-1 sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-2">
                        <div class="px-6 py-2">
                            <h3 class="mb-4 text-xl text-center text-gray-800"><strong>Complaints Overview</strong></h3>

                            <table class="min-w-full mt-4 divide-y divide-gray-200 rounded-lg shadow-sm">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Status
                                        </th>
                                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">Pending</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pending->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">Quoted</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $quoted->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">Accepted</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $accepted->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">Rejected</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $rejected->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">Assigned</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $assigned->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">In Progress</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $inprogress->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">Completed</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $completed->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">Closed</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $closed->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-bold text-gray-900">All</td>
                                        <td class="px-6 py-4 text-sm font-bold text-gray-900">{{ $complaints->count() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
