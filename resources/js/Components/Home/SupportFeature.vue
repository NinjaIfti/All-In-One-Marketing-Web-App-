<template>
    <div class="flex items-center space-x-4 p-4 bg-white bg-opacity-10 rounded-lg backdrop-blur-sm">
      <div class="text-2xl">{{ icon }}</div>
      <div>
        <h4 class="font-semibold text-white">{{ title }}</h4>
        <p class="text-gray-300 text-sm">{{ description }}</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  defineProps({
    icon: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    }
  });
  </script>