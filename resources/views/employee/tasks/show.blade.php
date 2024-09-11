<x-app-layout>
    <x-slot name="header">
        <x-slot:title>Task Details</x-slot:title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Task Details
        </h2>
    </x-slot>

    <div class="py-12 px-10">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 py-2">
            <div class="p-6 text-gray-900">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Detail</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Information</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Customer Id:</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->complaint->user->id }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Customer Name:
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->complaint->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Compliant
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->complaint->complaint }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Phone
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->complaint->phone }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Street Address
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->complaint->street_address }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">City</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->complaint->city }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Region</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->complaint->region }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Postal Code</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->complaint->postal_code }}
                            </td>
                        </tr>
                        @if ($task->complaint->status == 'completed' || $task->complaint->status == 'closed')
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Completed Date
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $task->complaint->completed_date }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Completed Note
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $task->complaint->completion_note }}</td>
                            </tr>
                        @endif

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Status</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if ($task->complaint->status == 'pending')
                                    <span class="text-blue-500"> {{ $task->complaint->status }} </span>
                                @elseif ($task->complaint->status == 'quoted')
                                    <span class="text-purple-500"> {{ $task->complaint->status }} </span>
                                @elseif ($task->complaint->status == 'accepted')
                                    <span class="text-green-500"> {{ $task->complaint->status }} </span>
                                @elseif ($task->complaint->status == 'rejected')
                                    <span class="text-red-500"> {{ $task->complaint->status }} </span>
                                @elseif ($task->complaint->status == 'assigned')
                                    <span class="text-orange-500"> {{ $task->complaint->status }} </span>
                                @elseif ($task->complaint->status == 'in progress')
                                    <span class="text-sky-500"> {{ $task->complaint->status }} </span>
                                @elseif ($task->complaint->status == 'completed')
                                    <span class="text-green-700"> {{ $task->complaint->status }} </span>
                                @elseif ($task->complaint->status == 'closed')
                                    <span class="text-green-400"> {{ $task->complaint->status }} </span>
                                @endif
                            </td>
                        </tr>



                    </tbody>
                </table>

                <div class="mt-4">
                    <p><strong>Assigned To:</strong></p>
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($task->complaint->assignees as $assignee)
                                <tr>
                                    <td>{{ $assignee->user->name }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No employees assigned.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <p><strong>Complaint Images:</strong><br></p>
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
                </div>

                @if ($task->complaint->status == 'completed' || $task->complaint->status == 'closed')
                    <div class="mt-4">
                        <p><strong>Completed Images:</strong><br></p>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                            @forelse ($task->complaint->completionImages as $image)
                                <div>
                                    <a href="{{ asset('storage/' . $image->file_path) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $image->file_path) }}" height="250"
                                            class="w-full" alt="Completed Image">
                                    </a>
                                </div>
                            @empty
                                <div>
                                    <p>No completed images uploaded.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="relative mt-6">
            <div class="absolute right-0 top-0 mt-4 flex space-x-2">
                @if ($task->complaint->status == 'assigned')
                    <form method="POST" action="{{ route('employee.task.start', $task->complaint->id) }}"
                        class="inline-block">
                        @csrf
                        @method('PUT')
                        <button type="submit"
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
