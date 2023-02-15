<template>
    <Modal :only-with-button="true">
        <template #title>
            <div class="flex justify-between">
                <div class="flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                        </svg>
                    </div>
                    <div class="space-y-1 ml-2">
                        <div class="text-xl font-bold antialased leading-6 text-gray-700 ">Create New Issue</div>
                        <div class="text-gray-500 text-sm">You need the Create Issue project permission for the issue's relevant project.</div>
                    </div>
                </div>

                <div>
                    <button type="button" class="font-bold text-gray-700 border-0 active:border-0 focus:outline-none" @click="close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>

        </template>
        <div class="px-4">
            <form action="" class="space-y-4">
                <SearchableDropdown
                    :label="'Project'"
                    :items="props.projects"
                    @select="selectProject"
                    v-slot="projectProps"
                    ref="projectSearchComponent"
                    class="w-full"
                >
                    <searchable-dropdown-with-icon-body
                        :text="projectProps.item.name"
                    />
                </SearchableDropdown>

                <SearchableDropdown
                    :label="'Icon'"
                    :items="props.issueTypes"
                    @select="selectIssueType"
                    v-slot="iconProps"
                    ref="iconSearchComponent"
                    class="w-full"
                >
                    <searchable-dropdown-with-icon-body
                        :text="iconProps.item.name"
                        :icon="iconProps.item.icon.replace('storage', '../../../storage')"
                    />
                </SearchableDropdown>

                <standard-input-field
                    :label="'Summary *'"
                    :placeholder="'Summary'"
                    class="text-sm"
                    v-model="state.issueForm.summary"
                />

                <standard-textarea-field
                    :label="'Description'"
                    :placeholder="'Description'"
                    class="text-sm"
                    v-model="state.issueForm.description"
                />

                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <standard-select-field
                            :label="'Priority'"
                            :placeholder="'Select one'"
                            class="text-sm"
                            v-model="state.issueForm.priority"
                            :values="priorityValues"
                        />
                    </div>
                    <div class="w-1/2">
                        <SearchableDropdown
                            :label="'Assignee'"
                            :items="props.users"
                            @select="selectUser"
                            v-slot="iconProps"
                            ref="searchUserComponent"
                        >
                            <searchable-dropdown-with-icon-body
                                :text="iconProps.item.name"
                                :icon="iconProps.item.avatar.replace('public', '../storage')"
                            />
                        </SearchableDropdown>
                    </div>
                </div>

                <div class="w-1/2">
                    <standard-input-field
                        :label="'Due Date'"
                        :placeholder="'Due Date'"
                        :type="'date'"
                        class="text-sm"
                        v-model="state.issueForm.dueDate"
                    />
                </div>

                <div class="w-full justify-between flex space-x-4 pt-8">
                    <standard-button :text="'Save as draft'" class="py-3 w-1/2 shadow hover:bg-gray-50" />
                    <save-button :text="'Create Issue'" class="bg-purple-600 py-3 w-1/2 capitalize shadow hover:bg-purple-500" />
                </div>

            </form>
        </div>
    </Modal>
</template>

<script setup>
import Modal from '../../Shared/Modal.vue'
import StandardInputField from "../../Components/StandardInputField.vue";
import StandardTextareaField from "../../Components/StandardTextareaField.vue";
import SearchableDropdown from "../../Components/SearchableDropdown.vue";
import StandardButton from "../../Components/StandardButton.vue";
import StandardSelectField from "../../Components/StandardSelectField.vue";
import {reactive, ref} from "vue";
import {useForm} from "@inertiajs/vue3";
import {useModal} from 'momentum-modal'
import SaveButton from "../../Components/SaveButton.vue";
import SearchableDropdownWithIconBody from "../../Components/SearchableDropdownWithIconBody.vue";

const { close } = useModal();

const state = reactive({
    issueForm: useForm({
        project: null,
        summary: null,
        type: null,
        description: null,
        priority: null,
        assignee: null,
        dueDate: null,
    })
})

const iconSearchComponent = ref()
const projectSearchComponent = ref()
const searchUserComponent = ref()

const priorityValues = ['Minor', 'Major', 'Blocker']

const props = defineProps({
    issueTypes: Array,
    projects: Array,
    users: Array,
})

function selectIssueType(issueType) {
    state.issueForm.type = issueType.id
    iconSearchComponent.value.refreshSearchItem(issueType.name)
}

function selectProject(project) {
    state.issueForm.project = project.id
    projectSearchComponent.value.refreshSearchItem(project.name)
}

function selectUser(user) {
    state.issueForm.assignee = user.id
    searchUserComponent.value.refreshSearchItem(user.name)
}

</script>
