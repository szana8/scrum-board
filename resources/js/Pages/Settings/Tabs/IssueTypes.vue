<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <settings-description
                        :title="'Create Issue Types'"
                        :description="'Since <b>Tassking.io</b> tracks all the tasks, the sub-tasks or even a work as an Issue, there are several types of Issues to identify the work and categorize the similar issues.'"
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
                                    v-model="state.issueTypeForm.name"
                                    :error="state.issueTypeForm.errors.name"
                                    :label="'Name'"
                                    :placeholder="'Name'"
                                />

                                <standard-textarea-field
                                    v-model="state.issueTypeForm.description"
                                    :error="state.issueTypeForm.errors.description"
                                    :label="'Description'"
                                    :placeholder="'Description'"
                                />

                                <div class="w-2/3">
                                    <SearchableDropdown
                                        :label="'Icon'"
                                        :items="props.icons"
                                        @select="selectIcon"
                                        v-slot="iconProps"
                                        ref="searchComponent"
                                        class="w-2/3"
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
                            </div>

                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <standard-button :text="state.buttonText" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex py-12">
                <list-of-items :items="props.issueTypes">
                    <template #description>
                        <settings-description
                            :title="'Manage Issue Types'"
                            :description="'You may delete any of your existing client credentials if they are no longer needed'"
                        />
                    </template>
                    <template #emptyListDescription>There is no Issue Type created yet for your user.</template>

                    <list-of-item
                        v-for="issueType in props.issueTypes"
                        :id="issueType.id"
                        class=""
                        :allow-edit="true"
                        :edit-key="issueType"
                        @edit="edit"
                        :delete-link="route('web.issue-type.destroy', [issueType.id])"
                    >
                        <div class="flex items-center space-x-2">
                            <div class="flex items-center space-x-2">
                                <img
                                    :src="'../' + issueType.icon"
                                    alt=""
                                    class="w-4 h-4"
                                />
                                <div>{{ issueType.name }}</div>
                                <div class="text-xs text-gray-400">
                                    {{ issueType.description }}
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
import { reactive, ref } from 'vue'
import Settings from '../Settings'
import { useForm } from '@inertiajs/vue3'
import ListOfItem from '../../../Components/ListOfItem'
import ListOfItems from '../../../Components/ListOfItems'
import SettingsDescription from '../Shared/SettingsDescription.vue'
import StandardButton from '../../../Components/StandardButton.vue'
import SearchableDropdown from '../../../Components/SearchableDropdown'
import StandardInputField from '../../../Components/StandardInputField.vue'
import StandardTextareaField from '../../../Components/StandardTextareaField.vue'

const searchComponent = ref()

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

function selectIcon(icon) {
    state.issueTypeForm.icon = icon.replace('public', 'storage')
    state.searchString = icon.match(/.*\/(.*)$/)[1]
    searchComponent.value.refreshSearchItem(state.searchString)
}

function submit() {
    state.issueTypeForm.submit(state.formMethod, state.formAction, {
        preserveScroll: true,
        onSuccess: () => {
            state.issueTypeForm.reset()
            state.issueTypeForm.icon = null
            state.searchString = ''
            searchComponent.value.refreshSearchItem('')
            state.formAction = route('web.issue-type.store')
            state.buttonText = 'Create'
            state.formMethod = 'post'
        },
    })
}

function edit(issueType) {
    state.issueTypeForm.name = issueType.name
    state.issueTypeForm.description = issueType.description
    state.issueTypeForm.icon = issueType.icon.replace('public', 'storage')
    state.searchString = issueType.icon.match(/.*\/(.*)$/)[1]
    state.formAction = route('web.issue-type.update', issueType.id)
    state.buttonText = 'Update'
    state.formMethod = 'put'
    searchComponent.value.refreshSearchItem(state.searchString)
}
</script>
