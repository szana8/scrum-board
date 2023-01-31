<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Create Git Integration</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        You can integrate your personal or team GitHub account to <b>Tassking.io</b> to be able to link/manage the
                        source code changes in the tickets.
                    </p>
                </div>

                <div class="w-2/3">
                    <form class="mt-8" method="POST" @submit.prevent="this.submit">
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Name</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Name" v-model="this.gitForm.name" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="this.gitForm.errors.name" v-text="this.gitForm.errors.name"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Github token</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Token" v-model="this.gitForm.token" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="this.gitForm.errors.token" v-text="this.gitForm.errors.token"></p>
                                </div>

                            </div>


                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <button type="submit" class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">{{this.buttonText}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex py-12">
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Manage saved tokens</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        You may delete any of your existing tokens if they are no longer needed
                    </p>
                </div>

                <div class="w-2/3">
                    <div class="border border-gray-100 shadow-xl rounded-xl">
                        <div class="p-12">
                            <ul class="list-inside" v-if="this.tokens.length > 0">
                                <li v-for="token in this.tokens" :id="token.id" class="w-full flex justify-between space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <div>{{ token.name }}</div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="#" class="href text-gray-400 font-semibold text-sm hover:text-gray-300" @click="edit(token)">Edit</a>
                                        <Link :href="route('web.git-token.destroy', [token.id])" method="delete" as="button" class="href text-red-600 font-semibold text-sm">Delete</Link>
                                    </div>

                                </li>
                            </ul>
                            <div v-else>
                                <div class="bg-blue-100 text-blue-600 p-4 rounded border border-blue-200 font-semibold">
                                    There is no token created yet for your user.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </settings>
</template>

<script>
import Settings from "../Settings";
import {Link, useForm} from '@inertiajs/vue3'

export default {

    props: {
        tokens: Array,
    },

    components: {
        Settings,
        Link,
    },

    data() {
        return {
            formAction: route('web.git-token.store'),
            formMethod: 'post',
            buttonText: 'Create',
            gitForm: useForm({
                name: null,
                token: null,
            }),
        }
    },

    methods: {
        submit: function () {
            this.gitForm.submit(this.formMethod, this.formAction, {
                onSuccess: () => {
                    this.gitForm.reset();
                    this.formAction = route('web.git-token.store');
                    this.buttonText = 'Create';
                    this.formMethod = 'post';
                }
            });
        },

        edit: function (token) {
            this.gitForm.name = token.name
            this.formAction = route('web.git-token.update', token.id);
            this.buttonText = 'Update';
            this.formMethod = 'put';
        }
    }
}
</script>
