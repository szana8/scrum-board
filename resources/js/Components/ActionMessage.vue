<template>
    <div class="m-auto" v-if="message">
        <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg">
            <div class="flex flex-row">
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
    message: String
})

const showNotification = ref(false)

onMounted(() => {
    showNotification.value = true;
    setTimeout(() => usePage().props.flash.message = null, 2000);
})
</script>
