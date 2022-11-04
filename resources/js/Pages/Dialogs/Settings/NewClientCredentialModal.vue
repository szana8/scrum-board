<template>
    <Modal>
        <template #title>Your Client Credentials</template>
        <div class="w-full p-4 bg-yellow-100 text-yellow-600 text-xs rounded-xl my-4">
            <b>Attention!</b> Please save your secret into a safe place. The Client Secret has stored as an encrypted format so we can not resend you later.
        </div>

        <div class="space-y-4">
            <div class="space-y-1">
                <div class="text-gray-700 font-semibold text-sm">Client ID</div>
                <div class="text-gray-700 font-semibold text-sm bg-gray-100 w-full px-4 py-2 rounded border border-gray-200">{{ clientId }}</div>
            </div>

            <div class="space-y-1">
                <div class="text-gray-700 font-semibold text-sm">Client Secret</div>
                <div class="text-gray-700 font-semibold text-sm bg-gray-100 w-full px-4 py-2 rounded border border-gray-200">{{ clientSecret }}</div>
            </div>

            <div class="flex justify-end space-x-2">
                <Link :href="route('client-credential.close')" method="get" class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">Close</Link>
            </div>

        </div>
    </Modal>
</template>

<script>
import Modal from "../../../Shared/Modal"
import { Link } from '@inertiajs/inertia-vue3'

export default {
    props: {
        clientId: '',
        clientSecret: '',
    },

    components: {
        Link,
        Modal,
    }
}
</script>
