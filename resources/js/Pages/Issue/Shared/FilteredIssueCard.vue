<template>
    <div class="p-4 rounded shadow w-full border text-sm border-gray-200 border-l-orange-400 border-l-4">
        <div class="flex">
            <img :src="issue.reporter.avatar" class="block rounded-full mb-4 w-8 h-8" alt="" />
            <div class="ml-4 w-full">
                <div class="flex justify-between">
                    <div class="no-underline text-blue uppercase font-semibold">{{ issue.project.key + '-' + issue.id }}</div>
                </div>

                <h5 class="text-grey-500">{{ issue.title }}</h5>
            </div>
        </div>
        <div class="flex mt-4" v-if="true">
            <div class="text-grey-dark text-sm">Type</div>
            <div class="ml-5 flex items-stretch">
                <img :src="issue.type.icon.replace('storage', '../../storage')" class="w-4 h-4 self-center" alt="" />
                <h5 class="mx-2 text-grey-darkest self-center">{{ issue.type.name }}</h5>
            </div>
        </div>
        <div class="flex mt-2" v-if="true">
            <div class="text-grey-dark text-sm">Due</div>
            <div class="ml-6">
                <h5 class="inline-block text-grey-darkest">{{ issue.due_date }}</h5>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    issue: Object,
})
</script>
