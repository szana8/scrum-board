<template>
    <Head title="Reset Password" />

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <form @submit.prevent="submit">
                <div>
                    <label for="email" class="ml-2 mt-0.5 text-sm font-bold text-indigo-400 hover:text-indigo-600 cursor-pointer">Email</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="w-full bg-white py-3 px-4 border-1 border-gray-300 rounded"
                        required
                        autofocus
                    />
                    <p class="mt-2" v-if="form.errors.email" v-html="form.errors.email" />
                </div>

                <div class="mt-4">
                    <label for="password" class="ml-2 mt-0.5 text-sm font-bold text-indigo-400 hover:text-indigo-600 cursor-pointer">Password</label>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="w-full bg-white py-3 px-4 border-1 border-gray-300 rounded"
                        required
                        autocomplete="new-password"
                    />
                    <p class="mt-2" v-if="form.errors.password" v-html="form.errors.password" />
                </div>

                <div class="mt-4">
                    <label for="password_confirmation" class="ml-2 mt-0.5 text-sm font-bold text-indigo-400 hover:text-indigo-600 cursor-pointer">Confirm Password</label>
                    <input
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="w-full bg-white py-3 px-4 border-1 border-gray-300 rounded"
                        required
                        autocomplete="new-password"
                    />
                    <p class="mt-2" v-if="form.errors.password" v-html="form.errors.password_confirmation" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="py-1 px-3 text-sm rounded-xl bg-indigo-400 shadow-md text-white font-bold hover:bg-indigo-600"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Reset Password
                    </button>
                </div>
            </form>

        </div>
    </div>

</template>

<script>
export default {
    layout: null
}
</script>

<script setup>
import {useForm, Head} from "@inertiajs/inertia-vue3";

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
