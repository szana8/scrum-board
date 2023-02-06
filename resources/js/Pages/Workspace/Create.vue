<script setup>
import { useForm } from '@inertiajs/vue3'
import Modal from '../../Shared/Modal'

const form = useForm({
    name: null,
    description: null,
    icon: 'test',
    type: 'SOFTWARE',
})
const create = () => form.post('/projects')
</script>

<template>
    <Modal>
        <template #title>Create Project</template>
        <div class="w-full">
            <form
                class="mt-6"
                @submit.prevent="create"
            >
                <div class="p-0.5 text-gray-500 font-semibold">Name</div>
                <div class="rounded-xl p-0.5 border-2 border-gray-300">
                    <input
                        class="w-11/12 bg-white py-3 px-4 border-0 focus:border-transparent focus:ring-0 placeholder:text-gray-400"
                        type="text"
                        placeholder="Project name"
                        v-model="form.name"
                    />
                </div>
                <p
                    class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                    v-if="form.errors.name"
                    v-text="form.errors.name"
                ></p>

                <div class="p-0.5 text-gray-500 font-semibold">Description</div>
                <div class="rounded-xl p-0.5 border-2 border-gray-300">
                    <input
                        class="w-11/12 bg-white py-3 px-4 border-0 focus:border-transparent focus:ring-0 placeholder:text-gray-400"
                        type="text"
                        placeholder="Project name"
                        v-model="form.description"
                    />
                </div>
                <p
                    class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                    v-if="form.errors.description"
                    v-text="form.errors.description"
                ></p>

                <div class="mt-6 flex justify-between">
                    <button
                        class="ml-auto py-2 px-2 text-sm rounded-xl bg-indigo-400 shadow-md text-white font-bold hover:bg-indigo-600"
                        type="submit"
                    >
                        Create
                    </button>
                </div>
            </form>
        </div>
    </Modal>
</template>
