<template>
    <div class="mt-1">
        <div v-if="this.issues && this.issues.length > 0" class="">
            <perfect-scrollbar ref="ps" class="scroll-area space-y-4 h-screen" :settings="settings">
                <filtered-issue-card class="p-4 rounded shadow w-full border text-sm border-gray-200 border-l-orange-400 border-l-4" v-for="issue in issues" :key="issue.id" :issue="issue" />
            </perfect-scrollbar>
        </div>

        <div v-else>
            <div class="text-center mt-4">There is no result with these criteria...</div>
        </div>
    </div>
</template>

<script setup>
import FilteredIssueCard from "./FilteredIssueCard.vue";

const settings = {
        maxScrollbarLength: 60
    };

defineProps({
    issues: Array
})
</script>
