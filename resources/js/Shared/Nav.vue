<template>
    <div class="items-center flex w-full">
        <nav class="justify-between flex px-6 w-full items-center">
            <ul class="list-inside flex space-x-12 text-sm">
                <!--
                <li>
                    <nav-link href="/list" :active="$page.component === 'List'" class="flex space-x-2 px-2 pb-4 mt-6 border-b-2 text-gray-400 font-semibold hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                        </svg>
                        <div>List</div>
                    </nav-link>
                </li>
                <li>
                    <nav-link href="/board" :active="$page.component === 'Boards'" class="flex space-x-2 px-2 pb-4 mt-6 border-b-2 text-gray-400 font-semibold hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                        <div>Board</div>
                    </nav-link>
                </li>
                <li>
                    <nav-link href="/calendar" :active="$page.component === 'Calendar'" class="flex space-x-2 px-2 pb-4 mt-6 border-b-2 text-gray-400 font-semibold hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                        <div>Calendar</div>
                    </nav-link>
                </li> -->
            </ul>
            <ul class="space-x-4 list-inside flex items-center">
                <li>
                    <div class="rounded-full px-4 border border-gray-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>

                        <input class="bg-white border-0 border-gray-300 text-gray-500 text-sm focus:border-transparent focus:ring-0 placeholder:text-gray-300" type="text" placeholder="Search..." />
                    </div>
                </li>
                <li>
                    <nav-link href="/calendar" :active="$page.component === 'Calendar'" class="flex space-x-2 px-2 pb-4 mt-6 border-b-2 text-gray-400 font-semibold hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                        </svg>
                    </nav-link>
                </li>
                <li>
                    <nav-link href="/calendar" :active="$page.component === 'Calendar'" class="flex space-x-2 px-2 pb-4 mt-6 border-b-2 text-gray-400 font-semibold hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </nav-link>
                </li>
                <li>
                    <Dropdown placement="right">
                        <!-- Button content -->
                        <template v-slot:button class="flex space-x-2 px-2 pb-4 mt-6 border-b-2 text-gray-400 font-semibold hover:text-gray-600">
                            <img :src="avatar" alt="" class="rounded-full w-7 h-7">
                        </template>

                        <!-- Opened dropdown content -->
                        <template v-slot:content>
                            <a class="flex w-full justify-between items-center rounded px-2 py-1 my-1 hover:bg-indigo-600 hover:text-white" :href="route('profile.index')">Profile</a>
                            <a class="flex w-full justify-between items-center rounded px-2 py-1 my-1 hover:bg-indigo-600 hover:text-white" href="#">Settings</a>
                            <a class="flex w-full justify-between items-center rounded px-2 py-1 my-1 hover:bg-indigo-600 hover:text-white" href="#">Help</a>

                            <hr />

                            <a class="flex w-full justify-between items-center rounded px-2 py-1 my-1 hover:bg-red-600 hover:text-white" href="#">Logout</a>
                        </template>
                    </Dropdown>
                </li>
            </ul>

        </nav>
    </div>
</template>

<script>
import NavLink from "../Components/NavLink";
import Logo from "../Components/Logo";
import Dropdown from "../Components/Dropdown";

export default {
    name: "Nav",
    components: { NavLink, Logo, Dropdown },
    computed: {
        avatar() {
            return this.$page.props.auth.user.avatar;
        },
    }
}
</script>

