<template>
    <div class="items-center flex w-full">
        <nav class="justify-end flex px-6 w-full items-center">
            <ul class="space-x-4 list-inside flex items-center">
                <li>
                    <div class="rounded-full px-4 border border-gray-300 flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5 stroke-gray-400"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                            />
                        </svg>

                        <input
                            class="bg-white border-0 border-gray-300 text-gray-500 text-sm focus:border-transparent focus:ring-0 placeholder:text-gray-300"
                            type="text"
                            placeholder="Search..."
                        />
                    </div>
                </li>
                <li>
                    <nav-link
                        href="/calendar"
                        :active="$page.component === 'Calendar'"
                        class="flex space-x-2 px-2 pb-4 mt-6 border-b-2 text-gray-400 font-semibold hover:text-gray-600"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-7 h-7"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"
                            />
                        </svg>
                    </nav-link>
                </li>
                <li>
                    <nav-link
                        href="/calendar"
                        :active="$page.component === 'Calendar'"
                        class="flex space-x-2 px-2 pb-4 mt-6 border-b-2 text-gray-400 font-semibold hover:text-gray-600"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-7 h-7"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                            />
                        </svg>
                    </nav-link>
                </li>
                <li>
                    <Dropdown placement="right">
                        <!-- Button content -->
                        <template
                            v-slot:button
                            class="flex space-x-2 px-2 pb-4 mt-6 border-b-2 text-gray-400 font-semibold hover:text-gray-600"
                        >
                            <img
                                :src="avatar"
                                alt=""
                                class="rounded-full w-7 h-7"
                            />
                        </template>

                        <!-- Opened dropdown content -->
                        <template v-slot:content>
                            <a
                                class="flex w-full justify-between items-center rounded px-2 py-1 my-1 hover:bg-indigo-600 hover:text-white"
                                :href="route('profile.index')"
                                >Profile</a
                            >
                            <a
                                class="flex w-full justify-between items-center rounded px-2 py-1 my-1 hover:bg-indigo-600 hover:text-white"
                                href="#"
                                >Settings</a
                            >
                            <a
                                class="flex w-full justify-between items-center rounded px-2 py-1 my-1 hover:bg-indigo-600 hover:text-white"
                                href="#"
                                >Help</a
                            >

                            <hr />

                            <a
                                class="flex w-full justify-between items-center rounded px-2 py-1 my-1 hover:bg-red-600 hover:text-white"
                                href="#"
                                >Logout</a
                            >
                        </template>
                    </Dropdown>
                </li>
            </ul>
        </nav>

        <create-issue-modal />
    </div>
</template>

<script setup>
import { computed } from 'vue'
import NavLink from '../Components/NavLink'
import Dropdown from '../Components/Dropdown'
import { usePage } from '@inertiajs/vue3'
import CreateIssueModal from '../Components/CreateIssueModal.vue'

const avatar = computed(() => {
    return usePage().props.auth.user.avatar
})
</script>
