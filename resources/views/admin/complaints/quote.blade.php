<x-app-layout>
    <x-slot name="header">
        <x-slot:title>Send Quotation</x-slot:title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Send Quotation for Complaint
        </h2>
    </x-slot>

    <div class="py-6 px-10">
        <form method="POST" action="{{ route('admin.store',  $complaint->id) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="space-y-6">

                <div class="bg-white shadow sm:rounded-lg p-6 border border-gray-200">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">Quotation Details</h3>
                    <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="price" class="block text-sm font-medium text-gray-900">Quotation Price (INR)</label>
                            <div class="mt-2">
                                <input id="price" name="price" type="number" step="0.01" min="0" autocomplete="off"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                    placeholder="₹0.00" required aria-describedby="price-description">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="quotation_details" class="block text-sm font-medium text-gray-900">Quotation Details</label>
                            <div class="mt-2 grid-cols-6">
                                <textarea id="quotation_details" name="quotation_details" rows="4"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                    placeholder="Provide details about the quotation" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow sm:rounded-lg p-6 border border-gray-200">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">Additional Requirements</h3>
                    <p class="mt-1 text-sm text-gray-600">Provide any additional details or requirements for the quotation.</p>
                    <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="additional_notes" class="block text-sm font-medium text-gray-900">Additional Notes</label>
                            <div class="mt-2">
                                <textarea id="additional_notes" name="additional_notes" rows="4"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                    placeholder="Any additional notes or special instructions"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-x-4">
                    <a href="{{ route('admin.complaints.index') }}"
                        class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-900 bg-white shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                        Send Quotation
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
