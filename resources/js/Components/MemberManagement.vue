<!-- src/components/MemberManagement.vue -->
<template>
    <div class="p-4 max-w-2xl mx-auto bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-4">Church Members</h2>
      <input type="text" v-model="search" placeholder="Search members..." class="p-2 border rounded w-full mb-4">
      <ul>
        <li v-for="member in filteredMembers" :key="member.id" class="p-2 border-b">
          <h3 class="text-lg font-semibold">{{ member.name }}</h3>
          <p>Email: {{ member.email }}</p>
          <p>Phone: {{ member.phone }}</p>
          <button class="mt-2 px-4 py-2 bg-red-500 text-white rounded" @click="removeMember(member.id)">Remove</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue';
  
  const search = ref('');
  const members = ref([
    { id: 1, name: 'John Doe', email: 'john@example.com', phone: '123-456-7890' },
    { id: 2, name: 'Jane Smith', email: 'jane@example.com', phone: '234-567-8901' },
    // More members...
  ]);
  
  const filteredMembers = computed(() => {
    return members.value.filter(member =>
      member.name.toLowerCase().includes(search.value.toLowerCase())
    );
  });
  
  function removeMember(id) {
    members.value = members.value.filter(member => member.id !== id);
  }
  </script>
  
  <style scoped>
  /* Add any additional styles if needed */
  </style>
  