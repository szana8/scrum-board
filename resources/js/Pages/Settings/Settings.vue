<template>
    <div class="antialiased">
        <h2 class="text-gray-800 text-4xl font-semibold">Settings</h2>
        <div class="divide-y">
            <div class="py-12">
                <ul class="space-x-2 flex text-sm font-bold">
                    <li class="">
                        <SettingsLink
                            :href="route('web.client-credential.index')"
                            :active="$page.component === 'Settings/Tabs/ClientCredentials'"
                            class="px-3 py-2 rounded border border-gray-200 text-gray-600"
                        >
                            Client Credentials
                        </SettingsLink>
                    </li>
                    <li class="">
                        <SettingsLink
                            :href="route('web.git-token.index')"
                            :active="$page.component === 'Settings/Tabs/GitIntegration'"
                            class="px-3 py-2 rounded border border-gray-200 text-gray-600"
                        >
                            Git Integration
                        </SettingsLink>
                    </li>
                    <li class="">
                        <SettingsLink
                            :href="route('web.issue-type.index')"
                            :active="$page.component === 'Settings/Tabs/IssueTypes'"
                            class="px-3 py-2 rounded border border-gray-200 text-gray-600"
                        >
                            Issue Types
                        </SettingsLink>
                    </li>
                    <li class="">
                        <SettingsLink
                            :href="route('web.issue-type-schema.index')"
                            :active="$page.component === 'Settings/Tabs/IssueTypeSchemes'"
                            class="px-3 py-2 rounded border border-gray-200 text-gray-600"
                        >
                            Issue Types Schemes
                        </SettingsLink>
                    </li>
                    <li class="">
                        <SettingsLink
                            :href="route('web.issue-type.index')"
                            :active="$page.component === 'Settings/Tabs/Teams'"
                            class="px-3 py-2 rounded border border-gray-200 text-gray-600"
                        >
                            Teams
                        </SettingsLink>
                    </li>
                    <li class="">
                        <SettingsLink
                            :href="route('web.project.index')"
                            :active="$page.component === 'Settings/Tabs/Projects'"
                            class="px-3 py-2 rounded border border-gray-200 text-gray-600"
                        >
                            Projects
                        </SettingsLink>
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
import SettingsLink from './Shared/SettingsLink'
</script>
