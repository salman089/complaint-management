<x-app-layout>
    <x-slot:title>Complete Task</x-slot:title>

    <div class="max-w-4xl px-4 py-6 mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('employee.task.complete', $task->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="text-base font-semibold text-gray-900">Task Completion Details</h2>
                    <p class="text-sm text-gray-600">Please provide feedback or details about task completion.</p>

                    <div class="grid grid-cols-1 mt-5 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="completion_note" class="block text-sm font-medium text-gray-900">Completion Note</label>
                            <textarea id="completion_note" name="completion_note" rows="3"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                placeholder="Describe how the task was completed" required></textarea>
                        </div>

                        <div class="col-span-full">
                            <label for="completion_image" class="block text-sm font-medium text-gray-900">Task Completion Images</label>
                            <input type="file" multiple name="completion_image[]" id="completion_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-4 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6 gap-x-6">
                    <a href="{{ route('employee.tasks.index', ['status' => 'in progress']) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                        Complete Task
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
