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
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Name of the issue type" v-model="state.issueTypeForm.name" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="state.issueTypeForm.errors.name" v-text="state.issueTypeForm.errors.name"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Description</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <textarea name="description" id="description" rows="3" placeholder="Short description of the issue type" class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" v-model="state.issueTypeForm.description"></textarea>
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="state.issueTypeForm.errors.description" v-text="state.issueTypeForm.errors.description"></p>
                                </div>
                                <div class="w-2/3">
                                    <SearchableDropdown :label="'Icon'" :items="props.icons" @select="selectIcon" v-slot="iconProps" ref="searchComponent">
                                        <div class="flex w-full items-center text p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                            <div class="w-6 flex flex-col items-center">
                                                <div class="flex relative w-5 h-5 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                                    <img class="rounded-full" :alt="iconProps.item.match(/.*\/(.*)$/)[1]" :src="iconProps.item.replace('public', '../storage')">
                                                </div>
                                            </div>
                                            <div class="w-full items-center flex">
                                                <div class="mx-2 -mt-1  ">{{ iconProps.item.match(/.*\/(.*)$/)[1] }}</div>
                                            </div>
                                        </div>
                                    </SearchableDropdown>
                                </div>
                            </div>

                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <button type="submit" class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">{{state.buttonText}}</button>
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
                            <ul class="list-inside" v-if="props.issueTypes.length">
                                <li v-for="issueType in props.issueTypes" :id="issueType.id" class="w-full flex justify-between space-y-2">
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

<script setup>
import Settings from "../Settings";
import {Link, useForm} from "@inertiajs/vue3";
import SearchableDropdown from "../../../Components/SearchableDropdown";
import {reactive, ref} from "vue";

const searchComponent = ref();

const props = defineProps({
    icons: Array,
    issueTypes: Array,
})

const state = reactive({
    formAction: route('web.issue-type.store'),
    formMethod: 'post',
    buttonText: 'Create',
    searchString: '',
    issueTypeForm: useForm({
        name: '',
        description: '',
        icon: null,
    }),
})

function selectIcon (icon) {
    state.issueTypeForm.icon = icon.replace('public', 'storage');
    state.searchString = icon.match(/.*\/(.*)$/)[1];
    searchComponent.value.refreshSearchItem(state.searchString)
}

function submit () {
    state.issueTypeForm.submit(state.formMethod, state.formAction, {
        preserveScroll: true,
        onSuccess: () => {
            state.issueTypeForm.reset();
            state.issueTypeForm.icon = null;
            state.searchString = '';
            searchComponent.value.refreshSearchItem('');
            state.formAction = route('web.issue-type.store');
            state.buttonText = 'Create';
            state.formMethod = 'post';
        }
    });
}

function edit(issueType) {
    state.issueTypeForm.name = issueType.name;
    state.issueTypeForm.description = issueType.description;
    state.issueTypeForm.icon = issueType.icon.replace('public', 'storage');
    state.searchString = issueType.icon.match(/.*\/(.*)$/)[1];
    state.formAction = route('web.issue-type.update', issueType.id);
    state.buttonText = 'Update';
    state.formMethod = 'put';
    searchComponent.value.refreshSearchItem(state.searchString);
}

</script>
