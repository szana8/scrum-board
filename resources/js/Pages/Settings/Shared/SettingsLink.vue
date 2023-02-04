<template>
    <Link
        :class="{'bg-gray-50 cursor-not-allowed': props.active, 'bg-white shadow hover:shadow-xl': !props.active }"
    >
        <slot />
    </Link>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    active: Boolean
});
</script>

