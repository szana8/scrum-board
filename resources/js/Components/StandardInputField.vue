<template>
    <div>
        <div class="p-0.5 text-gray-500 font-semibold">{{ label }}</div>
        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex md:w-4/5 w-2/3">
            <input
                class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                :type="type"
                :placeholder="placeholder"
                :value="modelValue"
                @input="updateValue"
            />
        </div>
        <p
            class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
            v-if="error"
            v-text="error"
        ></p>
    </div>
</template>

<script setup>
defineProps({
    label: String,
    placeholder: String,
    modelValue: String,
    error: String,
    type: {
        type: String,
        default: 'text',
    }
})

const emit = defineEmits(['update:modelValue'])

const updateValue = (event) => {
    emit('update:modelValue', event.target.value)
}
</script>
