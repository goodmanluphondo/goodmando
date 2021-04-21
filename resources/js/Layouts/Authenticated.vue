<template>
    <div class="font-fira text-sm h-screen antialiased p-2 sm:p-14 bg-blue-600 text-gray-600">
        <div class="w-full h-full flex flex-col rounded-lg shadow overflow-hidden bg-white">
            <div class="sm:flex-shrink-0 w-full">
                <!-- Page Heading -->
                <header class="w-full h-16 flex flex-row items-center shadow mb-4">
                    <div class="flex-1 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            <inertia-link href="/tasks">
                                Goodman.do
                            </inertia-link>
                        </h2>
                    </div>

                    <!-- Search Box -->
                    <div class="hidden sm:flex-1">
                        <div class="relative">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 width-6 top-2 left-2 absolute text-blue-400 transform rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input type="text" class="w-full pl-10 bg-blue-50 border-0 rounded-2xl text-sm text-blue-400" placeholder="Search">
                            </div>
                        </div>
                    </div>

                    <!-- Account Management -->
                    <div class="flex-1 ">
                        <div class="grid col-auto pr-6">
                            <div class="place-self-end">
                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                    <!-- Settings Dropdown -->
                                    <div class="ml-3 relative">
                                        <breeze-dropdown align="right" width="48">
                                            <template #trigger>
                                                <span class="inline-flex rounded-md">
                                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                        {{ $page.props.auth.user.name }}

                                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            </template>

                                            <template #content>
                                                <breeze-dropdown-link :href="route('logout')" method="post" as="button">
                                                    Log Out
                                                </breeze-dropdown-link>
                                            </template>
                                        </breeze-dropdown>
                                    </div>
                                </div>

                                <!-- Hamburger -->
                                <div class="-mr-2 flex items-center sm:hidden">
                                    <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                            <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Responsive Navigation Menu -->
                <div :class="{'absolute': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class=" sm:hidden bg-white z-10 mx-2 left-0 right-0">
                    <div class="pt-2 pb-3 space-y-1">
                        <breeze-responsive-nav-link>
                            <inertia-link href="/tasks">Dashboard</inertia-link>
                        </breeze-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <breeze-responsive-nav-link>
                            <inertia-link href="/tasks">Inbox</inertia-link>
                        </breeze-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <breeze-responsive-nav-link>
                            <inertia-link href="/tasks/today">Today</inertia-link>
                        </breeze-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <breeze-responsive-nav-link>
                            <inertia-link href="/tasks/completed">Completed</inertia-link>
                        </breeze-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <breeze-responsive-nav-link>
                            <inertia-link href="/tasks/upcoming">Upcoming</inertia-link>
                        </breeze-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.auth.user.name }} (Logged in)
                            </div>
                            
                        </div>

                        <div class="mt-3 space-y-1">
                            <breeze-responsive-nav-link :href="route('logout')" method="post" as="button">
                                Log Out
                            </breeze-responsive-nav-link>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex-1 overflow-hidden">
                <!-- Page Content -->
                <main class="w-full h-full flex flew-row p-4 pb-8 overflow-hidden">
                    <div class="hidden sm:block w-60 sm:px-6 lg:px-8 overflow-hidden border-r">
                        <ul>
                            <li class="py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <inertia-link href="/tasks">Inbox</inertia-link>
                            </li>
                            <li class="py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                                <inertia-link href="/tasks/today">Today</inertia-link>
                            </li>
                            <li class="py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                                <inertia-link href="/tasks/completed">Completed</inertia-link>
                            </li>
                            <li class="py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <inertia-link href="/tasks/upcoming">Upcoming</inertia-link>
                            </li>
                        </ul>
                    </div>
                    <div ref="canvas" class="w-full h-full pl-0 sm:pl-12 pr-0 sm:pr-4 overflow-y-auto">
                        <slot />
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,500;1,600;1,700&display=swap');
</style>

<script>
    import BreezeApplicationLogo from '@/Components/ApplicationLogo'
    import BreezeDropdown from '@/Components/Dropdown'
    import BreezeDropdownLink from '@/Components/DropdownLink'
    import BreezeNavLink from '@/Components/NavLink'
    import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink'

    export default {
        components: {
            BreezeApplicationLogo,
            BreezeDropdown,
            BreezeDropdownLink,
            BreezeNavLink,
            BreezeResponsiveNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
    }
</script>
