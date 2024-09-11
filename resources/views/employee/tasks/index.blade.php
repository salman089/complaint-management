<x-app-layout>
    <x-slot name="header">
        <x-slot:title>Tasks</x-slot:title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tasks
        </h2>
    </x-slot>


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
                @if ($tasks->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Complaint
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
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="px-6 py-4 whitespace text-sm font-medium text-gray-900">
                                        {{ $task->complaint->complaint }}
                                    </td>
                                    <td class="px-6 py-4 whitespace text-sm text-gray-500">
                                        {{ $task->complaint->phone }}
                                    </td>
                                    <td class="px-6 py-4  text-sm text-gray-500">
                                        {{ $task->complaint->street_address }}
                                    </td>
                                    <td class="px-6 py-4  text-sm text-gray-500">
                                        {{ $task->complaint->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('employee.tasks.show', $task->id) }}"
                                            class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center py-10">
                        <p class="text-sm font-bold leading-6 text-gray-900">No tasks found.</p>
                    </div>
                @endif
            </div>
        </div>
        <br>
        {{-- {{ $employees->links() }} --}}

    </div>
</x-app-layout>
