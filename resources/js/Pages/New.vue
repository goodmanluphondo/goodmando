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
            <input type="text" v-model="description" class="w-full text-sm">
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Category</label>
            <select v-model="category" class="w-full text-sm">
              <option v-for="(category, index) in categories" :key="index" :value="category.id">{{category.name}}</option>
            </select>
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Start Date</label>
            <input type="date" v-model="startDate" class="w-full text-sm">
          </div>
          <div class="w-full mb-8">
            <label class="block mb-2">Start Time</label>
            <input type="time" v-model="startTime" class="w-full text-sm">
          </div>
          <div class="">
            <input type="submit" value="Save" class="p-4 text-white bg-blue-500">
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
          description: "",
          category: null,
          startDate: null,
          startTime: null,
        }
      },
      methods: {
        addTask() {
          var self = this;

          self.errors = [];
          if(self.description && self.category && self.startDate && self.startTime) {
            console.log("We are getting somewhere.");
            console.log(self.description, self.category, self.startDate, self.startTime);
          } else {
            console.log("Not looking good.");
            console.log(self.description, self.category, self.startDate, self.startTime);
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