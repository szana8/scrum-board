<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <settings-description
                        :title="'Create Git Integration'"
                        :description="'You can integrate your personal or team GitHub account to <b>Tassking.io</b> to be able to link/manage the\n' + '                        source code changes in the tickets.'"
                    />
                </div>

                <div class="w-2/3">
                    <form
                        class="mt-8"
                        method="POST"
                        @submit.prevent="submit()"
                    >
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <standard-input-field
                                    v-model="state.gitForm.name"
                                    :error="state.gitForm.errors.name"
                                    :label="'Name'"
                                    :placeholder="'Name'"
                                />

                                <standard-input-field
                                    v-model="state.gitForm.token"
                                    :error="state.gitForm.errors.token"
                                    :label="'Github token'"
                                    :placeholder="'Token'"
                                />
                            </div>

                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <standard-button :text="state.buttonText" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex py-12">
                <list-of-items :items="props.tokens">
                    <template #description>
                        <settings-description
                            :title="'Manage saved tokens'"
                            :description="'You may delete any of your existing client credentials if they are no longer needed'"
                        />
                    </template>
                    <template #emptyListDescription>There is no token created yet for your user.</template>

                    <list-of-item
                        v-for="token in props.tokens"
                        :id="token.id"
                        class=""
                        :allow-edit="true"
                        :edit-key="token"
                        @edit="edit"
                        :delete-link="route('web.git-token.destroy', [token.id])"
                    >
                        <div class="flex items-center space-x-2">
                            <div>{{ token.name }}</div>
                        </div>
                    </list-of-item>
                </list-of-items>
            </div>
        </div>
    </settings>
</template>

<script setup>
import { reactive } from 'vue'
import Settings from '../Settings'
import { useForm } from '@inertiajs/vue3'
import ListOfItem from '../../../Components/ListOfItem'
import ListOfItems from '../../../Components/ListOfItems'
import StandardButton from '../../../Components/StandardButton.vue'
import SettingsDescription from '../Shared/SettingsDescription.vue'
import StandardInputField from '../../../Components/StandardInputField.vue'

const props = defineProps({
    tokens: Array,
})

const state = reactive({
    formAction: route('web.git-token.store'),
    formMethod: 'post',
    buttonText: 'Create',
    gitForm: useForm({
        name: null,
        token: null,
    }),
})

function submit() {
    state.gitForm.submit(state.formMethod, state.formAction, {
        preserveScroll: true,
        onSuccess: () => {
            state.gitForm.reset()
            state.formAction = route('web.git-token.store')
            state.buttonText = 'Create'
            state.formMethod = 'post'
        },
    })
}

function edit(token) {
    state.gitForm.name = token.name
    state.formAction = route('web.git-token.update', token.id)
    state.buttonText = 'Update'
    state.formMethod = 'put'
}
</script>
