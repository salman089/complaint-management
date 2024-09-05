<x-app-layout>
    <x-slot:title>View Complaints</x-slot:title>
    <nav x-data="{ open: false }" class="bg-gray-800 pt-6">
        <div class="max-w-7xl mx-auto px-4 px-6 lg:px-8">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-sub-nav-link href="{{ route('employee.tasks.index') }} :status => 'pending'">Tasks</x-sub-nav-link>
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

                <div class="p-6 text-gray-900">
                </div>

                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end justify-center px-6">


                </div>

                <div class="text-center py-10">
                </div>
            </div>
        </div>
        <br>
    </div>
    </div>
</x-app-layout>
