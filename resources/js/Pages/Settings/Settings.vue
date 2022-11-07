<template>
    <div class="antialiased">
        <h2 class="text-gray-800 text-4xl font-semibold">Settings</h2>
        <div class="divide-y">
            <div class="py-12">
                <ul class="space-x-2 flex text-xs font-bold">
                    <li class="">
                        <SettingsLink :href="route('web.client-credential.index')"
                                      :active="$page.component === 'Settings/Tabs/ClientCredentials'"
                                      method="get"
                                      class="px-3 py-2 rounded border border-gray-200 text-gray-600">
                            Client Credentials
                        </SettingsLink>
                    </li>
                    <li class="">
                        <SettingsLink :href="route('web.git-token.index')"
                                      method="get"
                                      :active="$page.component === 'Settings/Tabs/GitIntegration'"
                                      class="px-3 py-2 rounded border border-gray-200 text-gray-600">
                            Git Integration
                        </SettingsLink>
                    </li>
                    <li class="">
                        <SettingsLink :href="route('web.issue-type.index')"
                                      method="get"
                                      :active="$page.component === 'Settings/Tabs/IssueTypes'"
                                      class="px-3 py-2 rounded border border-gray-200 text-gray-600">
                            Issue Types
                        </SettingsLink>

                    </li>
                    <li class="">
                        <SettingsLink :href="route('web.issue-type-schema.index')"
                                      method="get"
                                      :active="$page.component === 'Settings/Tabs/IssueTypeSchemes'"
                                      class="px-3 py-2 rounded border border-gray-200 text-gray-600">
                            Issue Types Schemes
                        </SettingsLink>
                    </li>
                    <li class="">
                        <SettingsLink :href="route('web.issue-type.index')"
                                      method="get"
                                      :active="$page.component === 'Settings/Tabs/Teams'"
                                      class="px-3 py-2 rounded border border-gray-200 text-gray-600">
                            Teams
                        </SettingsLink>
                    </li>
                    <li class="">
                        <SettingsLink :href="route('web.projects.index')"
                                      method="get"
                                      :active="$page.component === 'Settings/Tabs/Projects'"
                                      class="px-3 py-2 rounded border border-gray-200 text-gray-600">
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

<script>
import SettingsLink from './Shared/SettingsLink';
export default {
    name: "Settings",
    components: { SettingsLink },
}
</script>
