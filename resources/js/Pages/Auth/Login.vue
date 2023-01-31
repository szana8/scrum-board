<template>
    <div class="md:flex md:h-screen">
        <div class="md:w-1/2 md:flex bg-gray-100  items-center">
            <div class="w-full mx-auto">
                <div class="px-24">
                    <div class="text-indigo-400 flex">
                        <div class="bg-indigo-400 px-2 py-1 rounded text-white text-sm">T</div>
                        <p class="items-center text-custom-purple-dark text-normal font-sans font-semibold mt-0.5 ml-1">Tassking.io</p>
                    </div>
                    <div class="mt-4">
                        <small class="text-gray-400">A central hub where teams can work, plan and achieve amazing <br /> things togeother.</small>
                    </div>
                </div>
                <img src="storage/images/work-with-the-best.svg" alt="" />
            </div>
        </div>

        <div class="md:w-1/2 md:flex items-center mt-12 md:mt-0">
            <div class="w-full px-24">
                <div class="text-3xl font-bold text-gray-700">Sing in to Tassking.io</div>
                <div class="flex space-x-1 mt-1">
                    <p class="text-gray-500">Don't have an account?</p>
                    <Link :href="route('register')" class="href text-indigo-400 font-semibold">Sign up!</Link>
                </div>

                <form class="mt-8" method="POST" @submit.prevent="submit">
                    <div class="p-0.5 text-gray-500 font-semibold">E-mail</div>
                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" class="m-4 stroke-gray-300">
                            <path d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                        </svg>
                        <input class="w-11/12 bg-white py-3 px-4 border-0 focus:border-transparent focus:ring-0  placeholder:text-gray-400" type="text" placeholder="name@mail.com" v-model="form.email" />
                    </div>
                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="form.errors.email" v-text="form.errors.email"></p>

                    <div class="p-0.5 text-gray-500 font-semibold mt-6">Password</div>
                    <div class="rounded-xl p-0.5 border-2 border-gray-300 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" class="m-4 stroke-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>

                        <input class="w-11/12 bg-white py-3 px-4 border-0 focus:border-transparent focus:ring-0 placeholder:text-gray-400" type="password" placeholder="Password" v-model="form.password" />

                    </div>
                    <p class="mt-2 ml-2 text-red-400 text-xs font-semibold italic" v-if="form.errors.password" v-text="form.errors.password"></p>

                    <div class="flex justify-between mt-4 md:px-2">
                        <div class="flex items-center">
                            <input id="remember-me" class="w-4 h-4 rounded border-gray-400 checked:bg-indigo-400 focus:bg-indigo-400" type="checkbox" name="remember">
                            <label for="remember-me" class="ml-2 mt-0.5 text-sm font-bold text-indigo-400 hover:text-indigo-600 cursor-pointer">
                                Remember me
                            </label>
                        </div>
                        <div>
                            <a href="/forgot-password" class="font-semibold text-sm no-underline text-gray-400 hover:text-indigo-400">Forgot your password?</a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full py-6 px rounded-xl bg-indigo-400 shadow-md text-white uppercase font-bold hover:bg-indigo-600">
                            Sign In
                        </button>
                    </div>
                </form>


                <div class="flex justify-between mt-6 space-x-2">
                    <a href="#" class="href w-1/3 border border-gray-300 py-2 rounded flex justify-center hover:border-indigo-400">
                        <img src="storage/icons/google.svg" alt="" class="w-6 h-6 grayscale">
                    </a>
                    <a href="#" class="href w-1/3 border border-gray-300 py-2 rounded flex justify-center hover:border-indigo-400">
                        <img src="storage/icons/facebook.svg" alt="" class="w-6 h-6 grayscale">
                    </a>
                    <a href="#" class="href w-1/3 border border-gray-300 py-2 rounded flex justify-center hover:border-indigo-400">
                        <img src="storage/icons/github.svg" alt="" class="w-6 h-6 grayscale">
                    </a>
                </div>

            </div>
        </div>

    </div>

</template>

<script>
export default {
    layout: null
}
</script>

<script setup>
import {Link, useForm} from "@inertiajs/vue3";

let form = useForm({
    email: '',
    password: '',
});

let submit = () => {
    form.post(route('login'));
};
</script>
