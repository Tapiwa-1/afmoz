<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';


const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <nav class="hidden  bg-white border-r border-gray-200 w-64 p-4 md:flex md:flex-col justify-between fixed inset-y-0 left-0">
            <!-- Left Side - Navigation Menu -->
            <div class="">
                <!-- Logo -->
                <div class="flex items-center mb-8">
                    <Link class="flex items-center" :href="route('dashboard')">
                        <img src="/logo.png" alt="Logo" class="h-8 w-auto" />
                        <div class="ml-2 text-2xl font-extralight ">AFMOZ</div>
                        
                    </Link>
                </div>

                <!-- Navigation Links -->
                <div class="flex flex-col space-y-4">
                    <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Dashboard
                    </NavLink>
                    <NavLink :href="route('dashboard')" >
                        Church
                    </NavLink>
                    <NavLink :href="route('dashboard')" >
                        Notices
                    </NavLink>
                    <NavLink :href="route('dashboard')" >
                        News
                    </NavLink>
                   
                </div>
            </div>

            <!-- Bottom Left - Profile and Logout -->
            <div class="mt-8 sm:mt-0">
                <div class="text-gray-700 mb-4">{{ $page.props.auth.user.name }}</div>
                <NavLink :href="route('profile.edit')" :active="route().current('profile.edit')">
                        Profile
                </NavLink>
                <NavLink class="bg-red-500 hover:bg-red-900 hover:text-white" :href="route('logout')" method="post" as="button">
                    Log Out
                </NavLink>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="md:flex-1 md:ml-64 p-4">
            <div @click="showingNavigationDropdown = !showingNavigationDropdown" class="sm:hidden cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </div>
            <slot />
        </main>

        <!-- Mobile Navigation Dropdown -->
        <div
            :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }"
            class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 p-4 sm:hidden"
        >
            <div class="flex flex-col space-y-4">
                <Link href="#" class="text-gray-700 hover:bg-gray-200 rounded-lg p-2">Link 1</Link>
                <Link href="#" class="text-gray-700 hover:bg-gray-200 rounded-lg p-2">Link 2</Link>
                <Link href="#" class="text-gray-700 hover:bg-gray-200 rounded-lg p-2">Link 3</Link>
            </div>
            <div class="mt-8">
                <div class="text-gray-700 mb-4">Admin Name</div>
                <Link href="#" class="text-gray-700 hover:bg-gray-200 rounded-lg p-2 block">Profile</Link>
                <Link href="#" class="text-gray-700 hover:bg-gray-200 rounded-lg p-2 block">Logout</Link>
            </div>
        </div>
    </div>
</template>
