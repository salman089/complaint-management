<x-app-layout>
    <x-slot name="header">
        <x-slot:title>Reject Complaint</x-slot:title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reject Complaint
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('adt', $complaint->id) }}">
                @csrf
                @method('POST')
                <div class="space-y-6">

                    <div class="border-b border-gray-200 pb-6">
                        <label for="reason" class="block text-sm font-medium text-gray-900">
                            Rejection Reason
                        </label>
                        <div class="mt-2">
                            <textarea id="reason" name="reason" rows="4"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                placeholder="Enter the reason for rejection" required></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-x-4">
                        <a href="{{ route('admin.complaints.pending') }}"
                            class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-900 bg-white shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                            Reject
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
