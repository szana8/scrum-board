<template>
    <Link
        :class="{'text-gray-800 cursor-default': active }"
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

