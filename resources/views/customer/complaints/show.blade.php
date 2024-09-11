<x-app-layout>
    <x-slot name="header">
        <x-slot:title>Complaint Details</x-slot:title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Complaint Details
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Complaint</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $complaint->complaint }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Phone</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $complaint->phone }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Street Address
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $complaint->street_address }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">City</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $complaint->city }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Region</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $complaint->region }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Postal Code</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $complaint->postal_code }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Status</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if ($complaint->status == 'pending')
                                    <span class="text-blue-500"> {{ $complaint->status }} </span>
                                @elseif ($complaint->status == 'quoted')
                                    <span class="text-purple-500"> {{ $complaint->status }} </span>
                                @elseif ($complaint->status == 'accepted')
                                    <span class="text-green-500"> {{ $complaint->status }} </span>
                                @elseif ($complaint->status == 'rejected')
                                    <span class="text-red-500"> {{ $complaint->status }} </span>
                                @elseif ($complaint->status == 'assigned')
                                    <span class="text-orange-500"> {{ $complaint->status }} </span>
                                @elseif ($complaint->status == 'in progress')
                                    <span class="text-sky-500"> {{ $complaint->status }} </span>
                                @elseif ($complaint->status == 'completed')
                                    <span class="text-green-700"> {{ $complaint->status }} </span>
                                @elseif ($complaint->status == 'closed')
                                    <span class="text-green-400"> {{ $complaint->status }} </span>
                                @endif
                            </td>
                        </tr>

                        @if ($complaint->status == 'quoted')
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Quotation
                                    Price</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    ₹{{ number_format($complaint->quote->price, 2) }}</td>
                            </tr>
                        @elseif ($complaint->status == 'rejected')
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rejected
                                    Reason</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $complaint->reason }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="mt-4">
                    <p><strong>Complaint Images:</strong><br></p>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                        @forelse ($complaint->photos as $photo)
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

                @if ($complaint->status == 'completed' || $complaint->status == 'closed')
                    <div class="mt-4">
                        <p><strong>Completed Images:</strong><br></p>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                            @forelse ($complaint->completionImages as $image)
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
            @if ($complaint->status == 'quoted')
                <div class="flex justify-end space-x-4">
                    <form action="{{ route('customer.accept', $complaint->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                            Accept
                        </button>
                    </form>
                    <form action="{{ route('customer.reject', $complaint->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                            Reject
                        </button>
                    </form>
            @endif
            <div class="flex justify-end space-x-4">
                <a href="{{ route('customer.complaints.index') }}"
                    class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                    Cancel
                </a>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
