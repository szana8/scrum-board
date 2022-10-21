<template>
    <div class="px-6 py-4">
        <Logo />
        <nav class="items-center mt-12">
            <ul class="space-y-2 list-inside text-sm text-gray-500">
                <li><nav-link href="/dashboard" :active="$page.component === 'Dashboard'">Dashboard</nav-link></li>
                <li><nav-link href="/settings" :active="$page.component === 'Settings'">Settings</nav-link></li>
                <li><nav-link href="/users" :active="$page.component === 'Users'">Users</nav-link></li>
            </ul>
            <!--
            <ul class="flex space-x-4 list-inside">
                <li><nav-link href="/dashboard" :active="$page.component === 'Dashboard'">Dashboard</nav-link></li>
                <li><nav-link href="/settings" :active="$page.component === 'Settings'">Settings</nav-link></li>
                <li><nav-link href="/users" :active="$page.component === 'Users'">Users</nav-link></li>
            </ul>
            -->
        </nav>
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

