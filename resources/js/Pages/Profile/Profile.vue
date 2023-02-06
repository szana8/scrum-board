<template>
    <div class="antialiased">
        <h2 class="text-gray-800 text-4xl font-semibold">Profile</h2>
        <div class="py-12">
            <div class="space-y-28 divide-y">
                <div class="flex">
                    <div class="w-1/3">
                        <h4 class="text-xl antialiased capitalized">Profile Information</h4>
                        <p class="text-gray-400 text-sm mt-4">Update your account's profile information and email address.</p>
                    </div>

                    <div class="w-2/3">
                        <form
                            class="mt-8"
                            method="POST"
                            @submit.prevent="this.updateProfileInformation"
                        >
                            <div class="border border-gray-100 shadow-xl rounded-xl">
                                <div class="p-12 space-y-5">
                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">Name</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input
                                                class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                                                type="text"
                                                placeholder="Name"
                                                v-model="state.profileForm.name"
                                            />
                                        </div>
                                        <p
                                            class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                                            v-if="state.profileForm.errors.name"
                                            v-text="state.profileForm.errors.name"
                                        ></p>
                                    </div>

                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">Email</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input
                                                class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                                                type="text"
                                                placeholder="user@mail.com"
                                                v-model="state.profileForm.email"
                                            />
                                        </div>
                                        <p
                                            class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                                            v-if="state.profileForm.errors.email"
                                            v-text="state.profileForm.errors.email"
                                        ></p>
                                    </div>
                                </div>

                                <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                    <button
                                        type="submit"
                                        class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased"
                                    >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="flex py-12">
                    <div class="w-1/3">
                        <h4 class="text-xl antialiased capitalized">Update Password</h4>
                        <p class="text-gray-400 text-sm mt-4">Ensure your account is using a long, random password to stay secure.</p>
                    </div>

                    <div class="w-2/3">
                        <form
                            class="mt-8"
                            method="POST"
                            @submit.prevent="submit"
                        >
                            <div class="border border-gray-100 shadow-xl rounded-xl">
                                <div class="p-12 space-y-5">
                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">Current Password</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input
                                                class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                                                type="password"
                                                placeholder="Current Password"
                                                v-model="state.passwordChangeForm.currentPassword"
                                            />
                                        </div>
                                        <p
                                            class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                                            v-if="state.passwordChangeForm.errors.currentPassword"
                                            v-text="state.passwordChangeForm.errors.currentPassword"
                                        />
                                    </div>

                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">New Password</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input
                                                class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                                                type="password"
                                                placeholder="New Password"
                                                v-model="state.passwordChangeForm.newPassword"
                                            />
                                        </div>
                                        <p
                                            class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                                            v-if="state.passwordChangeForm.errors.newPassword"
                                            v-text="state.passwordChangeForm.errors.newPassword"
                                        />
                                    </div>

                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">Confirm Password</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input
                                                class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                                                type="password"
                                                placeholder="Confirm Password"
                                                v-model="state.passwordChangeForm.confirmPassword"
                                            />
                                        </div>
                                        <p
                                            class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                                            v-if="state.passwordChangeForm.errors.confirmPassword"
                                            v-text="state.passwordChangeForm.errors.confirmPassword"
                                        />
                                    </div>
                                </div>

                                <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                    <button
                                        type="submit"
                                        class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased"
                                    >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="flex py-12">
                    <!-- <two-factor-authentication-form /> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/vue3'
import { reactive } from 'vue'
// import TwoFactorAuthenticationForm from "./Partials/TwoFactorAuthenticationForm"

const props = defineProps({
    passwordConfirmed: false,
})

const state = reactive({
    profileForm: useForm({
        name: usePage().props.auth.user.username,
        email: usePage().props.auth.user.email,
    }),

    passwordChangeForm: useForm({
        currentPassword: null,
        newPassword: null,
        confirmPassword: null,
    }),
})

function updateProfileInformation() {
    state.profileForm.put(route('user-profile-information.update'))
}
</script>
