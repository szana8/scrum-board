<template>
    <div class="antialiased">
        <h2 class="text-gray-800 text-4xl font-semibold">Profile</h2>
        <div class="py-12">
            <div class="space-y-28 divide-y">
                <div class="flex">
                    <div class="w-1/3">
                        <h4 class="text-xl antialiased capitalized">Profile Information</h4>
                        <p class="text-gray-400 text-sm mt-4">
                            Update your account's profile information and email address.
                        </p>
                    </div>

                    <div class="w-2/3">
                        <form class="mt-8" method="POST" @submit.prevent="this.submit">
                            <div class="border border-gray-100 shadow-xl rounded-xl">
                                <div class="p-12 space-y-5">
                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">Name</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="Name" v-model="this.profileForm.name" />
                                        </div>
                                        <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="this.profileForm.errors.name" v-text="this.profileForm.errors.name"></p>
                                    </div>

                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">Email</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400" type="text" placeholder="user@mail.com" v-model="this.profileForm.email" />
                                        </div>
                                        <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="this.profileForm.errors.email" v-text="this.profileForm.errors.email"></p>
                                    </div>
                                </div>

                                <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                    <button type="submit" class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="flex py-12">
                    <div class="w-1/3">
                        <h4 class="text-xl antialiased capitalized">Update Password</h4>
                        <p class="text-gray-400 text-sm mt-4">
                            Ensure your account is using a long, random password to stay secure.
                        </p>
                    </div>

                    <div class="w-2/3">
                        <form class="mt-8" method="POST" @submit.prevent="this.submit">
                            <div class="border border-gray-100 shadow-xl rounded-xl">
                                <div class="p-12 space-y-5">
                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">Current Password</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                                                   type="password"
                                                   placeholder="Current Password"
                                                   v-model="this.passwordChangeForm.currentPassword"
                                            />
                                        </div>
                                        <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                                           v-if="this.passwordChangeForm.errors.currentPassword"
                                           v-text="this.passwordChangeForm.errors.currentPassword"
                                        />
                                    </div>

                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">New Password</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                                                   type="password"
                                                   placeholder="New Password"
                                                   v-model="this.passwordChangeForm.newPassword"
                                            />
                                        </div>
                                        <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                                           v-if="this.passwordChangeForm.errors.newPassword"
                                           v-text="this.passwordChangeForm.errors.newPassword"
                                        />
                                    </div>

                                    <div>
                                        <div class="p-0.5 text-gray-500 font-semibold">New Password</div>
                                        <div class="rounded-xl p-0.5 border-2 border-gray-300 flex w-2/3">
                                            <input class="bg-white border-0 focus:border-transparent focus:ring-0 w-11/12 placeholder:text-gray-400"
                                                   type="password"
                                                   placeholder="Confirm Password"
                                                   v-model="this.passwordChangeForm.confirmPassword"
                                            />
                                        </div>
                                        <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                                           v-if="this.passwordChangeForm.errors.confirmPassword"
                                           v-text="this.passwordChangeForm.errors.confirmPassword"
                                        />
                                    </div>
                                </div>

                                <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                    <button type="submit" class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="flex py-12">
                    <div class="w-1/3">
                        <h4 class="text-xl antialiased capitalized">Two Factor Authentication</h4>
                        <p class="text-gray-400 text-sm mt-4">
                            Add additional security to your account using two factor authentication.
                        </p>
                    </div>

                    <div class="w-2/3">
                        <div class="border border-gray-100 shadow-xl rounded-xl">
                            <div class="p-12 space-y-5">
                                <div v-if="!twoFactorEnabled">
                                    <h3 class="text-lg font-medium text-gray-900">
                                        You have not enabled two factor authentication.
                                    </h3>
                                    <div class="mt-3 text-sm text-gray-600">
                                        <p>
                                            When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.
                                        </p>
                                    </div>
                                </div>

                                <div v-else>
                                    <div v-if="qrCode">
                                        <div class="mt-4 max-w-xl text-sm text-gray-600">
                                            <p v-if="confirming" class="font-semibold">
                                                To finish enabling two factor authentication, scan the following QR code using your phone's authenticator application or enter the setup key and provide the generated OTP code.
                                            </p>
                                            <p v-else>
                                                Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application or enter the setup key.
                                            </p>
                                        </div>

                                        <div class="mt-4" v-html="qrCode" />

                                        <div class="mt-4 max-w-xl text-sm text-gray-600" v-if="setupKey">
                                            <p class="font-semibold">
                                                Setup Key: <span v-html="setupKey"></span>
                                            </p>
                                        </div>
                                    </div>

                                    <div v-if="this.recoveryCodes">
                                        <div class="mt-4 max-w-xl text-sm text-gray-600">
                                            <p class="font-semibold">
                                                Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.
                                            </p>
                                        </div>
                                        <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                                            <div v-for="code in this.recoveryCodes" :key="code">
                                                {{ code }}
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                                <Link :href="route('two-factor.enable')" method="post" preserve-scroll class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">Enable</Link>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {useForm, usePage} from "@inertiajs/inertia-vue3";
import { Link } from '@inertiajs/inertia-vue3'

export default {

    props: {
        clientCredentials: Array,
    },

    components: {
        Link,
    },

    created() {
        this.getQrCode();
    },

    computed: {
        twoFactorEnabled() {
            return this.$page.props.auth.user?.two_factor_enabled;
        },
    },

    data() {
        return {
            qrCode: null,
            setupKey: null,
            recoveryCodes: null,
            profileForm: useForm({
                name: null,
                email: null,
            }),

            passwordChangeForm: useForm({
                currentPassword: null,
                newPassword: null,
                confirmPassword: null,
            }),
        }
    },

    methods: {
        getQrCode() {
            return axios.get(route('two-factor-qr-code')).then(response => {
                this.qrCode = response.data.svg;
                this.setupKey = response.data.secretKey;
                this.recoveryCodes = response.data.recoveryCodes;
            });
        }
    }
}

</script>
