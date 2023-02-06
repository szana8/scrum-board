<template>
    <h4 class="text-xl antialiased capitalized" v-html="props.title" />
    <p class="text-gray-400 text-sm mt-4" v-html="props.description" />
</template>

<script setup>
const props = defineProps({
    title: String,
    description: String,
})

</script>
