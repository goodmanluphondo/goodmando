<template>
    <breeze-authenticated-layout>   
        <div class="h-full">
            <div class="h-full">
                <!-- Alert -->
                <div v-if="alert && showAlert" class="flex items-center bg-green-500 text-white text-sm shadow p-4 mb-4 rounded-lg">
                  <span class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </span>
                  <span class="flex-1">{{ alert }}</span>
                </div>

                <!-- Complete Task Button -->
                <div v-if="selectedTasks.length">
                  <button type="button">Complete Seletect({{selectedTasks.length}})</button>
                  <button type="button">Delete Seletect({{selectedTasks.length}})</button>
                  <button type="button">Cancel</button>
                </div>

                <h1 class="text-blue-500 text-2xl">Inbox</h1>
                <ul>
                    <!-- <li v-for="(task, index) in tasks" :key="index" class="py-4 flex space-x-2"> -->
                    <li v-for="(task, index) in tasks" :key="index" class="py-4 flex space-x-2">
                        <div class="flex-shrink-0 relative inline h-4 w-4">
                            <!-- Custom checkbox -->
                            <div class="absolute top-0 left-0 h-4 w-4 cursor-pointer rounded-lg border border-gray-500 z-10 hidden"></div>

                            <!-- Default checkbox -->

                            <input :checked="task.completed" type="checkbox" @change="toggleStatus(task.id, task.completed)" class="absolute h-4 w-4 opacity-90 rounded-lg outline-none">
                        </div>
                        <div class="flex-1">
                            <span v-if="task.completed" class="text-red-400 line-through">{{ task.description }}</span>
                            <span v-else>{{ task.description }}</span>
                        </div>
                        <div class="flex-shrink-0">
                          <span class="cursor-pointer" @click="deleteTask(task.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 hover:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </span>
                        </div>
                    </li>
                    <li class="flex space-x-2 p-0 text-blue-500">
                        <div class="flex-shrink-0 -ml-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <inertia-link href="/tasks/create">Add Task</inertia-link>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'

    export default {
        data() {
          return {
            selectedTasks: [],
            showAlert: true,
          }
        },
        created() {
          setTimeout(()=>{
            if(this.showAlert == true) {
              this.showAlert = false;
            }
          }, 3500);
        },
        props: {
            alert: String,
            tasks: Object
        },
        methods: {
          toggleStatus(id, status) {
            status = !status;
            this.$inertia.put('/tasks/' + id, {"status": status});
          },
          deleteTask(id) {
            this.$inertia.delete('/tasks/' + id);
          }
        },
        components: {
            BreezeAuthenticatedLayout,
        }
    }
</script>
