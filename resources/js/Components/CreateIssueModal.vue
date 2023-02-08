<template>
    <floating-button
        v-show="show"
        @click="showModal()"
    ></floating-button>
</template>

<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/vue3";
import FloatingButton from './FloatingButton.vue'

const show = computed(() => {
    return !usePage().component.startsWith('Settings');
})
</script>
