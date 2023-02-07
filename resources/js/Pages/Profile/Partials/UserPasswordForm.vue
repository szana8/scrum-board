<template>
    <div class="w-1/3">
        <settings-description
            :title="'Update Password'"
            :description="'Ensure your account is using a long, random password to stay secure.'"
        />
    </div>

    <div class="w-2/3">
        <form
            class="mt-8"
            method="POST"
            @submit.prevent="updatePassword"
        >
            <div class="border border-gray-100 shadow-xl rounded-xl">
                <div class="p-12 space-y-5">
                    <standard-input-field
                        v-model="state.passwordChangeForm.current_password"
                        :error="state.passwordChangeForm.errors.current_password"
                        :label="'Current Password'"
                        :placeholder="'Current Password'"
                        :type="'password'"
                    />

                    <standard-input-field
                        v-model="state.passwordChangeForm.password"
                        :error="state.passwordChangeForm.errors.password"
                        :label="'New Password'"
                        :placeholder="'New Password'"
                        :type="'password'"
                    />

                    <standard-input-field
                        v-model="state.passwordChangeForm.confirm_password"
                        :error="state.passwordChangeForm.errors.confirm_password"
                        :label="'Confirm Password'"
                        :placeholder="'Confirm Password'"
                        :type="'password'"
                    />
                </div>

                <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                    <standard-button :text="state.buttonText" />
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import {reactive} from "vue";
import {useForm} from "@inertiajs/vue3";
import StandardButton from "../../../Components/StandardButton.vue";
import StandardInputField from "../../../Components/StandardInputField.vue";
import SettingsDescription from "../../Settings/Shared/SettingsDescription.vue";

const state = reactive({
    buttonText: 'Save',
    passwordChangeForm: useForm({
        current_password: null,
        password: null,
        confirm_password: null,
    }),
})

function updatePassword () {
    state.passwordChangeForm.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => state.passwordChangeForm.reset()
    })
}

</script>

