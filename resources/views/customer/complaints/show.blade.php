<x-app-layout>
    <x-slot name="header">
        <x-slot:title>Complaint Details</x-slot:title>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Complaint Details
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
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Complaint</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $complaint->complaint }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Phone</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $complaint->phone }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Street Address
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $complaint->street_address }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">City</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $complaint->city }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Region</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $complaint->region }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Postal Code
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $complaint->postal_code }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Status</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $complaint->status }}
                                </td>
                            </tr>

                            @if ($complaint->status == 'quoted')
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Quotation
                                        Price</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        ₹{{ number_format($complaint->quote->price, 2) }}</td>
                                </tr>
                            @elseif ($complaint->status == 'rejected')
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Rejected
                                        Reason</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $complaint->reason }}
                                    </td>
                                </tr>
                            @endif
                            @if (
                                $complaint->status != 'rejected' &&
                                    $complaint->status != 'pending' &&
                                    $complaint->status != 'quoted' &&
                                    $complaint->status != 'accepted')
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Assigned
                                        To
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        @forelse ($complaint->assignees as $assignee)
                                            <div>{{ $assignee->user->name }}</div>
                                        @empty
                                            <div>No employees assigned.</div>
                                        @endforelse
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Complaint
                                    Images</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                                        @forelse ($complaint->photos as $photo)
                                            <div>
                                                <a href="{{ asset('storage/' . $photo->file_path) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $photo->file_path) }}"
                                                        height="250" class="w-full" alt="Complaint Image">
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
                            @if ($complaint->status == 'completed' || $complaint->status == 'closed')
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Completed
                                        Images</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <div
                                            class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                                            @forelse ($complaint->completionImages as $image)
                                                <div>
                                                    <a href="{{ asset('storage/' . $image->file_path) }}"
                                                        target="_blank">
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
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="relative mt-6">
                @if ($complaint->status == 'quoted')
                    <div class="flex justify-end space-x-4">
                        <form action="{{ route('customer.accept', $complaint->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to accept this complaint?')"
                                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                Accept
                            </button>

                        </form>
                        <form action="{{ route('customer.reject', $complaint->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to reject this complaint?')"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                Reject
                            </button>
                        </form>
                @endif
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('customer.complaints.index', ['status' => $complaint->status]) }}"
                        class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
