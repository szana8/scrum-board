<template>
    <Link
        :class="{'bg-gray-50 cursor-not-allowed': active, 'bg-white shadow hover:shadow-xl': !active }"
    >
        <slot />
    </Link>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    active: Boolean
});
</script>

