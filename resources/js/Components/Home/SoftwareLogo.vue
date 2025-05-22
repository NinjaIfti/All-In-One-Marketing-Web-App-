<template>
    <div class="flex flex-col items-center space-y-3 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
      <div class="h-12 w-12 flex items-center justify-center">
        <img 
          :src="logo" 
          :alt="`${name} logo`"
          class="max-h-10 max-w-10 object-contain opacity-70"
          loading="lazy"
        >
      </div>
      <div class="text-center">
        <h4 class="text-sm font-medium text-gray-700">{{ name }}</h4>
        <p class="text-xs text-red-600 font-semibold">{{ price }}</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  defineProps({
    name: {
      type: String,
      required: true
    },
    logo: {
      type: String,
      required: true
    },
    price: {
      type: String,
      required: true
    }
  });
  </script>