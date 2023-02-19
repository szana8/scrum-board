<template>
    <div class="antialiased">
        <h2 class="text-gray-800 text-4xl font-semibold">Issues</h2>
        <div class="w-1/5 space-y-4">
            <filtered-issues :issues="issues" />
        </div>
    </div>
</template>

<script setup>
import FilteredIssues from "./Shared/FilteredIssues.vue";

defineProps({
    issues: Array
})
</script>

