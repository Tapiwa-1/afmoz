<!-- src/components/DonationManagement.vue -->
<template>
    <div class="p-4 max-w-2xl mx-auto bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-4">Manage Donations</h2>
      <ul>
        <li v-for="donation in donations" :key="donation.id" class="p-2 border-b">
          <p><strong>Donor:</strong> {{ donation.donor }}</p>
          <p><strong>Amount:</strong> ${{ donation.amount }}</p>
          <p><strong>Date:</strong> {{ donation.date }}</p>
          <button class="mt-2 px-4 py-2 bg-red-500 text-white rounded" @click="removeDonation(donation.id)">Remove</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const donations = ref([
    { id: 1, donor: 'John Doe', amount: 100, date: '2024-09-01' },
    { id: 2, donor: 'Jane Smith', amount: 150, date: '2024-09-05' },
    // More donations...
  ]);
  
  function removeDonation(id) {
    donations.value = donations.value.filter(donation => donation.id !== id);
  }
  </script>
  
  <style scoped>
  /* Add any additional styles if needed */
  </style>
  