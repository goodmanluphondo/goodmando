<template>
    <div classs="w-full min-h-screen">
        <div class="bg-white w-full flex flex-row">
            <div class="flex-1 bg-blue-300 text-coolGray-50">
                <a href="/">To-do List App</a>
            </div>
            <div class="flex-1 bg-white">
                <div class="w-full flex flex-row items-center justify-items-center">
                    <slot />
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    // import BreezeApplicationLogo from '@/Components/ApplicationLogo'

    export default {
        components: {
            // BreezeApplicationLogo,
        }
    }
</script>
