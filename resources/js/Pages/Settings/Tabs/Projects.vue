<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Create Project</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        A <b>Tassking.io</b> project is a collection of issues. Your team could use a <b>Tassking.io</b> project to coordinate the development of a product, track a project, manage a help desk, and more, depending on your requirements.
                    </p>
                </div>

                <div class="w-2/3">
                    <form class="mt-8" method="POST" @submit.prevent="submit">
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Name</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Name of the project" v-model="projectForm.name" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="projectForm.errors.name" v-text="projectForm.errors.name"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Key</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Key" v-model="projectForm.key" />
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="projectForm.errors.key" v-text="projectForm.errors.key"></p>
                                </div>

                                <div>
                                    <div class="p-0.5 text-gray-500 font-semibold">Description</div>
                                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                        <textarea name="description" id="description" rows="3" placeholder="Short description of the project" class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" v-model="projectForm.description"></textarea>
                                    </div>
                                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="projectForm.errors.description" v-text="projectForm.errors.description"></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex py-12">
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Manage projects</h4>
                    <p class="text-gray-400 text-sm mt-4">
                        You may delete any of your existing project if they are no longer needed
                    </p>
                </div>

                <div class="w-2/3">
                    <div class="border border-gray-100 shadow-xl rounded-xl">
                        <div class="p-12">


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </settings>
</template>

<script>
import Settings from "../Settings";
import { Link } from '@inertiajs/inertia-vue3'
import {useForm} from "@inertiajs/inertia-vue3";

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
            projectForm: useForm({
                name: '',
                key: '',
                description: '',
            }),
        }
    },

    methods: {
        submit: function () {
            //
        },

        edit: function (token) {
            //
        }
    }
}
</script>
