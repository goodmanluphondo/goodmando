<template>
    <div class="w-full min-h-screen font-fira">
        <div class="w-full h-screen flex items-center justify-center flex-row bg-blue-500">
            <div class="hidden md:block flex-1">
                <span class="text-6xl text-white font-bold pl-4">
                    <inertia-link href="/">Goodman.do</inertia-link>
                </span>
            </div>
            <div class="flex-1 h-full bg-white">
                <div class="flex h-full items-center justify-center">
                    <div class="w-80">
                        <span class="w-full flex justify-center text-4xl text-blue-500 font-bold md:hidden mb-12">
                            <inertia-link href="/">Goodman.do</inertia-link>
                        </span>
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div> 
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,500;1,600;1,700&display=swap');
</style>

