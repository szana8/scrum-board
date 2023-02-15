<template>
    <div class="flex w-full items-center text p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
        <div class="w-6 flex flex-col items-center" v-if="icon">
            <div class="flex relative w-5 h-5 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full">
                <img
                    class="rounded-full"
                    :src="icon"
                />
            </div>
        </div>
        <div class="w-full items-center flex">
            <div class="mx-2 -mt-1">
                {{ text }}
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    icon: String,
    text: String,
})
</script>
