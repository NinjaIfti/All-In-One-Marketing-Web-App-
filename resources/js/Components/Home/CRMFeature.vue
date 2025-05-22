<template>
    <div class="flex items-center space-x-3">
      <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
      <div>
        <span class="font-semibold text-gray-900">{{ title }}</span>
        <span class="text-gray-600 text-sm ml-2">- {{ description }}</span>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  defineProps({
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