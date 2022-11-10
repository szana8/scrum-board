<template>
    <Link
        :class="{'text-blue-600 border-solid border-blue-600 cursor-default': active, 'border-white': !active }"
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

