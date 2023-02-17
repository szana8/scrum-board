<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <settings-description
                        :title="'Create Issue Type Schema'"
                        :description="'As an administrator, you can group issue types into issue type schemes to make it easier for your team to select the right type when creating issues in their project.\n' + '                        Issue type schemes can also minimize the maintenance work required when administering several projects.'"
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
                                    v-model="state.issueTypeSchemaForm.name"
                                    :error="state.issueTypeSchemaForm.errors.name"
                                    :label="'Name'"
                                    :placeholder="'Name'"
                                    class="w-2/3"
                                />

                                <standard-textarea-field
                                    v-model="state.issueTypeSchemaForm.description"
                                    :error="state.issueTypeSchemaForm.errors.description"
                                    :label="'Description'"
                                    :placeholder="'Description'"
                                    class="w-2/3"
                                />

                                <div class="w-2/3">
                                    <SearchableDropdown
                                        :label="'Issue Types'"
                                        :items="props.issueTypes"
                                        @select="selectIcon"
                                        v-slot="iconProps"
                                        :searchString="state.searchString"
                                        :multiple-select="true"
                                        ref="searchComponent"
                                    >
                                        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                            <div class="w-6 flex flex-col items-center">
                                                <div class="flex relative w-5 h-5 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full">
                                                    <img
                                                        class=""
                                                        alt=""
                                                        :src="'../' + iconProps.item.icon"
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
                <list-of-items :items="props.issueTypeSchemes">
                    <template #description>
                        <settings-description
                            :title="'Manage Issue Type Schema'"
                            :description="'You may delete any of your existing issue type schema if they are no longer needed.'"
                        />
                    </template>
                    <template #emptyListDescription>There is no Issue Type Schema created yet for your user.</template>

                    <list-of-item
                        v-for="issueTypeSchema in props.issueTypeSchemes"
                        :id="issueTypeSchema.id"
                        class=""
                        :allow-edit="true"
                        :edit-key="issueTypeSchema"
                        @edit="edit"
                        :delete-link="route('web.issue-type-schema.destroy', [issueTypeSchema.id])"
                    >
                        <div class="flex items-center space-x-2">
                            <div class="flex items-center space-x-2">
                                <div>{{ issueTypeSchema.name }}</div>
                                <div class="text-xs text-gray-400">
                                    {{ issueTypeSchema.description }}
                                </div>
                            </div>
                        </div>
                    </list-of-item>
                </list-of-items>
            </div>
        </div>
    </settings>
</template>

<script setup>
import {reactive, ref} from 'vue'
import Settings from '../Settings'
import {useForm} from '@inertiajs/vue3'
import ListOfItem from '../../../Components/ListOfItem'
import ListOfItems from '../../../Components/ListOfItems'
import SearchableDropdown from '../../../Components/SearchableDropdown'
import SettingsDescription from '../Shared/SettingsDescription.vue'
import StandardInputField from '../../../Components/StandardInputField.vue'
import StandardTextareaField from '../../../Components/StandardTextareaField.vue'
import CreateButton from "../../../Components/CreateButton.vue";

const searchComponent = ref()

const props = defineProps({
    issueTypes: Array,
    issueTypeSchemes: Array,
})

const state = reactive({
    filteredArray: [],
    searchString: null,
    formAction: route('web.issue-type-schema.store'),
    formMethod: 'post',
    buttonText: 'Create',
    issueTypeSchemaForm: useForm({
        name: '',
        description: '',
        issueTypes: [],
    }),
})

function selectIcon(issueType) {
    state.searchString = null
    const index = state.issueTypeSchemaForm.issueTypes.indexOf(issueType.id)

    if (index === -1) {
        state.issueTypeSchemaForm.issueTypes.push(issueType.id)
    } else {
        state.issueTypeSchemaForm.issueTypes.splice(index, 1)
    }

    searchComponent.value.refreshSelectedItems(state.issueTypeSchemaForm.issueTypes)
}

function edit(issueTypeSchema) {
    state.issueTypeSchemaForm.name = issueTypeSchema.name
    state.issueTypeSchemaForm.description = issueTypeSchema.description
    state.issueTypeSchemaForm.issueTypes = issueTypeSchema.type_ids
    searchComponent.value.refreshSelectedItems(state.issueTypeSchemaForm.issueTypes)
    state.formAction = route('web.issue-type-schema.update', issueTypeSchema.id)
    state.buttonText = 'Update'
    state.formMethod = 'put'
}

function submit() {
    state.issueTypeSchemaForm.submit(state.formMethod, state.formAction, {
        preserveScroll: true,
        onSuccess: () => {
            state.issueTypeSchemaForm.reset()
            state.searchString = null
            state.formAction = route('web.issue-type-schema.store')
            state.buttonText = 'Create'
            state.formMethod = 'post'
            searchComponent.value.refreshSelectedItems([])
            searchComponent.value.closeDropdown()
        },
    })
}
</script>
