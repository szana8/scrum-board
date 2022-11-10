<template>
    <div class="min-h-screen grid content-between">
        <div class="">
            <div class="h-16 border-b border-gray-100 w-full px-6 items-center flex">
                <Logo />
            </div>

            <div class="px-6">
                <div class="py-6 border-b border-gray-100">
                    <ul class="space-y-4 list-inside text-sm">
                        <li>
                            <side-link :href="route('web.roadmap.index')" :active="$page.component === 'Roadmap'" class="flex space-x-2 text-gray-400 font-semibold hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                                </svg>
                                <div>Roadmap</div>
                            </side-link>
                        </li>
                        <li>
                            <side-link :href="route('web.backlog.index')" :active="$page.component === 'Backlog'" class="flex space-x-2 text-gray-400 font-semibold hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                </svg>
                                <div>Backlog</div>
                            </side-link>
                        </li>
                        <li>
                            <side-link :href="route('web.boards.index')" :active="$page.component === 'Board'" class="flex space-x-2 text-gray-400 font-semibold hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                                <div>Board</div>
                            </side-link>
                        </li>
                        <li>
                            <side-link :href="route('web.reports.index')" :active="$page.component === 'Repors'" class="flex space-x-2 text-gray-400 font-semibold hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                                </svg>
                                <div>Reports</div>
                            </side-link>
                        </li>
                    </ul>
                </div>

                <div class="flex justify-between mt-3">
                    <h4 class="uppercase text-gray-400 text-xs font-bold">Workspace</h4>
                    <Link :href="route('web.project.create')" as="button" method="get" class="text-gray-400 border rounded border-gray-400 px-0.5 py-0.5 hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3 h-3 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </Link>
                </div>

            </div>

        </div>

        <div>
            <div class="flex justify-between px-6 pb-12">
                <ul class="space-y-4 list-inside text-sm">
                    <li>
                        <side-link :href="route('web.client-credential.index')" :active="$page.component === 'Settings'" class="flex space-x-2 text-gray-400 font-semibold hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                            </svg>
                            <div>Settings</div>
                        </side-link>
                    </li>
                    <li>
                        <side-link :href="route('logout')" class="flex space-x-2 text-gray-400 font-semibold hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            <div>Logout</div>
                        </side-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import SideLink from "../Components/SideLink";
import Logo from "../Components/Logo";
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "Sidebar",
    components: { SideLink, Logo, Link },
    computed: {
        projects() {
            return this.$page.props.sidebar.projects;
        },
    },
}
</script>

