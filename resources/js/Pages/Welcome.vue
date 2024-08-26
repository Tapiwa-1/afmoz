<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Navigation from '@/Layouts/Navigation.vue';

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

</script>

<template>
    <Head title="Welcome" />
    <Navigation :can-login="canLogin" :can-register="canRegister" :php-version="phpVersion" :laravel-version="laravelVersion">
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
    </Navigation>
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
