<template>
    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <!-- Header with Icon -->
      <div class="bg-gradient-to-r from-orange-400 to-orange-600 p-6 text-center">
        <div class="text-3xl mb-2">{{ icon }}</div>
        <h3 class="text-xl font-bold text-white">{{ title }}</h3>
      </div>
      
      <!-- Image -->
      <div class="aspect-video bg-gray-100 overflow-hidden">
        <img 
          :src="image" 
          :alt="title"
          class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
          loading="lazy"
        >
      </div>
      
      <!-- Content -->
      <div class="p-6">
        <p class="text-gray-600 leading-relaxed">{{ description }}</p>
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
    },
    image: {
      type: String,
      required: true
    },
    icon: {
      type: String,
      required: true
    }
  });
  </script>