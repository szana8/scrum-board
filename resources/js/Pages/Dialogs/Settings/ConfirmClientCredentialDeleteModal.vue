<template>
    <Modal>
        <template #title>Your Client Credentials</template>
        <div class="w-full p-4 bg-yellow-100 text-yellow-600 text-xs rounded-xl my-4">
            <b>Attention!</b> Are you sure want to delete this Client Credential? {{ clientId }}
        </div>

        <div class="flex justify-end space-x-2">
            <Link :href="route('client-credential.index')" class="bg-gray-100 rounded px-3 py-1 uppercase antialiased">No</Link>
            <Link :href="route('client-credential.destroy', [clientId])" method="delete" class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">Yes</Link>
        </div>

    </Modal>
</template>

<script>
import Modal from "../../../Shared/Modal"
import { Link } from '@inertiajs/inertia-vue3'

export default {
    props: {
        clientId: null,
    },

    components: {
        Link,
        Modal,
    }

}

</script>
