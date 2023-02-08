<template>
    <div class="flex flex-col items-center">
        <div class="w-full flex flex-col items-center">
            <div class="w-full">
                <button
                    class="fixed inset-0 h-full w-full cursor-default focus:outline-none"
                    v-if="isOpen()"
                    @click="closeDropdown()"
                    tabindex="-1"
                    type="button"
                ></button>

                <div class="flex flex-col items-center relative">
                    <div class="w-full">
                        <div
                            class="p-0.5 text-gray-500 font-semibold"
                            v-html="props.label"
                        />
                        <div class="p-1 bg-white flex border-2 border-gray-200 rounded">
                            <div class="flex flex-auto flex-wrap"></div>
                            <input
                                placeholder="Search by name"
                                class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                                v-model="state.searchString"
                                v-on:keyup="searchStringInArray()"
                            />
                            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                <button
                                    class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none"
                                    type="button"
                                    @click="toggleDropdown()"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4" v-if="isOpen()">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                    </svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4" v-else>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute md:mt-20 mt-12 shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-32 overflow-y-auto svelte-5uyqqj"
                        v-show="isOpen()"
                    >
                        <div class="flex flex-col w-full">
                            <div
                                class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
                                v-for="item in state.filteredItems"
                                @click="select(item)"
                                :class="calculateActiveClass(item.id)"
                            >
                                <slot :item="item" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, reactive} from 'vue'

const props = defineProps({
    label: null,
    items: Array,
    multipleSelect: false,
})

const emit = defineEmits(['select'])

defineExpose({ refreshSearchItem, refreshSelectedItems, closeDropdown })

const state = reactive({
    filteredItems: [],
    selectedItems: [],
    openPopup: false,
    searchString: null,
})

onMounted(() => {
    state.filteredItems = props.items
})

function searchStringInArray() {
    state.filteredItems = []
    state.openPopup = true
    props.items.filter((element) => {
        if (element.includes(state.searchString)) {
            state.filteredItems.push(element)
            return true
        }
    })
}

function select(item) {
    emit('select', item)
    if (!props.multipleSelect) {
        closeDropdown()
    }
}

function refreshSearchItem(searchItem) {
    state.searchString = searchItem
}

function refreshSelectedItems(selectedItems) {
    state.selectedItems = selectedItems
}

function isOpen() {
    return state.openPopup;
}

function closeDropdown() {
    state.openPopup = false
}

function toggleDropdown() {
    state.openPopup = !state.openPopup;
}

function calculateActiveClass(item) {
    if (props.multipleSelect) {
        const index = state.selectedItems.indexOf(item)

        if (index === -1) {
            return 'bg-white hover:bg-teal-100'
        } else {
            return 'bg-blue-300 hover:bg-blue-100'
        }
    }
}
</script>
