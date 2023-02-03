<template>
    <div class="flex flex-col items-center">
        <div class="w-full flex flex-col items-center">
            <div class="w-full">
                <div class="flex flex-col items-center relative">
                    <div class="w-full">
                        <div class="p-0.5 text-gray-500 font-semibold" v-html="props.label" />
                        <div class="p-1 bg-white flex border-2 border-gray-200 rounded">
                            <div class="flex flex-auto flex-wrap"></div>
                            <input placeholder="Search by name" class="p-1 px-2 appearance-none outline-none w-full text-gray-800" v-model="state.searchString" v-on:keyup="searchStringInArray()">
                            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none" type="button" @click="state.openPopup = !state.openPopup">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
                                        <polyline points="18 15 12 9 6 15"></polyline>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="absolute md:mt-20 mt-12 shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-32 overflow-y-auto svelte-5uyqqj" v-show="state.openPopup">
                        <div class="flex flex-col w-full">
                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
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

import {onMounted, reactive} from "vue";

const props = defineProps({
    label: null,
    items: Array,
    multipleSelect: false,
})

const emit = defineEmits(['select']);

defineExpose({ refreshSearchItem, refreshSelectedItems, closeDropdown });

const state = reactive({
    filteredItems: [],
    selectedItems: [],
    openPopup: false,
    searchString: null,
});

onMounted(() => {
    state.filteredItems = props.items;
})

function searchStringInArray () {
    state.filteredItems = [];
    state.openPopup = true;
    props.items.filter(element => {
        if (element.includes(state.searchString)) {
            state.filteredItems.push(element);
            return true;
        }
    });
}

function select (item) {
    emit('select', item);
    if (!props.multipleSelect) {
        state.openPopup = false;
    }
}

function refreshSearchItem(searchItem) {
    state.searchString = searchItem;
}

function refreshSelectedItems(selectedItems) {
    state.selectedItems = selectedItems;
}

function closeDropdown() {
    state.openPopup = false;
}

function calculateActiveClass (item) {
    if (props.multipleSelect) {
        const index = state.selectedItems.indexOf(item);

        if (index === -1) {
            return 'bg-white hover:bg-teal-100';
        } else {
            return 'bg-blue-300 hover:bg-blue-100';
        }
    }
}

</script>
