<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const isMenuOpen = ref(false)
function toggleMenu()
{
    isMenuOpen.value = !isMenuOpen.value;
}

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50" >
        <img
            id="background"
            class="absolute top-0 left-0 w-full h-full object-cover"
            src="../../../public/background.svg"
        />
        <div
            class="relative min-h-screen flex flex-col items-center selection:bg-[#2b4958] selection:text-white" 
        >
            <div class="relative w-full max-w-2xl lg:max-w-full" >
                <header class="bg-white flex items-center justify-between">
                    <div class="flex-shrink-0 py-2 px-3">
                        <img src="../../../public/logo.png" width="75" alt="Logo">
                    </div>
                    <nav v-if="canLogin" class=" lg:hidden mr-3">
                        <div @click="toggleMenu" class="cursor-pointer font-black space-y-2 z-50 text-black">
                            <span :class="{'transform rotate-45 translate-y-2.5': isMenuOpen}" class="block w-8 h-0.5 bg-black transition-transform"></span>
                            <span :class="{'opacity-0': isMenuOpen}" class="block w-8 h-0.5 bg-black transition-opacity"></span>
                            <span :class="{'transform -rotate-45 -translate-y-2.5': isMenuOpen}" class="block w-8 h-0.5 bg-black transition-transform"></span>
                        </div>

                    </nav>
                    <nav v-if="canLogin" class="hidden lg:flex space-x-4">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent font-bold  transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-gray-800 dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 font-bold  ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-gray-800 dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 font-bold ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-gray-800 dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>


                <div v-if="isMenuOpen" @click.self="toggleMenu" class="fixed inset-0 z-40 bg-black bg-opacity-50 transition-opacity duration-300 ease-in">
                    <div
                        @click.stop
                        class="fixed inset-y-0 right-0 w-full max-w-xs bg-white dark:bg-black transform transition-transform duration-300 ease-in"
                        :class="{'translate-x-0': isMenuOpen, 'translate-x-full': !isMenuOpen}"
                    >
                        <nav class="p-4">
                            <Link
                                v-if="$page.props.auth.user"
                                :href="route('dashboard')"
                                class="block mb-4 text-black dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 rounded p-2"
                            >
                                Dashboard
                            </Link>
                            <Link
                                :href="route('login')"
                                class="block mb-4 text-black dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 rounded p-2"
                            >
                                Log in
                            </Link>
                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="block text-black dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 rounded p-2"
                            >
                                Register
                            </Link>
                        </nav>
                    </div>
                </div>

                <main class="mt-6">
                    Body
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
