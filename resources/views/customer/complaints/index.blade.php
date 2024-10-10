<x-app-layout>
    <x-slot:title>View Complaints</x-slot:title>
    <nav x-data="{ open: false }" class="pt-6 bg-gray-800">
        <div class="px-4 px-6 mx-auto max-w-7xl lg:px-8">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        @foreach (['pending', 'quoted', 'accepted', 'rejected', 'assigned', 'in progress', 'completed', 'closed'] as $complaintType)
                            <x-sub-nav-link href="{{ route('customer.complaints.index', ['status' => $complaintType]) }}"
                                :active="$status == $complaintType">
                                {{ ucfirst($complaintType) }} Complaints
                            </x-sub-nav-link>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <form action="{{ route('customer.complaints.search') }}" method="GET" class="max-w-md mx-auto mt-4">
        <input type="hidden" name="status" value="{{ $status }}">

        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                name="search" value="{{ request()->get('search') }}" placeholder="Search by complaint...." required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="p-4 text-white bg-green-500 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('danger'))
                    <div class="p-4 text-white bg-red-500 rounded">
                        {{ session('danger') }}
                    </div>
                @endif

                <div class="p-6 text-gray-900">
                    @if ($complaints->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Complaint
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Phone
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Address
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($complaints as $complaint)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $complaint->complaint }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $complaint->phone }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $complaint->street_address }}, {{ $complaint->city }},
                                            {{ $complaint->region }} - {{ $complaint->postal_code }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ ucfirst($complaint->status) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                            <a href="{{ route('customer.complaints.show', $complaint->id) }}"
                                                class="text-blue-600 hover:text-blue-900">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="py-10 text-center">
                            <p class="text-sm font-bold leading-6 text-gray-900">No {{ $status }} complaints yet.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
            <br>
            {{ $complaints->links() }}
        </div>
    </div>
</x-app-layout>
