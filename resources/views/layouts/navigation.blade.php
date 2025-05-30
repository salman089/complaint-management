<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="px-4 px-6 mx-auto max-w-7xl lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="w-20 h-12 text-gray-500 fill-current0" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                        @php
                            if (auth()->user()->hasRole('admin')) {
                                $dashboardRoute = route('admin.home');
                                $isActive = request()->routeIs('admin.home');
                            } elseif (auth()->user()->hasRole('employee')) {
                                $dashboardRoute = route('employee.home');
                                $isActive = request()->routeIs('employee.home');
                            } elseif (auth()->user()->hasRole('customer')) {
                                $dashboardRoute = route('customer.home');
                                $isActive = request()->routeIs('customer.home');
                            } else {
                                $dashboardRoute = route('home');
                                $isActive = request()->routeIs('home');
                            }
                        @endphp

                        <x-nav-link :href="$dashboardRoute" :active="$isActive">
                            Dashboard
                        </x-nav-link>
                    @endauth

                    @if (auth()->user()->hasRole('customer'))
                    <x-nav-link :href="route('customer.complaints.index')" :active="request()->routeIs('customer.complaints.index')">
                        Complaints
                    </x-nav-link>
                    <x-nav-link :href="route('customer.complaints.create')" :active="request()->routeIs('customer.complaints.create')">
                        Create Complaint
                    </x-nav-link>
                    <x-nav-link :href="route('customer.contact')" :active="request()->routeIs('customer.contact')">
                        Contact Us
                    </x-nav-link>
                    <x-nav-link :href="route('customer.about')" :active="request()->routeIs('customer.about')">
                        About Us
                    </x-nav-link>
                    @endif

                    @if (auth()->user()->hasRole('admin'))
                    <x-nav-link :href="route('admin.complaints.index')" :active="request()->routeIs('admin.complaints.*')">
                        Complaints
                    </x-nav-link>
                    <x-nav-link :href="route('admin.customers.index')" :active="request()->routeIs('admin.customers.*')">
                        Customers
                    </x-nav-link>
                    <x-nav-link :href="route('admin.employees.index')" :active="request()->routeIs('admin.employees.*')">
                        Employees
                    </x-nav-link>
                    @endif

                    @if (auth()->user()->hasRole('employee'))
                    <x-nav-link :href="route('employee.tasks.index')" :active="request()->routeIs('employee.tasks.index')">
                        Tasks
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
