<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <settings-description
                        :title="'Create Project'"
                        :description="'A <b>Tassking.io</b> project is a collection of issues. Your team could use a <b>Tassking.io</b> project to coordinate the development of a product, track a project, manage a help desk, and more, depending on your requirements.'"
                    />
                </div>

                <div class="w-2/3">
                    <form
                        class="mt-8"
                        method="POST"
                        @submit.prevent="submit"
                    >
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <standard-input-field
                                    v-model="state.projectForm.name"
                                    :error="state.projectForm.errors.name"
                                    :label="'Name'"
                                    :placeholder="'Name'"
                                />

                                <standard-input-field
                                    v-model="state.projectForm.key"
                                    :error="state.projectForm.errors.key"
                                    :label="'Key'"
                                    :placeholder="'SCRM'"
                                />

                                <standard-textarea-field
                                    v-model="state.projectForm.description"
                                    :error="state.projectForm.errors.description"
                                    :label="'Description'"
                                    :placeholder="'Description'"
                                />

                                <div class="md:w-4/5 w-2/3">
                                    <SearchableDropdown
                                        :label="'Avatar'"
                                        :items="props.avatars"
                                        @select="selectAvatar"
                                        v-slot="iconProps"
                                        ref="searchAvatarComponent"
                                    >
                                        <div class="flex w-full items-center text p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                            <div class="w-6 flex flex-col items-center">
                                                <div class="flex relative w-5 h-5 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full">
                                                    <img
                                                        class="rounded-full"
                                                        :alt="iconProps.item.match(/.*\/(.*)$/)[1]"
                                                        :src="iconProps.item.replace('public', '../storage')"
                                                    />
                                                </div>
                                            </div>
                                            <div class="w-full items-center flex">
                                                <div class="mx-2 -mt-1">
                                                    {{ iconProps.item.match(/.*\/(.*)$/)[1] }}
                                                </div>
                                            </div>
                                        </div>
                                    </SearchableDropdown>
                                </div>

                                <div class="md:w-4/5 w-2/3">
                                    <SearchableDropdown
                                        :label="'Default Assignee'"
                                        :items="props.users"
                                        @select="selectUser"
                                        v-slot="iconProps"
                                        ref="searchUserComponent"
                                    >
                                        <div class="flex w-full items-center text p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                            <div class="w-6 flex flex-col items-center">
                                                <div class="flex relative w-5 h-5 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full">
                                                    <img
                                                        class="rounded-full"
                                                        :src="iconProps.item.avatar.replace('public', '../storage')"
                                                    />
                                                </div>
                                            </div>
                                            <div class="w-full items-center flex">
                                                <div class="mx-2 -mt-1">
                                                    {{ iconProps.item.name }}
                                                </div>
                                            </div>
                                        </div>
                                    </SearchableDropdown>
                                </div>
                            </div>

                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <create-button :text="state.buttonText" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex py-12">
                <ListOfItems :items="props.projects">
                    <template #description>
                        <settings-description
                            :title="'Manage Projects'"
                            :description="'You may delete any of your existing projects if they are no longer needed'"
                        />
                    </template>
                    <template #emptyListDescription>There is no Project(s) created yet for your user.</template>

                    <ListOfItem
                        v-for="project in props.projects"
                        :id="project.id"
                        class="w-full flex justify-between space-y-2"
                        :delete-link="route('web.project.destroy', [project.id])"
                    >
                        <div class="flex items-center space-x-2">
                            <div>{{ project.name }}</div>
                            <div class="text-xs text-gray-400">
                                {{ project.description }}
                            </div>
                        </div>
                    </ListOfItem>
                </ListOfItems>
            </div>
        </div>
    </settings>
</template>

<script setup>
import Settings from '../Settings'
import {useForm} from '@inertiajs/vue3'
import {onMounted, reactive, ref} from 'vue'
import ListOfItems from '../../../Components/ListOfItems'
import ListOfItem from '../../../Components/ListOfItem'
import SettingsDescription from '../Shared/SettingsDescription.vue'
import SearchableDropdown from '../../../Components/SearchableDropdown'
import StandardInputField from '../../../Components/StandardInputField.vue'
import StandardTextareaField from '../../../Components/StandardTextareaField.vue'
import CreateButton from "../../../Components/CreateButton.vue";

const searchAvatarComponent = ref()
const searchUserComponent = ref()

const props = defineProps({
    users: Array,
    avatars: Array,
    projects: Array,
})

const state = reactive({
    filteredArray: [],
    filteredAvatarArray: [],
    formAction: route('web.project.store'),
    formMethod: 'post',
    projectForm: useForm({
        name: null,
        key: null,
        description: null,
        type: 'SOFTWARE',
        default_assignee_id: null,
        icon: null,
    }),
    buttonText: 'Create',
})

onMounted(() => {
    state.filteredArray = props.users
    state.filteredAvatarArray = props.avatars
    state.projectForm.default_assignee_id = null
})

function selectAvatar(avatar) {
    state.projectForm.icon = avatar.replace('public', '/storage')
    searchAvatarComponent.value.refreshSearchItem(avatar.match(/.*\/(.*)$/)[1])
}

function selectUser(user) {
    state.projectForm.default_assignee_id = user.id
    searchUserComponent.value.refreshSearchItem(user.name)
}

function submit() {
    state.projectForm.submit(state.formMethod, state.formAction, {
        preserveScroll: true,
        onSuccess: () => {
            state.projectForm.reset()
            state.projectForm.default_assignee_id = null
            state.projectForm.icon = null
            state.formAction = route('web.project.store')
            state.buttonText = 'Create'
            state.formMethod = 'post'
            searchAvatarComponent.value.refreshSearchItem('');
            searchUserComponent.value.refreshSearchItem('')
        },
    })
}

function edit(token) {
    //
}
</script>
