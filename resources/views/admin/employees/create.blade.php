<x-app-layout>
    <x-slot:title>Create Employee</x-slot:title>
    <nav x-data="{ open: false }" class="bg-gray-800 pt-6">
        <div class="max-w-7xl mx-auto px-4 px-6 lg:px-8">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-sub-nav-link href="{{ route('admin.employees.index') }}" :active="request()->routeIs('admin.employees.index')">All
                            Employees</x-sub-nav-link>
                        <x-sub-nav-link href="{{ route('admin.employees.create') }}" :active="request()->routeIs('admin.employees.create')"
                            class="text-blue-500 flex justify-end">Add Employee</x-sub-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">

                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-sm text-gray-600">Fill up the form to create a new employee record.</p>
                    <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="name" class="block text-sm font-medium text-gray-900">Full Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Full Name" required>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="email" class="block text-sm font-medium text-gray-900">Email Address</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Email Address" required>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                            <div class="mt-2">
                                <input type="password" name="password" id="password"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Password" required>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Confirm
                                Password</label>
                            <div class="mt-2">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Confirm Password" required>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="phone" class="block text-sm font-medium text-gray-900">Phone Number</label>
                            <div class="mt-2">
                                <input type="tel" name="phone" id="phone" autocomplete="tel"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Phone Number" required>
                            </div>
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="address" class="block text-sm font-medium text-gray-900">Address</label>
                            <div class="mt-2">
                                <textarea rows=5 name="address" id="address" autocomplete="street-address"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Full Address" required></textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="position" class="block text-sm font-medium text-gray-900">Position</label>
                            <div class="mt-2">
                                <input type="text" name="position" id="position"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Position" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('admin.employees.index') }}"
                        class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-900 bg-white shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
