<template>
    <div>
        <div class="p-0.5 text-gray-500 font-semibold text-sm">{{ props.label }}</div>
        <textarea
            name="description"
            id="description"
            rows="3"
            class="rounded bg-white border-2 border-gray-200 flex w-full focus:border-purple-400 focus:ring-0 placeholder:text-gray-400 resize-none"
            :placeholder="placeholder"
            :value="modelValue"
            @input="updateValue"
        />
        <p
            class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
            v-if="props.error"
            v-text="props.error"
        ></p>
    </div>
</template>

<script setup>
const props = defineProps({
    label: String,
    placeholder: String,
    modelValue: String,
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const updateValue = (event) => {
    emit('update:modelValue', event.target.value)
}
</script>
