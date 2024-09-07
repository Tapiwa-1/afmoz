<!-- src/components/GraphComponent.vue -->
<template>
  <div class="p-4 max-w-lg mx-auto bg-white rounded-lg shadow-md">
    <canvas ref="chartCanvas" width="400" height="400"></canvas>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Chart, registerables } from 'chart.js';

// Register all necessary components
Chart.register(...registerables);

// Create a ref for the canvas element
const chartCanvas = ref(null);

onMounted(() => {
  if (chartCanvas.value) {
    const ctx = chartCanvas.value.getContext('2d');
    new Chart(ctx, {
      type: 'bar', // Change this to 'line', 'pie', etc., for different types of charts
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
          {
            label: 'Attendance',
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  }
});
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
