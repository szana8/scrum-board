<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">

                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Create Issue Type Schema</h4>
                    <p class="text-gray-400 text-sm mt-4 mr-6">
                        As an administrator, you can group issue types into issue type schemes to make it easier for your team to select the right type when creating issues in their project.
                        Issue type schemes can also minimize the maintenance work required when administering several projects.
                    </p>
                </div>

                <div class="w-2/3">
                    <form class="mt-8" method="POST" @submit.prevent="submit">
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Name</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Name of the issue type" v-model="state.issueTypeSchemaForm.name" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="state.issueTypeSchemaForm.errors.name" v-text="state.issueTypeSchemaForm.errors.name"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Description</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <textarea name="description" id="description" rows="3" placeholder="Short description of the issue type" class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" v-model="state.issueTypeSchemaForm.description"></textarea>
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="state.issueTypeSchemaForm.errors.description" v-text="state.issueTypeSchemaForm.errors.description"></p>
                                </div>

                                <div class="w-2/3">
                                    <SearchableDropdown :label="'Issue Types'"
                                                        :items="props.issueTypes"
                                                        @select="selectIcon"
                                                        v-slot="iconProps"
                                                        :searchString="state.searchString"
                                                        :multiple-select="true"
                                                        ref="searchComponent"
                                    >
                                        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                            <div class="w-6 flex flex-col items-center">
                                                <div class="flex relative w-5 h-5 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                                    <img class="" alt="" :src="'../'+iconProps.item.icon">
                                                </div>
                                            </div>
                                            <div class="w-full items-center flex">
                                                <div class="mx-2 -mt-1  "> {{ iconProps.item.name }}
                                                </div>
                                            </div>
                                        </div>
                                    </SearchableDropdown>
                                </div>
                            </div>

                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <button type="submit" class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">{{ state.buttonText }}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="flex py-12">
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Manage Issue Type Schema</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        You may delete any of your existing issue type schema if they are no longer needed
                    </p>
                </div>

                <div class="w-2/3">
                    <div class="border border-gray-100 shadow-xl rounded-xl">
                        <div class="p-12">
                            <ul class="list-inside" v-if="props.issueTypeSchemes.length">
                                <li v-for="issueTypeSchema in props.issueTypeSchemes" :id="issueTypeSchema.id" class="w-full flex justify-between space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <div>{{ issueTypeSchema.name }}</div>
                                        <div class="text-xs text-gray-400">{{issueTypeSchema.description}}</div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="#" class="href text-gray-400 font-semibold text-sm hover:text-gray-300" @click="edit(issueTypeSchema)">Edit</a>
                                        <Link :href="route('web.issue-type-schema.destroy', [issueTypeSchema.id])" as="button" method="delete" preserve-scroll class="href text-red-600 hover:text-red-400 font-semibold text-sm">Delete</Link>
                                    </div>

                                </li>
                            </ul>
                            <div v-else>
                                <div class="bg-blue-100 text-blue-600 p-4 rounded border border-blue-200 font-semibold">
                                    There is no Issue Type Schema created yet for your user.
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
    issueTypes: Array,
    issueTypeSchemes: Array,
});

const state = reactive({
    filteredArray: [],
    searchString: null,
    formAction: route('web.issue-type-schema.store'),
    formMethod: 'post',
    buttonText: 'Create',
    issueTypeSchemaForm: useForm({
        name: '',
        description: '',
        issueTypes: []
    }),
})

function selectIcon (issueType) {
    state.searchString = null
    const index = state.issueTypeSchemaForm.issueTypes.indexOf(issueType.id);

    if (index === -1) {
        state.issueTypeSchemaForm.issueTypes.push(issueType.id);
    } else {
        state.issueTypeSchemaForm.issueTypes.splice(index, 1);
    }

    searchComponent.value.refreshSelectedItems(state.issueTypeSchemaForm.issueTypes);
}

function edit (issueTypeSchema) {
    state.issueTypeSchemaForm.name = issueTypeSchema.name;
    state.issueTypeSchemaForm.description = issueTypeSchema.description;
    state.issueTypeSchemaForm.issueTypes = issueTypeSchema.type_ids;
    searchComponent.value.refreshSelectedItems(state.issueTypeSchemaForm.issueTypes);
    state.formAction = route('web.issue-type-schema.update', issueTypeSchema.id);
    state.buttonText = 'Update';
    state.formMethod = 'put';
}

function submit () {
    state.issueTypeSchemaForm.submit(state.formMethod, state.formAction, {
        preserveScroll: true,
        onSuccess: () => {
            state.issueTypeSchemaForm.reset();
            state.searchString = null;
            state.formAction = route('web.issue-type-schema.store');
            state.buttonText = 'Create';
            state.formMethod = 'post';
            searchComponent.value.refreshSelectedItems([]);
            searchComponent.value.closeDropdown();
        }
    })
}
</script>
