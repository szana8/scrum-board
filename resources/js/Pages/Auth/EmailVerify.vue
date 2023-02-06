<template>
    <Head title="Email Verification" />

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-sm text-gray-600">Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</div>

            <div
                v-if="verificationLinkSent"
                class="mb-4 font-medium text-sm text-green-600"
            >
                A new verification link has been sent to the email address you provided in your profile settings.
            </div>

            <form @submit.prevent="submit">
                <div class="mt-4 flex items-center justify-between">
                    <Link
                        as="button"
                        class="py-1 px-3 text-sm rounded-xl bg-indigo-400 shadow-md text-white font-bold hover:bg-indigo-600"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="submit"
                    >
                        Resend Verification Email
                    </Link>

                    <div>
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 ml-2"
                        >
                            Log Out
                        </Link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    layout: null,
}
</script>

<script setup>
import { computed } from 'vue'
import { Link, useForm, Head } from '@inertiajs/vue3'

const props = defineProps({
    status: String,
})

const form = useForm()

const submit = () => {
    form.post(route('verification.send'))
}

const verificationLinkSent = computed(() => props.status === 'verification-link-sent')
</script>
