<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <settings-description
                        :title="'Create Oauth Client Credentials'"
                        :description="'Oauth client credentials allow to services or other applications to identify themself and access the data from outside.'"
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
                                <new-client-credential
                                    class="w-2/3 bg-blue-50 p-4 rounded border border-blue-200"
                                    v-if="this.$page.props.flash.success"
                                    :client-id="this.$page.props.flash.success.clientId"
                                    :client-secret="this.$page.props.flash.success.clientSecret"
                                />

                                <standard-input-field
                                    v-model="state.clientCredentialForm.name"
                                    :error="state.clientCredentialForm.errors.name"
                                    :label="'What should we name the client?'"
                                    :placeholder="'Client Name'"
                                />

                                <standard-input-field
                                    v-model="state.clientCredentialForm.uri"
                                    :error="state.clientCredentialForm.errors.uri"
                                    :label="'Where should we redirect the request after authorization?'"
                                    :placeholder="'http://localhost/auth/callback'"
                                />
                            </div>

                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <create-button :text="'Create'" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex py-12">
                <list-of-items :items="this.clientCredentials">
                    <template #description>
                        <settings-description
                            :title="'Manage Client Credentials'"
                            :description="'You may delete any of your existing client credentials if they are no longer needed'"
                        />
                    </template>
                    <template #emptyListDescription>There is no Client Credential(s) created yet for your user.</template>

                    <list-of-item
                        v-for="clientCredential in this.clientCredentials"
                        :id="clientCredential.id"
                        class="w-full flex justify-between space-y-2"
                        :delete-link="route('web.client-credential.destroy', [clientCredential.id])"
                    >
                        <div class="flex items-center space-x-2">
                            <div>{{ clientCredential.name }}</div>
                            <div class="text-xs text-gray-400">
                                {{ clientCredential.id }}
                            </div>
                        </div>
                    </list-of-item>
                </list-of-items>
            </div>
        </div>
    </settings>
</template>

<script setup>
import {reactive} from 'vue'
import Settings from '../Settings'
import {useForm} from '@inertiajs/vue3'
import ListOfItem from '../../../Components/ListOfItem'
import ListOfItems from '../../../Components/ListOfItems'
import NewClientCredential from '../Shared/NewClientCredential'
import SettingsDescription from '../Shared/SettingsDescription.vue'
import StandardInputField from '../../../Components/StandardInputField.vue'
import CreateButton from "../../../Components/CreateButton.vue";

defineProps({
    clientCredentials: Array,
})

const state = reactive({
    clientCredentialForm: useForm({
        name: '',
        uri: '',
    }),
})

function submit() {
    state.clientCredentialForm.post(route('web.client-credential.store'), {
        preserveScroll: true,
        onSuccess: () => state.clientCredentialForm.reset(),
    })
}
</script>
