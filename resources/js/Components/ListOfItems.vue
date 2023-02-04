<template>
    <div class="flex w-full">
        <div class="w-1/3">
            <slot name="description"></slot>
        </div>

        <div class="w-2/3">
            <div class="border border-gray-100 shadow-xl rounded-xl">
                <div class="p-12">
                    <ul class="list-inside" v-if="this.items && this.items.length > 0">
                        <slot />
                    </ul>
                    <div v-else>
                        <div class="bg-blue-100 text-blue-600 p-4 rounded border border-blue-200 font-semibold">
                            <slot name="emptyListDescription" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

defineProps({
    items: Array,
})

</script>
