<template>
    <settings>
        <div class="space-y-28 divide-y">
            <div class="flex">
                <div class="w-1/3">
                    <h4 class="text-xl antialiased capitalized">Create Project</h4>
                    <p class="text-gray-400 text-sm mt-4">

                    </p>
                </div>

                <div class="w-2/3">
                    <div class="border border-gray-100 shadow-xl rounded-xl">
                        <div class="p-12">


                        </div>
                    </div>
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
           //
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
