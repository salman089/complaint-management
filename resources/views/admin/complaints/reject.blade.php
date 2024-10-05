<x-app-layout>
    <x-slot name="header">
        <x-slot:title>Reject Complaint</x-slot:title>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Reject Complaint
        </h2>
    </x-slot>

    <div class="max-w-4xl py-6 mx-auto sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 bg-white shadow sm:rounded-lg">
            <form method="POST" action="{{ route('admin.reject-complaint', $complaint->id) }}">
                @csrf
                @method('POST')
                <div class="space-y-6">

                    <div class="pb-6 border-b border-gray-200">
                        <label for="reason" class="block text-sm font-medium text-gray-900">
                            Rejection Reason
                        </label>
                        <div class="mt-2">
                            <textarea id="reason" name="reason" rows="4"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                placeholder="Enter the reason for rejection" required></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-x-4">
                        <a href="{{ route('admin.complaints.index') }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-md shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                            Reject
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
