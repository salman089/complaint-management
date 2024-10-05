<x-app-layout>
    <x-slot name="header">
        <x-slot:title>Task Details</x-slot:title>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Task Details
        </h2>
    </x-slot>

    <div class="px-10 py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="px-4 py-2 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Detail</th>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Information</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Customer Id:</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $task->complaint->user->id }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Customer Name:
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $task->complaint->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Compliant
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $task->complaint->complaint }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Phone
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $task->complaint->phone }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Street Address
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $task->complaint->street_address }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">City</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $task->complaint->city }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Region</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $task->complaint->region }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Postal Code</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $task->complaint->postal_code }}
                            </td>
                        </tr>
                        @if ($task->complaint->status == 'completed' || $task->complaint->status == 'closed')
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Completed Date
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $task->complaint->completed_date }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Completed Note
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $task->complaint->completion_note }}</td>
                            </tr>
                        @endif

                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Status</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $task->complaint->status }}
                            </td>
                        </tr>
                        @if (
                            $task->complaint->status != 'rejected' &&
                                $task->complaint->status != 'pending' &&
                                $task->complaint->status != 'quoted' &&
                                $task->complaint->status != 'accepted')
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Assigned To
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    @forelse ($task->complaint->assignees as $assignee)
                                        <div>{{ $assignee->user->name }}</div>
                                    @empty
                                        <div>No employees assigned.</div>
                                    @endforelse
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Complaint Images
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                                    @forelse ($task->complaint->photos as $photo)
                                        <div>
                                            <a href="{{ asset('storage/' . $photo->file_path) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $photo->file_path) }}" height="250"
                                                    class="w-full" alt="Complaint Image">
                                            </a>
                                        </div>
                                    @empty
                                        <div>
                                            <p>No images uploaded</p>
                                        </div>
                                    @endforelse
                                </div>
                            </td>
                        </tr>
                        @if ($task->complaint->status == 'completed' || $task->complaint->status == 'closed')
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Completed
                                    Images
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                                        @forelse ($task->complaint->completionImages as $image)
                                            <div>
                                                <a href="{{ asset('storage/' . $image->file_path) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $image->file_path) }}"
                                                        height="250" class="w-full" alt="Completed Image">
                                                </a>
                                            </div>
                                        @empty
                                            <div>
                                                <p>No completed images uploaded.</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="relative mt-6 mb-10">
            <div class="absolute top-0 right-0 flex mt-4 space-x-2">
                @if ($task->complaint->status == 'assigned')
                    <form method="POST" action="{{ route('employee.task.start', $task->complaint->id) }}"
                        class="inline-block">
                        @csrf
                        @method('PUT')
                        <button type="submit" onclick="return confirm('Are you sure you want to start this task?')"
                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                            Start Task
                        </button>
                    </form>
                @elseif ($task->complaint->status == 'in progress')
                    <a href="{{ route('employee.task.complete-form', $task->complaint->id) }}"
                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                        Complete Task
                    </a>
                @endif
                <a href="{{ route('employee.tasks.index', ['status' => $task->complaint->status]) }}"
                    class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                    Cancel
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
