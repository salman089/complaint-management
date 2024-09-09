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
                <p><strong>Customer Id:</strong> {{ $task->complaint->user->id }}</p>
                <p><strong>Customer Name:</strong> {{ $task->complaint->user->name }}</p>
                <p><strong>Complaint:</strong> {{ $task->complaint->complaint }}</p>
                <p><strong>Phone:</strong> {{ $task->complaint->phone }}</p>
                <p><strong>Street Address:</strong> {{ $task->complaint->street_address }}</p>
                <p><strong>City:</strong> {{ $task->complaint->city }}</p>
                <p><strong>Region:</strong> {{ $task->complaint->region }}</p>
                <p><strong>Postal Code:</strong> {{ $task->complaint->postal_code }}</p>

                <p><strong>Status:</strong>
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
                        <span class="text-green-800"> {{ $task->complaint->status }} </span>
                    @endif
                </p>

                @if ($task->complaint->status == 'quoted')
                    <p><strong>Quotation Price:</strong> ₹{{ number_format($task->complaint->quote->price, 2) }}</p>
                @elseif ($task->complaint->status == 'rejected')
                    <p><strong>Rejected Reason:</strong> {{ $task->complaint->reason }}</p>
                @endif

                <div class="mt-4 ">
                    <p><strong>Assigned To:</strong><br></p>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                        @forelse ($task->complaint->assignees as $assignee)
                            <div>
                                {{ $assignee->user->name }}
                            </div>
                        @empty
                            <div>
                                <p>No employees assigned.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="mt-4 ">
                    <p><strong>Complaint Images:</strong><br></p>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                        @forelse ($task->complaint->photos as $photo)
                            <div>
                                <a href="{{ asset('storage/' . $photo->file_path) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $photo->file_path) }}" target="_blank"
                                        height="250" class="w-fill">
                                </a>
                            </div>
                        @empty
                            <div>
                                <p>No images uploaded.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="relative">
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
                        class="inline-block">
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
