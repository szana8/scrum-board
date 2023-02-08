<template>
    <Link
        :href="route('issue.create.modal')"
        title="Contact Sale"
        class="fixed z-90 bottom-10 right-8 bg-indigo-600 w-14 h-14 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-indigo-500 hover:drop-shadow-2xl click:animate-bounce duration-300"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 4.5v15m7.5-7.5h-15"
            />
        </svg>
    </Link>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'

defineEmits(['click']);
</script>
