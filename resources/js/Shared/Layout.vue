<template>
    <div class="bg-white from-custom-purple to-custom-blue min-h-screen flex">
        <Head>
            <title>{{ $page.component }}</title>
        </Head>
        <section class="w-1/6 bg-white border-r border-gray-100 h-screen sticky top-0">
            <Sidebar />
        </section>

        <section class="w-5/6">
            <div class="h-16 border-b border-gray-100 flex items-center sticky bg-white top-0 z-10">
                <Nav></Nav>
            </div>
            <div class="p-12 overflow-y-auto z-1" scroll-region>
                <slot />
            </div>
        </section>
    </div>

    <Modal />
</template>

<script>
import {Head} from "@inertiajs/inertia-vue3";
import Sidebar from "./Sidebar";
import Nav from "./Nav";

export default {
    name: "Layout",
    components: {Sidebar, Head, Nav },

    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    },
}
</script>

<script setup>
import { Modal } from 'momentum-modal'
</script>
