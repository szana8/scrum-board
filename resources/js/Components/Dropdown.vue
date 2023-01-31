<template>
    <div class="relative">
        <button class="z-10 relative flex items-center focus:outline-none select-none" @click="toggleDropdown()">
            <slot name="button"></slot>
        </button>

        <!-- to close when clicked on space around it-->
        <button class="fixed inset-0 h-full w-full cursor-default focus:outline-none" v-if="isOpen()" @click="toggleDropdown()" tabindex="-1"></button>

        <!--dropdown menu-->
        <transition
            enter-active-class="transition-all duration-200 ease-out"
            leave-active-class="transition-all duration-750 ease-in"
            enter-class="opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100"
            leave-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-75"
        >
            <div class="absolute shadow-lg border w-48 rounded py-1 px-2 text-sm mt-4 bg-white z-10"
                 :class="placement === 'right' ? 'right-0' : 'left-0'"
                 v-if="isOpen()">
                <slot name="content"></slot>
            </div>
        </transition>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

const open = ref(false);

defineProps({
    placement: {
        type: String,
        default: 'right',
        validator: (value) => ['right', 'left'].indexOf(value) !== -1,
    }
})

onMounted(() => {
    const onEscape = (e) => {
        if (e.key === 'Esc' || e.key === 'Escape') {
            this.open = false;
        }
    }
    document.addEventListener('keydown', onEscape);
})

function toggleDropdown() {
    this.open = !this.open;
}

function isOpen() {
    return this.open;
}
</script>
