<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Create Project</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        A <b>Tassking.io</b> project is a collection of issues. Your team could use a <b>Tassking.io</b> project to coordinate the development of a product, track a project, manage a help desk, and more, depending on your requirements.
                    </p>
                </div>

                <div class="w-2/3">
                    <form class="mt-8" method="POST" @submit.prevent="submit">
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Name</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Name of the project" v-model="projectForm.name" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="projectForm.errors.name" v-text="projectForm.errors.name"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Key</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Key" v-model="projectForm.key" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="projectForm.errors.key" v-text="projectForm.errors.key"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Description</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <textarea name="description" id="description" rows="3" placeholder="Short description of the project" class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" v-model="projectForm.description"></textarea>
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="projectForm.errors.description" v-text="projectForm.errors.description"></p>
                                </div>

                                <div class="w-2/3">
                                    <div class="flex flex-col items-center">
                                        <div class="w-full flex flex-col items-center">
                                            <div class="w-full">
                                                <div class="flex flex-col items-center relative">
                                                    <div class="w-full">
                                                        <div class="p-0.5 text-gray-500 font-semibold">Avatar</div>
                                                        <div class="p-1 bg-white flex border-2 border-gray-200 rounded">
                                                            <div class="flex flex-auto flex-wrap"></div>
                                                            <input placeholder="Select an image..." class="p-1 px-2 appearance-none outline-none w-full text-gray-800" v-model="searchAvatarString" v-on:keyup="this.searchAvatarInArray()">
                                                            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                                                <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none" type="button" @click="this.openAvatarPopup = !this.openAvatarPopup">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
                                                                        <polyline points="18 15 12 9 6 15"></polyline>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="absolute mt-20 shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-32 overflow-y-auto svelte-5uyqqj" v-show="(this.searchAvatarString && !projectForm.avatar) || this.openAvatarPopup">
                                                        <div class="flex flex-col w-full">
                                                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100" v-for="avatar in this.filteredAvatarArray" @click="selectAvatar(avatar)">
                                                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                                                    <div class="w-6 flex flex-col items-center">
                                                                        <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                                                            <img class="rounded-full" alt="A" :src="avatar.replace('public', '../storage')">
                                                                        </div>
                                                                    </div>
                                                                    <div class="w-full items-center flex">
                                                                        <div class="mx-2 -mt-1  "> {{ avatar.match(/.*\/(.*)$/)[1] }}</div>
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

                                <div class="w-2/3">
                                    <div class="flex flex-col items-center">
                                        <div class="w-full flex flex-col items-center">
                                            <div class="w-full">
                                                <div class="flex flex-col items-center relative">
                                                    <div class="w-full">
                                                        <div class="p-0.5 text-gray-500 font-semibold">Default Assignee</div>
                                                        <div class="p-1 bg-white flex border-2 border-gray-200 rounded">
                                                            <div class="flex flex-auto flex-wrap"></div>
                                                            <input placeholder="Unassigned" class="p-1 px-2 appearance-none outline-none w-full text-gray-800" v-model="searchString" v-on:keyup="this.searchUserInArray()">
                                                            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                                                <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none" type="button" @click="this.openPopup = !this.openPopup">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
                                                                        <polyline points="18 15 12 9 6 15"></polyline>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="absolute mt-20 shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-32 overflow-y-auto svelte-5uyqqj" v-show="(this.searchString && !projectForm.default_assignee_id) || this.openPopup">
                                                        <div class="flex flex-col w-full">
                                                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100" v-for="user in this.filteredArray" @click="selectUser(user)">
                                                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                                                    <div class="w-6 flex flex-col items-center">
                                                                        <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                                                            <img class="rounded-full" alt="A" :src="user.avatar">
                                                                        </div>
                                                                    </div>
                                                                    <div class="w-full items-center flex">
                                                                        <div class="mx-2 -mt-1  "> {{ user.name }}</div>
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
                    <h4 class="text-xl antialiased capitalized">Manage projects</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        You may delete any of your existing project if they are no longer needed
                    </p>
                </div>

                <div class="w-2/3">
                    <div class="border border-gray-100 shadow-xl rounded-xl">
                        <div class="p-12">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </settings>
</template>

<script>
import Settings from "../Settings";
import { Link } from '@inertiajs/inertia-vue3'
import {useForm} from "@inertiajs/inertia-vue3";

export default {

    props: {
        users: Array,
        avatars: Array,
    },

    components: {
        Settings,
        Link,
    },

    data() {
        return {
            filteredArray: [],
            filteredAvatarArray: [],
            searchString: null,
            searchAvatarString: null,
            formAction: route('web.project.store'),
            formMethod: 'post',
            projectForm: useForm({
                name: null,
                key: null,
                description: null,
                type: 'SOFTWARE',
                default_assignee_id: null,
                avatar: null,
            }),
            buttonText: 'Create',
            openPopup: false,
            openAvatarPopup: false,
        }
    },

    mounted() {
        this.filteredArray = this.users;
        this.filteredAvatarArray = this.avatars;
        this.projectForm.default_assignee_id = null;
        this.searchString = null;
        this.searchAvatarString = null;
    },

    methods: {
        searchUserInArray: function () {
            this.filteredArray = [];
            this.projectForm.default_assignee_id = null;
            this.users.filter(element =>{
                if (element.name.toLowerCase().includes(this.searchString.toLowerCase())) {
                    this.filteredArray.push(element);
                    return true;
                }
            });
        },

        searchAvatarInArray: function () {
            this.filteredAvatarArray = [];
            this.projectForm.avatar = null;
            this.avatars.filter(element =>{
                if (element.toLowerCase().includes(this.searchAvatarString.toLowerCase())) {
                    this.filteredAvatarArray.push(element);
                    return true;
                }
            });
        },

        selectAvatar: function (avatar) {
            this.searchAvatarString = avatar.match(/.*\/(.*)$/)[1];
            this.projectForm.avatar = avatar;
            this.openAvatarPopup = false;
        },

        selectUser: function (user) {
            this.searchString = user.name;
            this.projectForm.default_assignee_id = user.id;
            this.openPopup = false;
        },

        submit: function () {
            this.projectForm.submit(this.formMethod, this.formAction, {
                onSuccess: () => {
                    this.projectForm.reset();
                    this.projectForm.default_assignee_id = null;
                    this.searchString = null;
                    this.formAction = route('web.project.store');
                    this.buttonText = 'Create';
                    this.formMethod = 'post';
                }
            });
        },

        edit: function (token) {
            //
        }
    }
}
</script>
