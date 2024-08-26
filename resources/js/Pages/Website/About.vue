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
