<template>
    <div class="min-h-screen grid content-between">
        <div class="">
            <div class="h-16 border-b border-gray-100 w-full px-6 items-center flex">
                <Logo />
            </div>

            <div class="px-6">
                <div class="justify-between mt-3">
                    <div class="space-y-3">
                        <div v-for="project in projects" :key="project.id" @click="openProject(project.id)" >
                            <div class="w-full py-4 px-4 bg-white border border-gray-200 text-gray-600 rounded flex space-x-3 shadow text-sm font-semibold items-stretch hover:grayscale-0 hover:cursor-pointer hover:shadow-xl"
                                 :class="[ state.openProjectId === project.id ? 'border-r-2 border-r-blue-400': '']"
                            >
                                <img :src="project.icon" alt="" class="w-6 h-6">
                                <div class="self-center">{{ project.name }}</div>
                            </div>
                            <project-links v-if="state.openProjectId === project.id" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="flex justify-between px-6 pb-12">
                <ul class="space-y-4 list-inside text-sm">
                    <li>
                        <side-link
                            :href="route('web.client-credential.index')"
                            :active="$page.component.startsWith('Settings')"
                            class="flex space-x-2 text-gray-400 font-semibold hover:text-gray-600"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                            </svg>

                            <div>Settings</div>
                        </side-link>
                    </li>
                    <li>
                        <side-link
                            :href="route('logout')"
                            method="POST"
                            as="button"
                            class="flex space-x-2 text-gray-400 font-semibold hover:text-gray-600"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-5 h-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"
                                />
                            </svg>
                            <div>Logout</div>
                        </side-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>
import {computed, reactive} from 'vue'
import Logo from '../Components/Logo.vue'
import SideLink from '../Components/SideLink.vue'
import {usePage} from '@inertiajs/vue3'
import ProjectLinks from "../Components/ProjectLinks.vue";

const username = computed(() => {
    return usePage().props.auth.user.username
})

const projects = computed(() => {
    return usePage().props.sidebar.projects
})

const state = reactive({
    openProjectId: null,
});


function openProject(project) {
    state.openProjectId = project;
}

</script>
