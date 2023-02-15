<template>
    <div>
        <div class="p-0.5 text-gray-500 font-semibold text-sm">{{ label }}<span v-if="required"> *</span></div>
        <select
            :value="modelValue"
            @input="updateValue"
            class="rounded bg-white px-3 py-2 border-2 border-gray-200 flex w-full focus:border-purple-400 focus:ring-0 placeholder:text-gray-400"
        >
            <option class="text-gray-400">{{placeholder}}</option>
            <option v-for="value in values" :key="value">{{value}}</option>
        </select>
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
    values: Array,
    required: {
        type: Boolean,
        default: false
    },
})

const emit = defineEmits(['update:modelValue'])

const updateValue = (event) => {
    emit('update:modelValue', event.target.value)
}
</script>
