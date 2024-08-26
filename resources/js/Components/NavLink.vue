<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center w-full bg-blue-600 rounded p-2 text-sm  leading-5 text-white focus:outline-none transition duration-150 ease-in-out'
        : 'inline-flex items-center w-full rounded  border-transparent p-2 text-sm leading-5 text-gray-900 hover:text-gray-700 hover:bg-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
