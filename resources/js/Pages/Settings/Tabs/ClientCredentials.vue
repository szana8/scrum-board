<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Create Oauth Client Credentials</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        Oauth client credentials allow to services or other applications to identify themself and access the data from outside.
                    </p>
                </div>

                <div class="w-2/3">
                    <form class="mt-8" method="POST" @submit.prevent="this.submit">
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <NewClientCredential class="w-2/3 bg-blue-50 p-4 rounded border border-blue-200" v-if="this.$page.props.flash.success"
                                                     :client-id="this.$page.props.flash.success.clientId"
                                                     :client-secret="this.$page.props.flash.success.clientSecret"
                                />

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">What should we name the client?</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Client Name" v-model="this.clientCredentialForm.name" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="this.clientCredentialForm.errors.name" v-text="this.clientCredentialForm.errors.name"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Where should we redirect the request after authorization?</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="http://localhost/auth/callback" v-model="clientCredentialForm.uri" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="this.clientCredentialForm.errors.uri" v-text="this.clientCredentialForm.errors.uri"></p>
                                </div>
                            </div>

                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <button type="submit" class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex py-12">
                <ListOfItems :items="this.clientCredentials">
                    <template #header>Manage Client Credentials</template>
                    <template #description>You may delete any of your existing client credentials if they are no longer needed</template>
                    <template #emptyListDescription>There is no Client Credential(s) created yet for your user.</template>

                    <ListOfItem v-for="clientCredential in this.clientCredentials"
                                :id="clientCredential.id"
                                class="w-full flex justify-between space-y-2"
                                :delete-link="route('web.client-credential.destroy', [clientCredential.id])"
                    >
                        <div class="flex items-center space-x-2">
                            <div>{{ clientCredential.name }}</div>
                            <div class="text-xs text-gray-400">{{clientCredential.id}}</div>
                        </div>
                    </ListOfItem>

                </ListOfItems>
            </div>
        </div>
    </settings>
</template>

<script>
import {Link, useForm} from "@inertiajs/vue3";
import Settings from "../Settings";
import NewClientCredential from "../Shared/NewClientCredential";
import ListOfItems from "../../../Components/ListOfItems";
import ListOfItem from "../../../Components/ListOfItem";

export default {

    props: {
        clientCredentials: Array,
    },

    components: {
        Settings,
        Link,
        NewClientCredential,
        ListOfItems,
        ListOfItem
    },

    data() {
        return {
            clientCredentialForm: useForm({
                name: '',
                uri: '',
            }),
        }
    },

    methods: {
        submit: function () {
            this.clientCredentialForm.post(route('web.client-credential.store'), {
                onSuccess: () => {
                    this.clientCredentialForm.reset();
                }
            });
        },
    }
}
</script>

