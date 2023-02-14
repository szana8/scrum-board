<template>
    <button
        :type="props.type"
        class="bg-white border border-gray-200 text-gray-700 rounded px-3 py-1 antialiased font-bold"
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
