<template>
    <button
        :type="props.type"
        class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased"
    >
        {{ props.text }}
    </button>
</template>

<script setup>
const props = defineProps({
    type: 'submit',
    text: String,
})
</script>
