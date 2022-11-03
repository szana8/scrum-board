<template>
    <div class="antialiased">
        <h2 class="text-gray-800 text-4xl font-semibold">Settings</h2>

        <div class="divide-y">
            <div class="py-12">
                <ul class="space-x-2 flex">
                    <li class="">
                        <Link :href="route('client-credential.index')" method="get" class="px-3 py-2 rounded border border-gray-200 text-gray-600 bg-gray-50">Client Credentials</Link>
                    </li>
                    <li class="">
                        <Link :href="route('client-credential.index')" method="get" class="px-3 py-2 rounded border border-gray-200 shadow text-gray-600 hover:shadow-xl">Git Integration</Link>
                    </li>
                    <li class="">
                        <Link :href="route('client-credential.index')" method="get" class="px-3 py-2 rounded border border-gray-200 shadow text-gray-600 hover:shadow-xl">Issue Types</Link>
                    </li>
                </ul>
            </div>
            <div></div>
        </div>

        <div class="mt-12">
            <slot></slot>
        </div>

    </div>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
</script>
