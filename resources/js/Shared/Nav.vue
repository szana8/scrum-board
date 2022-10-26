<template>
    <div class="min-h-screen grid content-between">
        <div class="h-20 border-b border-gray-100">

        </div>
        <div>
            <nav class="">

                <!--
                <ul class="flex space-x-4 list-inside">
                    <li><nav-link href="/dashboard" :active="$page.component === 'Dashboard'">Dashboard</nav-link></li>
                    <li><nav-link href="/settings" :active="$page.component === 'Settings'">Settings</nav-link></li>
                    <li><nav-link href="/users" :active="$page.component === 'Users'">Users</nav-link></li>
                </ul>
                -->

            </nav>
        </div>

        <div>
            <ul class="space-y-2 list-inside text-sm text-gray-500">
                <li><nav-link href="/settings" :active="$page.component === 'Settings'">Settings</nav-link></li>
                <li><nav-link href="/logout">Logout</nav-link></li>
            </ul>
        </div>

    </div>
</template>

<script>
import NavLink from "./NavLink";
import Logo from "./Logo";
export default {
    name: "Nav",
    components: { NavLink, Logo }
}
</script>

