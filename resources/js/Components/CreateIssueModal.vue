<template>
    <floating-button
        v-show="show"
        @click="showModal()"
    ></floating-button>
</template>

<script setup>
import {computed} from "vue";
import FloatingButton from './FloatingButton.vue'

const show = computed(() => {
    return true
    // return !usePage().component.startsWith('Settings');
})
</script>
