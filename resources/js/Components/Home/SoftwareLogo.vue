<template>
    <div class="flex flex-col items-center space-y-3 p-4 bg-white rounded-lg hover:bg-[#f8f5fc] border border-[#e2d2f4] hover:border-[#c9b3e3] transition-all duration-200">
      <div class="h-12 w-12 flex items-center justify-center">
        <img 
          :src="logo" 
          :alt="`${name} logo`"
          class="max-h-10 max-w-10 object-contain opacity-80"
          loading="lazy"
        >
      </div>
      <div class="text-center">
        <h4 class="text-sm font-medium text-[#1e0933]">{{ name }}</h4>
        <p class="text-xs text-[#5b4b8a] font-semibold">{{ price }}</p>
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