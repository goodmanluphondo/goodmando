<template>
  <breeze-authenticated-layout>
  <div class="pl-12">
        <h1 class="text-blue-500 text-2xl">Inbox</h1>
        <div class="">
            <div class="">
                <ul>
                        <li v-for="(task, index) in tasks" :key="index" class="py-4 flex space-x-2 mybox">
                            <div class="flex-shrink-0 relative inline h-4 w-4">
                                <!-- Custom checkbox -->
                                <div class="absolute top-0 left-0 h-4 w-4 cursor-pointer rounded-lg border border-gray-500 z-10 hidden"></div>

                                <!-- Default checkbox -->
                                <input type="checkbox" v-model="checkedTasks" :value="task.id" @change="spit" class="absolute h-4 w-4 opacity-90 rounded-lg outline-none">
                            </div>
                            <div class="flex-1">
                                {{ task.description }}
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
      data() {
        checkedTasks: []
      },
      props: {
        tasks: Object
      },
      methods: {
        split() {
          console.log(this.checkedTasks);
        }
      },
        components: {
            BreezeAuthenticatedLayout,
        },
        created() {
          console.log('the app has loaded.');
        }
    }
</script>