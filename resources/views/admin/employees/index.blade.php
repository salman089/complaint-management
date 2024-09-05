<!-- resources/views/admin/show-employee.blade.php -->
<x-app-layout>
    <x-slot:title>All Employees</x-slot:title>
    <nav x-data="{ open: false }" class="bg-gray-800 pt-6">
        <div class="max-w-7xl mx-auto px-4 px-6 lg:px-8">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-sub-nav-link href="{{ route('admin.employees.index') }}" :active="request()->routeIs('admin.employees.index')">All
                            Employees</x-sub-nav-link>
                        <x-sub-nav-link href="{{ route('admin.employees.create') }}"
                            class="text-blue-500 flex justify-end">Add Employee</x-sub-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div class="py-6 px-10">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="bg-red-500 text-white p-4 rounded">
                {{ session('danger') }}
            </div>
        @endif

        @if (session('updated'))
            <div class="bg-blue-500 text-white p-4 rounded">
                {{ session('updated') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if ($employees->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Address
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Position
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="px-6 py-4 whitespace text-sm font-medium text-gray-900">
                                        {{ $employee->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace text-sm text-gray-500">
                                        {{ $employee->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace text-sm text-gray-500">
                                        {{ $employee->phone }}
                                    </td>
                                    <td class="px-6 py-4  text-sm text-gray-500">
                                        {{ $employee->address }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $employee->position }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                            class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="{{ route('admin.employees.destroy', $employee->id) }}"
                                            method="POST" class="inline-block ml-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center py-10">
                        <p class="text-sm font-bold leading-6 text-gray-900">No employees found.</p>
                    </div>
                @endif
            </div>
        </div>
        <br>
        {{ $employees->links() }}

    </div>
</x-app-layout>
