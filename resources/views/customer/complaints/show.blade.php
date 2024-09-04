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
                <p><strong>Complaint:</strong><br> {{ $complaint->complaint }}</p>
                <p><strong>Phone:</strong><br> {{ $complaint->phone }}</p>
                <p><strong>Street Address:</strong><br> {{ $complaint->street_address }}</p>
                <p><strong>City:</strong><br> {{ $complaint->city }}</p>
                <p><strong>Region:</strong><br> {{ $complaint->region }}</p>
                <p><strong>Postal Code:</strong><br> {{ $complaint->postal_code }}</p>

                <p><strong>Status:</strong>
                    @if ($complaint->status == 'pending')
                        <span class="text-blue-500"> {{ $complaint->status }} </span>
                    @elseif ($complaint->status == 'quoted')
                        <span class="text-purple-500"> {{ $complaint->status }} </span>
                    @elseif ($complaint->status == 'accepted')
                        <span class="text-green-500"> {{ $complaint->status }} </span>
                    @elseif ($complaint->status == 'rejected')
                        <span class="text-red-500"> {{ $complaint->status }} </span>
                    @endif
                </p>

                @if ($complaint->status == 'quoted')
                    <p><strong>Quotation Price:</strong> ₹{{ number_format($complaint->quote->price, 2) }}</p>
                @elseif ($complaint->status == 'rejected')
                    <p><strong>Rejected Reason:</strong> {{ $complaint->reason }}</p>
                @endif

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
            <a href="{{ route('customer.complaints.index') }}"
                class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                Cancel
            </a>
        </div>
    </div>
    </div>
</x-app-layout>
