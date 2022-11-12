<template>
    <div class="flex flex-col items-center">
        <div class="w-full flex flex-col items-center">
            <div class="w-full">
                <div class="flex flex-col items-center relative">
                    <div class="w-full">
                        <div class="p-0.5 text-gray-500 font-semibold" v-html="this.label" />
                        <div class="p-1 bg-white flex border-2 border-gray-200 rounded">
                            <div class="flex flex-auto flex-wrap"></div>
                            <input placeholder="Search by name" class="p-1 px-2 appearance-none outline-none w-full text-gray-800" v-model="this.searchString" v-on:keyup="this.searchStringInArray()">
                            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none" type="button" @click="this.openPopup = !this.openPopup">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
                                        <polyline points="18 15 12 9 6 15"></polyline>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="absolute md:mt-20 mt-12 shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-32 overflow-y-auto svelte-5uyqqj" v-show="this.openPopup">
                        <div class="flex flex-col w-full">
                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
                                 v-for="item in this.filteredItems"
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

<script>
export default {
    props: {
        label: null,
        items: Array,
        multipleSelect: false,
    },

    emits: ['select'],

    data() {
        return {
            filteredItems: [],
            selectedItems: [],
            openPopup: false,
            searchString: null,
        }
    },

    mounted() {
        this.filteredItems = this.items;
        this.title = this.name;
    },

    methods: {
        searchStringInArray: function () {
            this.filteredItems = [];
            this.openPopup = true;
            this.items.filter(element => {
                if (element.includes(this.searchString)) {
                    this.filteredItems.push(element);
                    return true;
                }
            });
        },

        select: function (item) {
            this.$emit('select', item);
            if (!this.multipleSelect) {
                this.openPopup = false;
            }
        },

        calculateActiveClass: function (item) {
            if (this.multipleSelect) {
                const index = this.selectedItems.indexOf(item);

                if (index === -1) {
                    return 'bg-white hover:bg-teal-100';
                } else {
                    return 'bg-blue-300 hover:bg-blue-100';
                }
            }
        }
    }
}
</script>
