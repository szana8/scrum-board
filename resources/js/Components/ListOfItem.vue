<template>
    <li>
        <slot />
        <a href="#" v-if="editLink" class="href text-gray-400 font-semibold text-sm hover:text-gray-300" @click="edit(editProp)">Edit</a>
        <Link v-if="deleteLink" :href="deleteLink" method="delete" as="button" preserve-scroll :only="['clientCredentials']" class="href text-red-600 font-semibold text-sm">Delete</Link>
    </li>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "ListOfItem",

    props: {
        deleteLink: null,
        editLink: null,
        editProp: null,
    },

    components: {
        Link
    },

    methods: {
        edit(props) {
            this.$emit.edit(props);
        }
    }
}
</script>
