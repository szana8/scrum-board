<template>
    <standard-button
        :type="props.type"
        class="bg-purple-600 border-0 !text-white rounded px-3 py-1 uppercase antialiased font-bold"
        :text="props.text"
    />
</template>

<script setup>
import StandardButton from "./StandardButton.vue";

const props = defineProps({
    type: 'submit',
    text: String,
})
</script>
