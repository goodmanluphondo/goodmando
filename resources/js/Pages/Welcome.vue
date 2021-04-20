<template>
    <div class="w-full font-fira relative h-screen bg-blue-500 text-white dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="absolute top-0 right-0 px-6 py-4 sm:block">
            <inertia-link v-if="$page.props.auth.user" href="/tasks" class="text-sm text-gray-700 underline">
                Inbox
            </inertia-link>

            <template v-else>
                <inertia-link :href="route('login')" class="text-sm text-white">
                    Login
                </inertia-link>

                <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 p-2 px-8 rounded-lg text-sm text-blue-500 bg-white">
                    Sign up
                </inertia-link>
            </template>
        </div>
        <div class="w-full h-full flex items-center">
            <div class="flex-shrink-0 w-full sm:w-1/2">
                <div class="text-left text-center sm:text-left text-5xl md:text-7xl lg:text-8xl px-4 sm:pl-12 leading-normal overflow-clip">
                    Hi<br/>Welcome to <span class="font-bold">Goodman.do</span>
                </div>
            </div>
            <div class="hidden sm:block flex-shrink-0 w-1/2 h-full">
                <div class="h-full flex items-end overflow-hidden">
                    <img src="/../../assets/phone.png" alt="A view of the Goodman.do app on a phone" class="transform rotate-12 object-contain h-4/5 ml-12">
                </div>
            </div>
        </div>
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,500;1,600;1,700&display=swap');
</style>

<script>
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
