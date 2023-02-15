<template>
    <button
        :type="type"
        class="bg-white border border-gray-200 text-gray-700 rounded px-3 py-1 antialiased font-bold"
    >
        {{ text }}
    </button>
</template>

<script setup>
defineProps({
    type: 'submit',
    text: String,
})
</script>
