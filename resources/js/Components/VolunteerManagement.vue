<!-- src/components/VolunteerManagement.vue -->
<template>
    <div class="p-4 max-w-2xl mx-auto bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-4">Volunteer Management</h2>
      <ul>
        <li v-for="volunteer in volunteers" :key="volunteer.id" class="p-2 border-b">
          <h3 class="text-lg font-semibold">{{ volunteer.name }}</h3>
          <p><strong>Role:</strong> {{ volunteer.role }}</p>
          <p><strong>Hours:</strong> {{ volunteer.hours }}</p>
          <button class="mt-2 px-4 py-2 bg-red-500 text-white rounded" @click="removeVolunteer(volunteer.id)">Remove</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const volunteers = ref([
    { id: 1, name: 'John Doe', role: 'Usher', hours: 20 },
    { id: 2, name: 'Jane Smith', role: 'Sunday School Teacher', hours: 15 },
    // More volunteers...
  ]);
  
  function removeVolunteer(id) {
    volunteers.value = volunteers.value.filter(volunteer => volunteer.id !== id);
  }
  </script>
  
  <style scoped>
  /* Add any additional styles if needed */
  </style>
  