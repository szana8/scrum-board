<template>
    <Modal>
        <template #title>
            Create Issue
        </template>
        <div class="px-4">
            <form action="">
                <standard-input-field
                    :label="'Project'"
                    :placeholder="'Project'"
                    class="text-sm"
                    v-model="state.issueForm.project"
                    />
            </form>
        </div>
    </Modal>
</template>

<script setup>
import Modal from '../../Shared/Modal.vue'
import StandardInputField from "../../Components/StandardInputField.vue";
import {reactive} from "vue";
import {useForm} from "@inertiajs/vue3";

const state = reactive({
    issueForm: useForm({
        project: null,
    })
})

</script>
