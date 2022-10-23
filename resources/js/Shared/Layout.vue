<template>
    <div class="bg-gray-100 from-custom-purple to-custom-blue min-h-screen flex">
        <Head>
            <title>{{ $page.component }}</title>
        </Head>
        <section class="w-1/5 bg-white border-r border-gray-200">
            <Nav />
        </section>

        <section class="w-4/5">
            <slot />
        </section>
    </div>

</template>

<script>
import Nav from "./Nav";
import {Head} from "@inertiajs/inertia-vue3";

export default {
    name: "Layout",
    components: { Nav, Head },

    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
}
</script>
