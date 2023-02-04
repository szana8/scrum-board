<template>
    <div>
        <div class="w-full p-4 bg-blue-50 text-blue-600 border border-blue-200 text-xs rounded-xl mb-4">
            <b>Attention!</b> Please save your secret into a safe place. The Client Secret has stored as an encrypted format so we can not resend you later.
        </div>

        <div class="space-y-4">
            <div class="space-y-1">
                <div class="text-blue-600 font-semibold text-sm">Client ID</div>
                <div class="text-blue-600 font-semibold text-sm bg-blue-50 w-full px-4 py-2 rounded border border-blue-200">{{ props.clientId }}</div>
            </div>

            <div class="space-y-1">
                <div class="text-blue-600 font-semibold text-sm">Client Secret</div>
                <div class="text-blue-600 font-semibold text-sm bg-blue-50 w-full px-4 py-2 rounded border border-blue-200">{{ props.clientSecret }}</div>
            </div>

        </div>
    </div>
</template>

<script setup>

const props = defineProps({
    clientId: '',
    clientSecret: '',
})

</script>
