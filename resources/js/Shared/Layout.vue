<template>
    <div class="bg-white from-custom-purple to-custom-blue min-h-screen flex">
        <Head>
            <title>{{ $page.component }}</title>
        </Head>
        <section class="w-1/6 bg-white border-r border-gray-100">
            <Sidebar />
        </section>

        <section class="w-5/6">
            <div class="h-16 border-b border-gray-100"></div>
            <slot />
        </section>
    </div>

    <Modal />
</template>

<script>
import {Head} from "@inertiajs/inertia-vue3";
import Sidebar from "./Sidebar";

export default {
    name: "Layout",
    components: {Sidebar, Head },

    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
}
</script>

<script setup>
import { Modal } from 'momentum-modal'
</script>
