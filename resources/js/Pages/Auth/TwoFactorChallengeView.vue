<template>
    <Head title="Two-factor Confirmation" />

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-sm text-gray-600">Please confirm access to your account by entering the authentication code provided by your authenticator application.</div>

            <div
                v-if="status"
                class="mb-4 font-medium text-sm text-green-600"
            >
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div>
                    <label for="email">Code</label>
                    <input
                        id="email"
                        v-model="form.code"
                        type="text"
                        class="w-full bg-white py-3 px-4 border-1 border-gray-300 rounded"
                    />
                    <p
                        class="mt-2"
                        v-if="form.errors.code"
                        v-html="form.errors.code"
                    />
                </div>

                <div>
                    <label for="email">Recovery Code</label>
                    <input
                        v-model="form.recovery_code"
                        type="text"
                        class="w-full bg-white py-3 px-4 border-1 border-gray-300 rounded"
                    />
                    <p
                        class="mt-2"
                        v-if="form.errors.recovery_code"
                        v-html="form.errors.recovery_code"
                    />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button
                        type="submit"
                        class="py-1 px-3 text-sm rounded-xl bg-indigo-400 shadow-md text-white font-bold hover:bg-indigo-600"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log In
                    </button>
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
import { useForm, Head } from '@inertiajs/vue3'

defineProps({
    status: String,
})
const form = useForm({
    code: '',
    recovery_code: '',
})
const submit = () => {
    form.post(route('two-factor.login'))
}
</script>
