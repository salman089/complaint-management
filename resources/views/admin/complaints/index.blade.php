<x-app-layout>
    <x-slot:title>View Complaints</x-slot:title>
    <nav x-data="{ open: false }" class="bg-gray-800 pt-6">
        <div class="max-w-7xl mx-auto px-4 px-6 lg:px-8">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        @foreach (['pending', 'quoted', 'accepted', 'rejected', 'assigned'] as $complaintType)
                            <x-sub-nav-link href="{{ route('admin.complaints.index', ['status' => $complaintType]) }}" :active="$status == $complaintType">
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
                        <ul role="list" class="divide-y divide-gray-100">
                            @foreach ($complaints as $complaint)
                                <li class="flex justify-between gap-x-6 py-5">
                                    <div class="flex min-w-0 gap-x-4">
                                        <div class="px-10 flex-auto">
                                            <p class="text-lg font-semibold leading-6 text-gray-900">
                                                {{ $complaint->complaint }}</p>
                                            <p class="mt-1 truncate text-sm leading-5 text-gray-500">
                                                {{ $complaint->phone }}</p>
                                            <p class="mt-1 truncate text-sm leading-5 text-gray-500">
                                                {{ $complaint->street_address }}</p>
                                            <p class="mt-1 truncate text-sm leading-5 text-gray-500">
                                                {{ $complaint->city }}, {{ $complaint->region }}
                                                {{ $complaint->postal_code }}</p>
                                        </div>
                                    </div>

                                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end justify-center px-6">
                                        <a href="{{ route('admin.complaints.show', $complaint->id) }}"
                                            class="text-sm text-white hover:text-white border bg-blue-500 hover:bg-blue-700 px-3 py-2.5 rounded-lg transition-colors duration-300">View
                                            Details</a>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center py-10">
                            <p class="text-sm font-bold leading-6 text-gray-900">No {{  $status }} complaints yet.</p>
                        </div>
                    @endif
                </div>
            </div>
            <br>
            {{ $complaints->links() }}
        </div>
    </div>
</x-app-layout>
