<x-app-layout>
    <x-slot:title>Create Employee</x-slot:title>
    <nav x-data="{ open: false }" class="pt-6 bg-gray-800">
        <div class="px-4 px-6 mx-auto max-w-7xl lg:px-8">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-sub-nav-link href="{{ route('admin.employees.index') }}" :active="request()->routeIs('admin.employees.index')">All
                            Employees</x-sub-nav-link>
                        <x-sub-nav-link href="{{ route('admin.employees.create') }}" :active="request()->routeIs('admin.employees.create')"
                            class="flex justify-end text-blue-500">Add Employee</x-sub-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl px-4 py-6 mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">

                <div class="p-6 bg-white rounded-lg shadow-md">
                    <p class="text-sm text-gray-600">Fill up the form to create a new employee record.</p>
                    <div class="grid grid-cols-1 mt-5 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="name" class="block text-sm font-medium text-gray-900">Full Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Full Name" required>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="email" class="block text-sm font-medium text-gray-900">Email Address</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Email Address" required>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                            <div class="mt-2">
                                <input type="password" name="password" id="password" value="{{ old('password') }}"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Password" required>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Confirm
                                Password</label>
                            <div class="mt-2">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    value="{{ old('password') }}"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
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
                                    value="{{ old('phone') }}"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Phone Number" required>
                            </div>
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="address" class="block text-sm font-medium text-gray-900">Address</label>
                            <div class="mt-2">
                                <textarea rows=5 name="address" id="address" autocomplete="street-address" value="{{ old('address') }}"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Full Address" required></textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="position" class="block text-sm font-medium text-gray-900">Position</label>
                            <div class="mt-2">
                                <input type="text" name="position" id="position" value="{{ old('position') }}"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Position" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6 gap-x-6">
                    <a href="{{ route('admin.employees.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
