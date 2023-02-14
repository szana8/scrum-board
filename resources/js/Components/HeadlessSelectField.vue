<template>
    <Listbox v-model="selectedValue">
        <ListboxButton>{{ selectedValue }}</ListboxButton>
        <ListboxOptions>
            <ListboxOption
                v-for="value in values"
                :key="value"
                :value="value"
            >
                {{ value }}
            </ListboxOption>
        </ListboxOptions>
    </Listbox>
</template>

<script setup>
import {ref} from 'vue'
import {Listbox, ListboxButton, ListboxOption, ListboxOptions,} from '@headlessui/vue'

const selectedValue = ref(props.values[0])

const props = defineProps({
    label: String,
    placeholder: String,
    modelValue: String,
    error: String,
    values: Array,
})

</script>
