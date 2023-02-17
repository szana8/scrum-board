<template>
    <div class="m-auto" v-if="message">
        <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg">
            <div class="flex items-center space-x-2">
                <div class="bg-green-300 text-white rounded-full p-1.5" v-if="type === 'success'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>

                <div class="bg-red-300 text-white rounded-full p-1.5" v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>

                <div class="ml-2 mr-6">
                    <span class="font-semibold" v-html="message" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
import {usePage} from "@inertiajs/vue3";

const props = defineProps({
    message: String,
    type: String,
})

const showNotification = ref(false)

onMounted(() => {
    showNotification.value = true;
    setTimeout(() => {
        usePage().props.flash.message = null
        usePage().props.flash.type = null
    }, 2000);
})
</script>
