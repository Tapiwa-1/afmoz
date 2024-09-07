<!-- src/components/EventManagement.vue -->
<template>
    <div class="p-4 max-w-2xl mx-auto bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-4">Upcoming Events</h2>
      <div v-for="event in events" :key="event.id" class="mb-4 p-4 border rounded">
        <h3 class="text-lg font-semibold">{{ event.name }}</h3>
        <p>{{ event.date }} | {{ event.time }}</p>
        <p>{{ event.location }}</p>
        <p>{{ event.description }}</p>
        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded" @click="rsvp(event.id)">RSVP</button>
      </div>
      <!-- Add Event Form (can be hidden or shown based on user role) -->
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const events = ref([
    {
      id: 1,
      name: "Sunday Service",
      date: "2024-09-10",
      time: "10:00 AM",
      location: "Main Church Hall",
      description: "Join us for a time of worship and fellowship.",
    },
    {
      id: 2,
      name: "Bible Study",
      date: "2024-09-12",
      time: "7:00 PM",
      location: "Room 5",
      description: "In-depth Bible study led by Pastor John.",
    },
  ]);
  
  function rsvp(eventId) {
    alert(`RSVP successful for event ID: ${eventId}`);
  }
  </script>
  
  <style scoped>
  /* Add any additional styles if needed */
  </style>
  