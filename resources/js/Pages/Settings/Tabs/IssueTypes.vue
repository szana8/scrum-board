<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">

                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Create Issue Types</h4>
                    <p class="text-gray-400 text-sm mt-4 mr-6">
                        Since <b>Tassking.io</b> tracks all the tasks, the sub-tasks or even a work as an Issue, there are several types of Issues to identify the work and categorize the similar issues.
                    </p>
                </div>

                <div class="w-2/3">
                    <form class="mt-8" method="POST" @submit.prevent="submit">
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Name</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Name of the issue type" v-model="issueTypeForm.name" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="issueTypeForm.errors.name" v-text="issueTypeForm.errors.name"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Description</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <textarea name="description" id="description" rows="3" placeholder="Short description of the issue type" class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" v-model="issueTypeForm.description"></textarea>
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="issueTypeForm.errors.description" v-text="issueTypeForm.errors.description"></p>
                                </div>

                                <div class="w-2/3">
                                    <div class="flex flex-col items-center">
                                        <div class="w-full flex flex-col items-center">
                                            <div class="w-full">
                                                <div class="flex flex-col items-center relative">
                                                    <div class="w-full">
                                                        <div class="p-0.5 text-gray-500 font-semibold">Icon</div>
                                                        <div class="p-1 bg-white flex border-2 border-gray-200 rounded">
                                                            <div class="flex flex-auto flex-wrap"></div>
                                                            <input placeholder="Search by name" class="p-1 px-2 appearance-none outline-none w-full text-gray-800" v-model="searchString" v-on:keyup="this.searchStringInArray()">
                                                            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                                                <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none" type="button" @click="this.openPopup = !this.openPopup">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
                                                                        <polyline points="18 15 12 9 6 15"></polyline>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="absolute mt-20 shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-32 overflow-y-auto svelte-5uyqqj" v-show="(this.searchString && !issueTypeForm.icon) || this.openPopup">
                                                        <div class="flex flex-col w-full">
                                                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100" v-for="icon in this.filteredArray" @click="selectIcon(icon)">
                                                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                                                    <div class="w-6 flex flex-col items-center">
                                                                        <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                                                            <img class="rounded-full" alt="A" :src="icon.replace('public', '../storage')">
                                                                        </div>
                                                                    </div>
                                                                    <div class="w-full items-center flex">
                                                                        <div class="mx-2 -mt-1  "> {{ icon.match(/.*\/(.*)$/)[1] }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <button type="submit" class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">{{this.buttonText}}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="flex py-12">
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Manage Issue Types</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        You may delete any of your existing issue types if they are no longer needed
                    </p>
                </div>

                <div class="w-2/3">
                    <div class="border border-gray-100 shadow-xl rounded-xl">
                        <div class="p-12">
                            <ul class="list-inside" v-if="this.issueTypes.length">
                                <li v-for="issueType in this.issueTypes" :id="issueType.id" class="w-full flex justify-between space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <img :src="'../'+issueType.icon" alt="" class="w-4 h-4">
                                        <div>{{ issueType.name }}</div>
                                        <div class="text-xs text-gray-400">{{issueType.description}}</div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="#" class="href text-gray-400 font-semibold text-sm hover:text-gray-300" @click="edit(issueType)">Edit</a>
                                        <Link :href="route('web.issue-type.destroy', [issueType.id])" as="button" method="delete" preserve-scroll class="href text-red-600 font-semibold text-sm">Delete</Link>
                                    </div>

                                </li>
                            </ul>
                            <div v-else>
                                <div class="bg-blue-100 text-blue-600 p-4 rounded border border-blue-200 font-semibold">
                                    There is no Issue Type(s) created yet for your user.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </settings>
</template>

<script>
import {useForm} from "@inertiajs/inertia-vue3";
import Settings from "../Settings";
import {Link} from "@inertiajs/inertia-vue3";

export default {
    props: {
        icons: Array,
        issueTypes: Array,
    },

    components: {
        Settings,
        Link,
    },

    data() {
        return {
            filteredArray: [],
            searchString: null,
            formAction: route('web.issue-type.store'),
            formMethod: 'post',
            buttonText: 'Create',
            issueTypeForm: useForm({
                name: '',
                description: '',
                icon: null,
            }),
            openPopup: false,
        }
    },

    mounted() {
        this.filteredArray = this.icons;
        this.issueTypeForm.icon = null;
        this.searchString = null;
    },

    methods: {
        searchStringInArray: function () {
            this.filteredArray = [];
            this.issueTypeForm.icon = null;
            this.icons.filter(element =>{
                if (element.includes(this.searchString)) {
                    this.filteredArray.push(element);
                    return true;
                }
            });
        },

        selectIcon: function (icon) {
            this.searchString = icon.match(/.*\/(.*)$/)[1];
            this.issueTypeForm.icon = icon.replace('public', 'storage');
            this.openPopup = false;
        },

        submit: function () {
            this.issueTypeForm.submit(this.formMethod, this.formAction, {
                onSuccess: () => {
                    this.issueTypeForm.reset();
                    this.issueTypeForm.icon = null;
                    this.searchString = null;
                    this.formAction = route('web.issue-type.store');
                    this.buttonText = 'Create';
                    this.formMethod = 'post';
                }
            });
        },

        edit(issueType) {
            this.issueTypeForm.name = issueType.name;
            this.issueTypeForm.description = issueType.description;
            this.issueTypeForm.icon = issueType.icon.replace('public', 'storage');
            this.searchString = issueType.icon.match(/.*\/(.*)$/)[1];
            this.formAction = route('web.issue-type.update', issueType.id);
            this.buttonText = 'Update';
            this.formMethod = 'put';
        }
    }
}
</script>
