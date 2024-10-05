<x-app-layout>
    <x-slot:title>All Employees</x-slot:title>
    <nav x-data="{ open: false }" class="pt-6 bg-gray-800">
        <div class="px-4 px-6 mx-auto max-w-7xl lg:px-8">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-sub-nav-link href="{{ route('admin.employees.index') }}" :active="request()->routeIs('admin.employees.index')">All
                            Employees</x-sub-nav-link>
                        <x-sub-nav-link href="{{ route('admin.employees.create') }}"
                            class="flex justify-end text-blue-500">Add Employee</x-sub-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <form action="{{ route('admin.employees.search') }}" method="GET" class="max-w-md mx-auto mt-4">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                name="search" value="{{ request()->get('search') }}" placeholder="Search by name...." required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="p-4 text-white bg-green-500 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('danger'))
                    <div class="p-4 text-white bg-red-500 rounded">
                        {{ session('danger') }}
                    </div>
                @endif

                @if (session('update'))
                    <div class="p-4 text-white bg-blue-500 rounded">
                        {{ session('update') }}
                    </div>
                @endif

                <div class="p-6 text-gray-900">
                    @if ($employees->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Phone
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Address
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Position
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace">
                                            {{ $employee->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace">
                                            {{ $employee->email }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace">
                                            {{ $employee->phone }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $employee->address }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $employee->position }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                            <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                                class="text-blue-600 hover:text-blue-900">Edit</a>
                                            <form action="{{ route('admin.employees.destroy', $employee->id) }}"
                                                method="POST" class="inline-block ml-4"
                                                onsubmit="return confirm('Are you sure you want to delete this employee?')">
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
                        <div class="py-10 text-center">
                            <p class="text-sm font-bold leading-6 text-gray-900">No employees found.</p>
                        </div>
                    @endif
                </div>
            </div>
            <br>
            {{ $employees->links() }}
        </div>
    </div>
</x-app-layout>
