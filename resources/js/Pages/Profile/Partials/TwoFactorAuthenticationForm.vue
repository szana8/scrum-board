<template>
    <div class="w-full flex">
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

                        <div v-if="confirming" class="mt-4">
                            <label>Confirmation Code</label>
                            <input
                                id="code"
                                v-model="confirmationForm.code"
                                type="text"
                                name="code"
                                class="block mt-1 w-1/2"
                                inputmode="numeric"
                                autofocus
                                autocomplete="one-time-code"
                                @keyup.enter="confirmTwoFactorAuthentication"
                            />
                            <div v-if="confirmationForm.errors.code" v-text="confirmationForm.errors.code" class="mt-2 text-red-600" />
                        </div>

                        <div v-if="recoveryCodes.length > 0 && ! confirming">
                            <div class="mt-4 max-w-xl text-sm text-gray-600">
                                <p class="font-semibold">
                                    Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.
                                </p>
                            </div>
                            <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                                <div v-for="code in recoveryCodes" :key="code">
                                    {{ code }}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="px-12 w-full bg-gray-50 py-6 justify-end flex">
                    <Link href="#" @click="enableTwoFactorAuthentication" preserve-scroll class="bg-slate-800 text-white rounded px-3 py-1 uppercase antialiased">Enable</Link>
                </div>
            </div>
        </div>

    </div>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { ref, computed, watch } from 'vue';
import axios from "axios";
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    requiresConfirmation: true,
});

const enabling = ref(false);
const confirming = ref(false);
const disabling = ref(false);
const qrCode = ref(null);
const setupKey = ref(null);
const recoveryCodes = ref([])

const confirmationForm = useForm({
    code: '',
});

const twoFactorEnabled = computed(
    () => ! enabling.value && usePage().props.value.auth.user?.two_factor_enabled,
);

watch(twoFactorEnabled, () => {
    if (! twoFactorEnabled.value) {
        confirmationForm.reset();
        confirmationForm.clearErrors();
    }
});

const enableTwoFactorAuthentication = () => {
    enabling.value = true;
    Inertia.post(route('two-factor.enable'), {}, {
        preserveScroll: true,
        onSuccess: () => Promise.all([
            showQrCode(),
            showRecoveryCodes(),
        ]),
        onFinish: () => {
            enabling.value = false;
            confirming.value = props.requiresConfirmation;
        },
    });
};

const showQrCode = () => {
    return axios.get(route('two-factor-qr-code.index')).then(response => {
        qrCode.value = response.data.svg;
        setupKey.value = response.data.setupKey;
    });
};

const showRecoveryCodes = () => {
    return axios.get(route('two-factor-recovery-code.index')).then(response => {
        console.log(response.data);
        recoveryCodes.value = response.data;
    });
};

const confirmTwoFactorAuthentication = () => {
    confirmationForm.post('/user/confirmed-two-factor-authentication', {
        errorBag: "confirmTwoFactorAuthentication",
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            confirming.value = false;
            qrCode.value = null;
            setupKey.value = null;
        },
    });
};
const regenerateRecoveryCodes = () => {
    axios
        .post('/user/two-factor-recovery-codes')
        .then(() => showRecoveryCodes());
};

const disableTwoFactorAuthentication = () => {
    disabling.value = true;
    Inertia.delete('/user/two-factor-authentication', {
        preserveScroll: true,
        onSuccess: () => {
            disabling.value = false;
            confirming.value = false;
        },
    });
};

</script>
