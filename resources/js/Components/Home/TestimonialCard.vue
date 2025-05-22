<template>
    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
      <!-- Video Thumbnail -->
      <div class="aspect-video bg-gray-200 relative group cursor-pointer" @click="playTestimonial">
        <img 
          :src="testimonial.videoThumbnail" 
          :alt="`${testimonial.name} testimonial`"
          class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center group-hover:bg-opacity-20 transition-all duration-300">
          <div class="w-12 h-12 bg-white bg-opacity-90 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
            <svg class="w-5 h-5 text-gray-800 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M8 5v14l11-7z"/>
            </svg>
          </div>
        </div>
      </div>
      
      <!-- Content -->
      <div class="p-6 text-gray-900">
        <!-- Star Rating -->
        <div class="flex justify-center mb-4">
          <StarRating :rating="testimonial.rating" />
        </div>
        
        <!-- Subtitle -->
        <h4 class="text-sm font-medium text-gray-600 mb-2 text-center">
          {{ testimonial.subtitle }}
        </h4>
        
        <!-- Main Quote -->
        <h3 class="font-bold text-lg text-center leading-tight">
          "{{ testimonial.quote }}"
        </h3>
        
        <!-- Author Info -->
        <div class="mt-4 text-center">
          <p class="font-semibold text-gray-900">{{ testimonial.name }}</p>
          <p class="text-sm text-gray-600">{{ testimonial.title }}</p>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import StarRating from '@/Components/Marketing/StarRating.vue';
  
  const props = defineProps({
    testimonial: {
      type: Object,
      required: true
    }
  });
  
  const playTestimonial = () => {
    // Add video modal or redirect logic here
    console.log(`Play testimonial video for ${props.testimonial.name}`);
  };
  </script>