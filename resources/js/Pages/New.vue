<template>
  <breeze-authenticated-layout>
    <div class="h-full" ref="main">
      <h1 class="text-blue-500 text-2xl mb-4">Add Task</h1>
      <form action="" @submit.prevent="addTask">
        <div class="w-full sm:w-80">
          <div class="w-full mb-8">
            <label class="block mb-2">Description</label>
            <input type="text" v-model="form.description" class="w-full text-sm rounded-lg p-3 border-gray-300">
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Category</label>
            <select v-model="form.category" class="w-full text-sm rounded-lg p-3 border-gray-300">
              <option v-for="(category, index) in categories" :key="index" :value="category.id">{{category.name}}</option>
            </select>
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Start Date</label>
            <input type="date" v-model="form.startDate" class="w-full text-sm rounded-lg p-3 border-gray-300">
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Start Time</label>
            <input type="time" v-model="form.startTime" class="w-full text-sm rounded-lg p-3 border-gray-300">
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Duration (minutes)</label>
            <input type="number" min="15" step="15" v-model="form.duration" class="w-full text-sm rounded-lg p-3 border-gray-300">
          </div>
          <div v-if="showErrors && errors.length" class="w-full mb-4">
            <span class="font-bold mb-2">You need to fix the following errors:</span>
            <ul  class="w-full">
              <li v-for="(error, index) in errors" :key="index" class="text-red-500">{{ error }}</li>
            </ul>
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
          showErrors: true,
          form: {
            description: "",
            category: null,
            startDate: null,
            startTime: null,
            duration: 15
          }
        }
      },
      created() {
        setTimeout(function() {
          if(this.showErrors == true) {
            this.showErrors = false;
          }
        }, 3500);
      },
      methods: {
        addTask() {
          var self = this;

          self.errors = [];
          if(self.form.description && self.form.category && self.form.startDate && self.form.startTime && self.form.duration) {
            console.log("We are getting somewhere.");
            this.$inertia.post('/tasks/', self.form);
          } else {
            if(!self.form.description) self.errors.push("You need a description for your task.");
            if(!self.form.category) self.errors.push("Your task must have a category.");
            if(!self.form.startDate) self.errors.push("A start date for the task must be included.");
            if(!self.form.startTime) self.errors.push("There must be a start time.");
            if(!self.form.duration) self.errors.push("A duration is expected.");

            this.$refs.main.scrollToTop = 0;
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