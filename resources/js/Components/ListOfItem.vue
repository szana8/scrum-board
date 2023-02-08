<template>
    <li class="w-full flex justify-between space-y-2">
        <slot class="lex items-center space-x-2" />
        <div class="flex space-x-2">
            <a
                href="#"
                v-if="allowEdit"
                class="href text-gray-400 font-semibold text-sm hover:text-gray-300"
                @click="edit(editKey)"
                >Edit</a
            >
            <Link
                v-if="deleteLink"
                :href="deleteLink"
                method="delete"
                as="button"
                preserve-scroll
                class="href text-red-600 font-semibold text-sm"
            >
                Delete
            </Link>
        </div>
    </li>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    deleteLink: String,
    allowEdit: {
        type: Boolean,
        default: false,
    },
    editKey: Object,
})

const emit = defineEmits(['edit'])

function edit(props) {
    emit('edit', props)
}
</script>
