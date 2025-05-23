<template>
    <div class="bg-white/10 backdrop-blur-sm rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-white/10 group">
      <!-- Video Thumbnail -->
      <div class="aspect-video bg-[#2f1652] relative cursor-pointer" @click="playTestimonial">
        <img 
          :src="testimonial.videoThumbnail" 
          :alt="`${testimonial.name} testimonial`"
          class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300"
        >
        <div class="absolute inset-0 bg-gradient-to-t from-[#1e0933]/70 via-transparent to-transparent flex items-center justify-center group-hover:from-[#1e0933]/50 transition-all duration-300">
          <div class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 shadow-lg">
            <svg class="w-5 h-5 text-[#5b4b8a] ml-0.5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M8 5v14l11-7z"/>
            </svg>
          </div>
        </div>
      </div>
      
      <!-- Content -->
      <div class="p-6">
        <!-- Star Rating -->
        <div class="flex justify-center mb-4">
          <StarRating :rating="testimonial.rating" />
        </div>
        
        <!-- Subtitle -->
        <h4 class="text-sm font-medium text-[#c9b3e3] mb-2 text-center">
          {{ testimonial.subtitle }}
        </h4>
        
        <!-- Main Quote -->
        <h3 class="font-bold text-lg text-center leading-tight text-white">
          "{{ testimonial.quote }}"
        </h3>
        
        <!-- Author Info -->
        <div class="mt-4 text-center">
          <p class="font-semibold text-[#e2d2f4]">{{ testimonial.name }}</p>
          <p class="text-sm text-[#c9b3e3]">{{ testimonial.title }}</p>
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