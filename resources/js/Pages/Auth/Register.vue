<template>
    <div class="md:flex md:h-screen">
        <div class="md:w-1/2 md:flex bg-gray-100 items-center">
            <div class="w-full mx-auto">
                <div class="px-24">
                    <div class="text-indigo-400 flex">
                        <div class="bg-indigo-400 px-2 py-1 rounded text-white text-sm">T</div>
                        <p class="items-center text-custom-purple-dark text-normal font-sans font-semibold mt-0.5 ml-1">Tassking.io</p>
                    </div>
                    <div class="mt-4">
                        <small class="text-gray-400"
                            >A central hub where teams can work, plan and achieve amazing <br />
                            things togeother.</small
                        >
                    </div>
                </div>
                <img
                    src="storage/images/work-with-the-best.svg"
                    alt=""
                />
            </div>
        </div>

        <div class="md:w-1/2 md:flex items-center mt-12 md:mt-0">
            <div class="w-full px-24">
                <div class="text-3xl font-bold text-gray-700">Register into Tassking.io</div>
                <div class="flex space-x-1 mt-1">
                    <p class="text-gray-500">Already have an account?</p>
                    <Link
                        :href="route('login')"
                        class="href text-indigo-400 font-semibold"
                        >Sign in!</Link
                    >
                </div>

                <form
                    class="mt-8"
                    method="POST"
                    @submit.prevent="submit"
                >
                    <div class="p-0.5 text-gray-500 font-semibold">Name</div>
                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            width="24"
                            height="24"
                            stroke="currentColor"
                            class="m-4 stroke-gray-300"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                            />
                        </svg>

                        <input
                            class="w-11/12 bg-white py-3 px-4 border-0 focus:border-transparent focus:ring-0 placeholder:text-gray-400"
                            type="text"
                            placeholder="John Doe"
                            v-model="form.name"
                        />
                    </div>
                    <p
                        class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                        v-if="form.errors.name"
                        v-text="form.errors.name"
                    ></p>

                    <div class="p-0.5 text-gray-500 font-semibold">E-mail</div>
                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            width="24"
                            height="24"
                            stroke-width="1.5"
                            viewBox="0 0 24 24"
                            class="m-4 stroke-gray-300"
                        >
                            <path d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                        </svg>
                        <input
                            class="w-11/12 bg-white py-3 px-4 border-0 focus:border-transparent focus:ring-0 placeholder:text-gray-400"
                            type="text"
                            placeholder="name@mail.com"
                            v-model="form.email"
                        />
                    </div>
                    <p
                        class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                        v-if="form.errors.email"
                        v-text="form.errors.email"
                    ></p>

                    <div class="p-0.5 text-gray-500 font-semibold mt-6">Password</div>
                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            width="24"
                            height="24"
                            stroke-width="1.5"
                            viewBox="0 0 24 24"
                            class="m-4 stroke-gray-300"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                            />
                        </svg>

                        <input
                            class="w-11/12 bg-white py-3 px-4 border-0 focus:border-transparent focus:ring-0 placeholder:text-gray-400"
                            type="password"
                            placeholder="Password"
                            v-model="form.password"
                        />
                    </div>
                    <p
                        class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                        v-if="form.errors.password"
                        v-text="form.errors.password"
                    ></p>

                    <div class="p-0.5 text-gray-500 font-semibold mt-6">Password Confirmation</div>
                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            width="24"
                            height="24"
                            stroke-width="1.5"
                            viewBox="0 0 24 24"
                            class="m-4 stroke-gray-300"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                            />
                        </svg>

                        <input
                            class="w-11/12 bg-white py-3 px-4 border-0 focus:border-transparent focus:ring-0 placeholder:text-gray-400"
                            type="password"
                            placeholder="Password confirmation"
                            v-model="form.passwordConfirmation"
                        />
                    </div>
                    <p
                        class="mt-2 ml-2 text-red-400 text-xs font-semibold italic"
                        v-if="form.errors.password_confirmation"
                        v-text="form.errors.password_confirmation"
                    ></p>

                    <div class="mt-6">
                        <button
                            type="submit"
                            class="w-full py-6 px rounded-xl bg-indigo-400 shadow-md text-white uppercase font-bold hover:bg-indigo-600"
                        >
                            Sign Up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    layout: null,
}
</script>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'

let form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})

let submit = () => {
    form.post(route('register'))
}
</script>
