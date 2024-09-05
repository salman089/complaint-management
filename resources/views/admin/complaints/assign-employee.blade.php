<x-app-layout>
    <x-slot name="header">
        <x-slot:title>Assigning Complaint</x-slot:title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Assigning Complaint
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('admin.assign-employee', $complaint->id) }}">
                @csrf
                @method('POST')
                <div class="space-y-6">

                    <div>
                        <label id="listbox-label" class="block text-sm font-medium leading-6 text-gray-900">Assign
                            to</label>
                            <div class="relative mt-2">
                                <select name="user_ids[]" multiple
                                    class="relative w-full cursor-default rounded-md bg-white py-2 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm sm:leading-6"
                                    aria-labelledby="listbox-label" required>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


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

                    <div class="flex justify-end gap-x-4">
                        <a href="{{ route('admin.complaints.index') }}"
                            class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-900 bg-white shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2">
                            Assign
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
