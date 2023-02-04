<template>
    <h4 class="text-xl antialiased capitalized">{{props.title}}</h4>
    <p class="text-gray-400 text-sm mt-4">
        {{ props.description }}
    </p>
</template>

<script setup>
const props = defineProps({
    title: String,
    description: String,
})

</script>
