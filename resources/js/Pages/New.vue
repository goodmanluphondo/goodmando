<template>
  <breeze-authenticated-layout>
    <div class="pl-12">
      <h1 class="text-blue-500 text-2xl mb-4">Add Task</h1>
      <form action="" @submit.prevent="addTask">
        <div class="w-80">
          <ul v-if="errors.length" class="w">
            <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
          </ul>
          <div class="w-full mb-8">
            <label class="block mb-2">Description</label>
            <input type="text" v-model="form.description" class="w-full text-sm">
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Category</label>
            <select v-model="form.category" class="w-full text-sm">
              <option v-for="(category, index) in categories" :key="index" :value="category.id">{{category.name}}</option>
            </select>
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Start Date</label>
            <input type="date" v-model="form.startDate" class="w-full text-sm">
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Start Time</label>
            <input type="time" v-model="form.startTime" class="w-full text-sm">
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Duration (minutes)</label>
            <input type="number" min="0" step="15" v-model="form.duration" class="w-full text-sm">
          </div>
          <div class="">
            <input type="submit" value="Save" class="p-4 px-8 rounded-lg text-white bg-blue-500 cursor-pointer">
          </div>
        </div>
      </form>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'

    export default {
      data() {
        return {
          errors: [],
          form: {
            description: "",
            category: null,
            startDate: null,
            startTime: null,
            duration: 0
          }
        }
      },
      methods: {
        addTask() {
          var self = this;

          self.errors = [];
          if(self.form.description && self.form.category && self.form.startDate && self.form.startTime && self.form.duration) {
            console.log("We are getting somewhere.");
            // this.$inertia.post('tasks', self.form);
            this.$inertia.post('/tasks/', self.form);
          } else {
            console.log("Not looking good.");
            console.log(self.form);
          }
        }
      },
        props: {
            categories: Object
        },
        components: {
            BreezeAuthenticatedLayout,
        }
    }
</script>