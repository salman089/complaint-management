<x-app-layout>
    <x-slot:title>Create Complaint</x-slot:title>


    <div class="max-w-4xl px-4 py-12 mx-auto sm:px-6 lg:px-8">

        <form method="POST" action="{{ route('customer.complaints.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <p class="text-sm text-gray-600">Fill up the form to create your complaint.</p>
                    <div class="grid grid-cols-1 mt-5 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="complaint" class="block text-sm font-medium text-gray-900">Complaint
                                Detail</label>
                            <div class="mt-2">
                                <textarea id="complaint" name="complaint" rows="3"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Your Complaint" required></textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="files" class="block text-sm font-medium text-gray-900">Images</label>
                            <input type="file" multiple name="files[]" id="files"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-4 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="text-base font-semibold text-gray-900">Personal Information</h2>
                    <p class="text-sm text-gray-600">We need a handful of details about yourself.</p>
                    <div class="grid grid-cols-1 mt-5 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-4">
                            <label for="phone" class="block text-sm font-medium text-gray-900">Phone Number</label>
                            <div class="mt-2">
                                <input id="phone" name="phone" type="tel" autocomplete="tel"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="street_address" class="block text-sm font-medium text-gray-900">Street
                                Address</label>
                            <div class="mt-2">
                                <input type="text" name="street_address" id="street_address"
                                    autocomplete="street-address"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required>
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium text-gray-900">City</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="city" autocomplete="address-level2"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium text-gray-900">State /
                                Province</label>
                            <div class="mt-2">
                                <input type="text" name="region" id="region" autocomplete="address-level1"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="postal_code" class="block text-sm font-medium text-gray-900">ZIP / Postal
                                Code</label>
                            <div class="mt-2">
                                <input type="text" name="postal_code" id="postal_code" autocomplete="postal_code"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6 gap-x-6">
                    <a href="{{ route('customer.complaints.index') }}"
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
