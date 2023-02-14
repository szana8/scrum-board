<template>
    <standard-button
        :type="props.type"
        :text="props.text"
        class="!bg-slate-800 !text-white rounded px-3 py-1 uppercase antialiased font-bold"
    />
</template>

<script setup>
import StandardButton from "./StandardButton.vue";

const props = defineProps({
    type: 'submit',
    text: String,
})
</script>
