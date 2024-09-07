<!-- src/components/PrayerRequest.vue -->
<template>
    <div class="p-4 max-w-2xl mx-auto bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-4">Prayer Requests</h2>
      <form @submit.prevent="addPrayerRequest" class="mb-4">
        <input v-model="newRequest" type="text" placeholder="Enter your prayer request..." class="p-2 border rounded w-full mb-2">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Submit</button>
      </form>
      <ul>
        <li v-for="request in prayerRequests" :key="request.id" class="p-2 border-b">
          <p>{{ request.text }}</p>
          <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded" @click="markAsAnswered(request.id)">Mark as Answered</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const prayerRequests = ref([]);
  const newRequest = ref('');
  
  function addPrayerRequest() {
    if (newRequest.value.trim() !== '') {
      prayerRequests.value.push({ id: Date.now(), text: newRequest.value });
      newRequest.value = '';
    }
  }
  
  function markAsAnswered(id) {
    prayerRequests.value = prayerRequests.value.filter(request => request.id !== id);
  }
  </script>
  
  <style scoped>
  /* Add any additional styles if needed */
  </style>
  