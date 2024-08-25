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
            <div class="relative w-full  lg:max-w-full" >
                <header class="bg-white flex items-center justify-between">
                    <div class="flex-shrink-0 py-2 px-3 flex items-center">
                        <img src="../../../public/logo.png" width="50" alt="Logo">
                        <div class="text-3xl font-extrabold leading-none tracking-tight text-blue-500 md:text-2xl lg:text-4xl">AFMOZ</div>
                    </div>
                    <nav>
                        <ul class="flex flex-col md:flex-row md:space-x-4 space-y-2 md:space-y-0 navbar-nav">
                        <li>
                            <a href="https://www.afmintl.org" class="text-gray-700 hover:text-blue-600">Home</a>
                        </li>
                        <li>
                            <a href="/p/about-us" class="text-gray-700 hover:text-blue-600">About</a>
                        </li>
                        <li class="relative group">
                            <a href="https://www.afmintl.org/team" class="text-gray-700 hover:text-blue-600">Team</a>
                            <ul class="absolute left-0 hidden group-hover:block bg-white shadow-lg p-2 space-y-2 mt-2 sub-menu">
                            <li>
                                <a href="/team" class="text-gray-700 hover:text-blue-600">Leadership Team</a>
                            </li>
                            <li>
                                <a href="/sisters" class="text-gray-700 hover:text-blue-600">Sisters Team</a>
                            </li>
                            <li>
                                <a href="/youth" class="text-gray-700 hover:text-blue-600">Youth Team</a>
                            </li>
                            <li>
                                <a href="/children" class="text-gray-700 hover:text-blue-600">Children Team</a>
                            </li>
                            <li>
                                <a href="/bizforum" class="text-gray-700 hover:text-blue-600">Biz-Forum Team</a>
                            </li>
                            <li>
                                <a href="/education" class="text-gray-700 hover:text-blue-600">Education Team</a>
                            </li>
                            </ul>
                        </li>
                        <li class="relative group">
                            <a href="https://www.afmintl.org/service" class="text-gray-700 hover:text-blue-600">Ministries</a>
                            <ul class="absolute left-0 hidden group-hover:block bg-white shadow-lg p-2 space-y-2 mt-2 sub-menu">
                            <li>
                                <a href="/service/youth-ministry" class="text-gray-700 hover:text-blue-600">Youth Ministry</a>
                            </li>
                            <li>
                                <a href="/service/childrens-ministry" class="text-gray-700 hover:text-blue-600">Children’s Ministry</a>
                            </li>
                            <li>
                                <a href="/service/sisters-fellowship" class="text-gray-700 hover:text-blue-600">Sisters Fellowship</a>
                            </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/churches" class="text-gray-700 hover:text-blue-600">Churches</a>
                        </li>
                        <li>
                            <a href="https://www.afmintl.org/sermon" class="text-gray-700 hover:text-blue-600">Sermon</a>
                        </li>
                        <li>
                            <a href="https://afmtv.org/" class="text-gray-700 hover:text-blue-600">AFM TV</a>
                        </li>
                        <li>
                            <a href="https://www.afmintl.org/events" class="text-gray-700 hover:text-blue-600">Events</a>
                        </li>
                        <li>
                            <a href="https://www.afmintl.org/products" class="text-gray-700 hover:text-blue-600">Shop</a>
                        </li>
                        <li class="relative group">
                            <a href="/blog" class="text-gray-700 hover:text-blue-600">Media</a>
                            <ul class="absolute left-0 hidden group-hover:block bg-white shadow-lg p-2 space-y-2 mt-2 sub-menu">
                            <li>
                                <a href="https://www.afmintl.org/blog" class="text-gray-700 hover:text-blue-600">News</a>
                            </li>
                            <li>
                                <a href="https://www.afmintl.org/image-gallery" class="text-gray-700 hover:text-blue-600">Gallery</a>
                            </li>
                            <li>
                                <a href="/assets/uploads/attachment/Presidential_Pastoral_Letter.pdf" class="text-gray-700 hover:text-blue-600">Presidential Pastoral Letter</a>
                            </li>
                            </ul>
                        </li>
                        <li class="relative group">
                            <a href="/contact" class="text-gray-700 hover:text-blue-600">Contacts</a>
                            <ul class="absolute left-0 hidden group-hover:block bg-white shadow-lg p-2 space-y-2 mt-2 sub-menu">
                            <li>
                                <a href="/contact" class="text-gray-700 hover:text-blue-600">Contact Us</a>
                            </li>
                            </ul>
                        </li>
                        </ul>
                    </nav>
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

                <main class="">
                    

                    <div class="relative w-full h-[700px] flex items-center justify-center bg-cover bg-center" style="background-image: url(https://www.afmintl.org/assets/uploads/media-uploader/slide011619394499.jpg); " >
                        <div class="absolute inset-0">
                            <div class="w-full h-full flex flex-col items-center justify-center text-center">
                            <div class="text-5xl font-bold text-white translate-x-12 opacity-0 animate-fade-in-up-delay custom-outline">
                                AFMOZ
                            </div>
                            <div class="text-5xl font-bold text-white translate-x-12 opacity-0 animate-fade-in-up-delay-1 custom-outline">
                                Apostolic Faith Mission of Zimbabwe
                            </div>
                            <div class="mt-4 flex items-center justify-center text-lg text-white translate-x-12 opacity-0 animate-fade-in-up-delay-2">
                                <span class="inline-block font-medium animate-typewriter">
                                "A member of AFM international"
                                </span>
                            </div>
                            <p class="mt-4 text-base font-medium text-white translate-x-12 opacity-0 animate-fade-in-up-delay-3 ">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi reiciendis est omnis fugit? Quae accusantium consectetur labore perspiciatis quos ullam!
                            </p>
                            <div class="mt-8 flex gap-4">
                                <a href="/about" class="px-4 py-2 bg-white text-black font-semibold rounded hover:bg-gray-200 transition-opacity opacity-0 animate-fade-in-up-delay-4">
                                About AFMOZ
                                </a>
                                <a href="/homegoing-celebrations" class="px-4 py-2 bg-white text-black font-semibold rounded hover:bg-gray-200 hidden lg:block opacity-0 animate-fade-in-up-delay-5">
                                Homegoing Recap
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>

<style>
 @keyframes fade-in-up {
    0% {
      transform: translateY(50px);
      opacity: 0;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }

  .animate-fade-in-up-delay {
    animation: fade-in-up 1.5s ease-out 0.2s forwards;
  }
  
  .animate-fade-in-up-delay-1 {
    animation: fade-in-up 1.5s ease-out 0.5s forwards;
  }
  
  .animate-fade-in-up-delay-2 {
    animation: fade-in-up 1.5s ease-out 0.8s forwards;
  }
  
  .animate-fade-in-up-delay-3 {
    animation: fade-in-up 1.5s ease-out 1.2s forwards;
  }
  
  .animate-fade-in-up-delay-4 {
    animation: fade-in-up 1.5s ease-out 2.5s forwards;
  }

  .animate-fade-in-up-delay-5 {
    animation: fade-in-up 1.5s ease-out 3.1s forwards;
  }

  @keyframes typewriter {
    from {
      width: 0;
    }
    to {
      width: 100%;
    }
  }

  .animate-typewriter {
    overflow: hidden;
    border-right: 2px solid white;
    white-space: nowrap;
    animation: typewriter 2.5s steps(40) 1.5s forwards;
  }
  .custom-outline {
  text-shadow: 
    -1px -1px 0 #000,  
     1px -1px 0 #000,
    -1px  1px 0 #000,
     1px  1px 0 #000;
}
</style>
