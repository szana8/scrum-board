<template>
    <div class="w-1/3">
        <settings-description
            :title="'Profile Information'"
            :description="'Update your account\'s profile information and email address.'"
        />
    </div>

    <div class="w-2/3">
        <form
            class="mt-8"
            method="POST"
            @submit.prevent="updateProfileInformation"
        >
            <div class="border border-gray-100 shadow-xl rounded-xl">
                <div class="p-12 space-y-5">
                    <standard-input-field
                        v-model="profileForm.name"
                        :error="profileForm.errors.name"
                        :label="'Name'"
                        :placeholder="'Name'"
                    />

                    <standard-input-field
                        v-model="profileForm.email"
                        :error="profileForm.errors.email"
                        :label="'Email'"
                        :placeholder="'Email'"
                    />
                </div>

                <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                    <standard-button :text="'Save'" />
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import StandardButton from "../../../Components/StandardButton.vue";
import StandardInputField from "../../../Components/StandardInputField.vue";
import SettingsDescription from "../../Settings/Shared/SettingsDescription.vue";

const props = defineProps({
    user: Object,
});

const profileForm = useForm({
    name: props.user.username,
    email: props.user.email,
});

function updateProfileInformation() {
    profileForm.put(route('user-profile-information.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => profileForm.reset()
    })
}
</script>

