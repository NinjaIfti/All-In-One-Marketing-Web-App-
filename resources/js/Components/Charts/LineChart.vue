<template>
  <div class="h-72">
    <canvas ref="chartCanvas"></canvas>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import Chart from 'chart.js/auto';

const props = defineProps({
  chartData: {
    type: Object,
    required: true
  },
  options: {
    type: Object,
    default: () => ({})
  }
});

const chartCanvas = ref(null);
let chart = null;

const createChart = () => {
  if (chart) {
    chart.destroy();
  }
  
  if (chartCanvas.value) {
    chart = new Chart(chartCanvas.value, {
      type: 'line',
      data: props.chartData,
      options: {
        ...props.options,
        responsive: true,
        maintainAspectRatio: false
      }
    });
  }
};

onMounted(() => {
  createChart();
});

watch(() => props.chartData, () => {
  createChart();
}, { deep: true });
</script> 