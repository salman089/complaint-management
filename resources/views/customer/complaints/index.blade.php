<x-app-layout>
    <x-slot:title>View Complaints</x-slot:title>
    <nav x-data="{ open: false }" class="pt-6 bg-gray-800">
        <div class="px-4 px-6 mx-auto max-w-7xl lg:px-8">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-sub-nav-link href="{{ route('customer.complaints.index') }}" :active="request()->routeIs('customer.complaints.index')">
                            All Complaints</x-sub-nav-link>
                        <x-sub-nav-link href="{{ route('customer.complaints.create') }}" :active="request()->routeIs('customer.complaints.create')"
                            class="flex justify-end text-blue-500">Create Complaint</x-sub-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
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
                                        {{ $complaint->status }}
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
                        <p class="text-sm font-bold leading-6 text-gray-900">No complaints yet.</p>
                    </div>
                @endif
            </div>
        </div>
        <br>
        {{ $complaints->links() }}
    </div>
</x-app-layout>
