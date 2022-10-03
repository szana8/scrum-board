<template>
    <div class="w-full block md:h-screen h-auto">
        <nav class="flex">
            <div class="w-1/6 border-r border-grey-200 hidden md:block">
                <div class="py-6 border-b-4 border-ls-blue text-center bg-ls-blue">
                    <div class="py-2"></div>
                    <!-- <li class="list-reset text-white font-semibold">
                        <img src="storage/images/logo.png" class="w-10 h-10 absolute -mt-2 -ml-12">
                        European Demo Facility
                        <a href="#" class="inline-block absolute ml-4 mt-1 text-blue-lighter hover:text-white" @click="openSearchProjectModal">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 129 129" enable-background="new 0 0 129 129" width="14" height="14">
                            <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" fill="currentcolor"/>
                            </svg>
                        </a>
                    </li> -->

                </div>
            </div>

            <div class="w-5/6">
                <div class="bg-blue w-full px-4 flex justify-between">
                    <div class="flex w-1/4 items-stretch">
                        <div class="flex self-center">
                            <img src="" class="w-10 h-10 ml-2 inline-block self-center rounded-full">
                            <a href="#" class="text-blue-200 font-semibold ml-4 no-underline hover:text-blue-lightest self-center" v-text=""></a>
                        </div>
                    </div>

                    <div class="flex w-1/2 items-stretch" id="navbar">
                        <li class="list-reset px-4 self-center"><a href="#" class="text-ls-blue block bg-white rounded-full py-1 px-8 font-semibold no-underline border hover:bg-ls-blue hover:border-white hover:text-white trans-slow" @click="openCreatePanel()">Create</a></li>
                        <a tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" :to="{ name: 'home' }" exact>Dashboards</a>
                        <a tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" :to="{ name: 'issues' }">Issues</a>
                        <a tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" :to="{ name: 'projects' }">Projects</a>
                        <a tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" to="/boards" exact>Boards</a>
                        <a tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" to="/settings" exact>Settings</a>
                    </div>

                    <div class="flex w-1/4 justify-end">
                        <div>
                            <input type="text" name="search" placeholder="Search..." class="w-64 appearance-none text-grey-darkest shadow px-6 py-2 rounded-full mt-4 -ml-10 outline-none">
                        </div>
                        <div>
                            <li class="list-reset py-6 px-4"><a href="#" class="text-blue-lighter hover:text-blue-lightest font-semibold no-underline" 	@click="signout">Logout</a></li>
                        </div>
                    </div>
                </div>

            </div>


        </nav>
    </div>
</template>

<script>
export default {};
</script>
