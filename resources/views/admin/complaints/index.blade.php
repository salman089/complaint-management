<x-app-layout>

    <x-slot:title>View Complaints</x-slot:title>

    <nav x-data="{ open: false }" class="bg-gray-800 pt-6">
        <div class="max-w-7xl mx-auto px-4 px-6 lg:px-8">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        @foreach (['pending', 'quoted', 'accepted', 'rejected', 'assigned', 'completed', 'closed'] as $complaintType)
                            <x-sub-nav-link href="{{ route('admin.complaints.index', ['status' => $complaintType]) }}"
                                :active="$status == $complaintType">
                                {{ ucfirst($complaintType) }} Complaints
                            </x-sub-nav-link>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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

                @if (session('quote'))
                    <div class="bg-purple-500 text-white p-4 rounded">
                        {{ session('quote') }}
                    </div>
                @endif

                <div class="p-6 text-gray-900">
                    @if ($complaints->count() > 0)
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admin.complaints.show', $complaint->id) }}"
                                                class="text-blue-600 hover:text-blue-900">
                                                View 
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center py-10">
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
