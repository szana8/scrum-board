<template>
    <div>
        <div class="p-0.5 text-gray-500 font-semibold">{{ props.label }}</div>
        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex md:w-4/5 w-2/3">
            <textarea
                name="description"
                id="description"
                rows="3"
                placeholder="Short description of the issue type"
                class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                :placeholder="placeholder"
                :value="modelValue"
                @input="updateValue"
            />
        </div>
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
