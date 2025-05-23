<template>
    <div 
      class="fixed bottom-0 left-0 right-0 z-50 bg-gradient-to-r from-[#1e0933] to-[#2f1652] text-white shadow-2xl transform transition-transform duration-300"
      :class="isVisible ? 'translate-y-0' : 'translate-y-full'"
    >
      <div class="container mx-auto px-4 py-4">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
          
          <!-- Left Side - Logo and Reviews -->
          <div class="hidden md:flex items-center space-x-4">
            <img 
              src="/images/logo-white.png" 
              alt="All In One Marketing" 
              class="h-8 w-auto"
            >
          </div>
          
          <!-- Center - Message -->
          <div class="text-center md:text-left">
            <div class="flex items-center justify-center md:justify-start space-x-2 mb-1">
              <span class="font-semibold text-[#e2d2f4]">Hundreds of</span>
              <div class="flex">
                <StarRating :rating="5" />
              </div>
              <span class="font-semibold text-[#e2d2f4]">Reviews</span>
            </div>
            <p class="text-[#c9b3e3] text-sm">
              Start your <em>14-day free trial</em> with plans from <strong>$97/month</strong>
            </p>
          </div>
          
          <!-- Right Side - CTA Button -->
          <div class="flex-shrink-0">
            <a 
              href="#signup" 
              class="inline-flex items-center px-6 py-3 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-bold rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl"
              @click="scrollToSignup"
            >
              Start Free Trial
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </a>
          </div>
          
          <!-- Close Button -->
          <button 
            @click="hideStickyCTA"
            class="absolute top-2 right-2 md:static md:ml-4 text-[#c9b3e3] hover:text-white transition-colors duration-200"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted, onUnmounted } from 'vue';
  import StarRating from '@/Components/Marketing/StarRating.vue';
  
  const isVisible = ref(false);
  const scrollThreshold = 1000; // Show after scrolling 1000px
  
  const handleScroll = () => {
    const scrollY = window.scrollY;
    isVisible.value = scrollY > scrollThreshold;
  };
  
  const hideStickyCTA = () => {
    isVisible.value = false;
  };
  
  const scrollToSignup = (event) => {
    event.preventDefault();
    const signupElement = document.querySelector('#signup');
    if (signupElement) {
      signupElement.scrollIntoView({ 
        behavior: 'smooth',
        block: 'start'
      });
    } else {
      // If no signup section found, scroll to top (where the form is)
      window.scrollTo({ 
        top: 0, 
        behavior: 'smooth' 
      });
    }
  };
  
  onMounted(() => {
    window.addEventListener('scroll', handleScroll);
  });
  
  onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
  });
  </script>