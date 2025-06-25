<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 shadow-md">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-5">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="h-9 w-auto fill-gray-700 dark:fill-gray-300" />
                </a>

                <!-- Nombre app sin enlace -->
                <div class="text-2xl font-semibold text-gray-800 dark:text-gray-300 select-none tracking-wide">
                    Product App
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-8 ml-12">
                    <x-nav-link 
                        :href="route('categories.index')" 
                        :active="request()->routeIs('categories.*')" 
                        class="text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 transition font-medium tracking-wide no-underline"
                    >
                        {{ __('Categories') }}
                    </x-nav-link>
                    <x-nav-link 
                        :href="route('products.index')" 
                        :active="request()->routeIs('products.*')" 
                        class="text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 transition font-medium tracking-wide no-underline"
                    >
                        {{ __('Products') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                        >
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-2 h-4 w-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link 
                                :href="route('logout')" 
                                onclick="event.preventDefault(); this.closest('form').submit();" 
                                class="hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile menu button -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" 
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="pt-4 pb-3 space-y-1">
            <x-responsive-nav-link 
                :href="route('categories.index')" 
                :active="request()->routeIs('categories.*')" 
                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 transition rounded-md font-medium"
            >
                {{ __('Categories') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link 
                :href="route('products.index')" 
                :active="request()->routeIs('products.*')" 
                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 transition rounded-md font-medium"
            >
                {{ __('Products') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-4 border-t border-gray-200 dark:border-gray-700">
            <div class="px-4">
                <div class="font-semibold text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1 px-4">
                <x-responsive-nav-link 
                    :href="route('profile.edit')" 
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 rounded-md font-medium"
                >
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link 
                        :href="route('logout')" 
                        onclick="event.preventDefault(); this.closest('form').submit();" 
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 rounded-md font-medium"
                    >
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
