<template>
    <section class="bg-gray-50 py-12">
      <div class="container mx-auto px-4">
        <h3 class="text-center text-xl text-gray-600 mb-8 font-medium">As Seen On</h3>
        
        <div class="flex flex-wrap justify-center items-center gap-8 lg:gap-12 opacity-70">
          <div class="flex items-center justify-center h-12 w-24">
            <img 
              src="/images/logos/inc-logo.png" 
              alt="Inc. Magazine" 
              class="max-h-8 max-w-full object-contain grayscale hover:grayscale-0 transition-all duration-300"
              loading="lazy"
            >
          </div>
          
          <div class="flex items-center justify-center h-12 w-24">
            <img 
              src="/images/logos/cbs-logo.png" 
              alt="CBS" 
              class="max-h-8 max-w-full object-contain grayscale hover:grayscale-0 transition-all duration-300"
              loading="lazy"
            >
          </div>
          
          <div class="flex items-center justify-center h-12 w-24">
            <img 
              src="/images/logos/forbes-logo.png" 
              alt="Forbes" 
              class="max-h-8 max-w-full object-contain grayscale hover:grayscale-0 transition-all duration-300"
              loading="lazy"
            >
          </div>
          
          <div class="flex items-center justify-center h-12 w-24">
            <img 
              src="/images/logos/fox-business-logo.png" 
              alt="Fox Business" 
              class="max-h-8 max-w-full object-contain grayscale hover:grayscale-0 transition-all duration-300"
              loading="lazy"
            >
          </div>
          
          <div class="flex items-center justify-center h-12 w-24">
            <img 
              src="/images/logos/nbc-logo.png" 
              alt="NBC" 
              class="max-h-8 max-w-full object-contain grayscale hover:grayscale-0 transition-all duration-300"
              loading="lazy"
            >
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  // This component doesn't need any reactive data or methods
  // The images will be handled by your asset pipeline
  </script>