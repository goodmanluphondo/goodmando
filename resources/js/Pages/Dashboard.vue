<template>
    <breeze-authenticated-layout>   
        <div class="pl-12">
            <h1 class="text-blue-500 text-2xl">Inbox</h1>
            <div class="">
                <div class="">
                    <ul>
                        <li v-for="(task, index) in tasks" :key="index" class="py-4 flex space-x-2">
                            <div class="flex-shrink-0 relative inline h-4 w-4">
                                <!-- Custom checkbox -->
                                <div class="absolute top-0 left-0 h-4 w-4 cursor-pointer rounded-lg border border-gray-500 z-10 hidden"></div>

                                <!-- Default checkbox -->
                                <input type="checkbox" name="task" class="absolute h-4 w-4 opacity-90 rounded-lg outline-none">
                            </div>
                            <div class="flex-1">
                                {{ task.description }}
                            </div>
                        </li>
                        <li class="flex space-x-2 p-0 text-blue-500">
                            <div class="flex-shrink-0 -ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <inertia-link href="/add-task">Add Task</inertia-link>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'

    export default {
        props: {
            tasks: Object
        },
        components: {
            BreezeAuthenticatedLayout,
        },
        created() {
            console.log('something is happening - 3.');
        }
    }
</script>
