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
                    <form class="mt-8" method="POST" @submit.prevent="submit">
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">What should we name the client?</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Client Name" v-model="clientCredentialForm.name" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="clientCredentialForm.errors.name" v-text="clientCredentialForm.errors.name"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Where should we redirect the request after authorization?</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="http://localhost/auth/callback" v-model="clientCredentialForm.uri" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="clientCredentialForm.errors.uri" v-text="clientCredentialForm.errors.uri"></p>
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
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Manage Client Credentials</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        You may delete any of your existing client credentials if they are no longer needed
                    </p>
                </div>

                <div class="w-2/3">
                    <div class="border border-gray-100 shadow-xl rounded-xl">
                        <div class="p-12">
                            <ul class="list-inside" v-if="clientCredentials.length">
                                <li v-for="clientCredential in clientCredentials" :id="clientCredential.id" class="w-full flex justify-between space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <div>{{ clientCredential.name }}</div>
                                        <div class="text-xs text-gray-400">{{clientCredential.id}}</div>
                                    </div>
                                    <Link :href="route('client-credential.destroy', [clientCredential.id])" method="delete" preserve-scroll class="href text-red-600">Delete</Link>
                                </li>
                            </ul>
                            <div v-else>
                                <div class="bg-blue-100 text-blue-600 p-4 rounded border border-blue-200 font-semibold">
                                    There is no Client Credential(s) created yet for your user.
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
import {useForm} from "@inertiajs/inertia-vue3";
import { Link } from '@inertiajs/inertia-vue3'
import Settings from "../Settings";

const clientCredentialForm = useForm({
    name: '',
    uri: '',
});

const submit = () => {
    clientCredentialForm.post(route('client-credential.store'), {
        onSuccess: () => {
            clientCredentialForm.reset();
        }
    });
};

defineProps({
    clientCredentials: Array,
})
</script>

