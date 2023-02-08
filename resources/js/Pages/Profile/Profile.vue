<template>
    <div class="antialiased">
        <h2 class="text-gray-800 text-4xl font-semibold">Profile</h2>
        <div class="py-12">
            <div class="space-y-28 divide-y">
                <div class="flex">
                    <update-profile-information-form :user="usePage().props.auth.user" />
                </div>

                <div class="flex py-12">
                    <user-password-form />
                </div>

                <div class="flex py-12">
                    <two-factor-authentication-form />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import UserPasswordForm from "./Partials/UserPasswordForm.vue";
import TwoFactorAuthenticationForm from './Partials/TwoFactorAuthenticationForm'
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import {usePage} from "@inertiajs/vue3";

const props = defineProps({
    passwordConfirmed: false,
})

</script>
