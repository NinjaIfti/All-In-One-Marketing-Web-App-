<template>
    <section class="bg-[#f8f5fc] py-12 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute top-0 left-0 w-full h-8 bg-gradient-to-b from-white to-transparent"></div>
      <div class="absolute -top-20 -left-20 w-64 h-64 rounded-full bg-[#c9b3e3] opacity-10 blur-3xl"></div>
      <div class="absolute -bottom-20 -right-20 w-64 h-64 rounded-full bg-[#e2d2f4] opacity-20 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-5xl mx-auto">
          <div class="text-center mb-8">
            <div class="inline-block">
              <div class="h-0.5 w-8 bg-[#a67c5b] inline-block mr-2 align-middle"></div>
              <h3 class="inline-block text-xl text-[#2f1652] font-medium">As Seen On</h3>
              <div class="h-0.5 w-8 bg-[#a67c5b] inline-block ml-2 align-middle"></div>
            </div>
          </div>
          
          <div class="flex flex-wrap justify-center items-center gap-8 lg:gap-16">
            <div class="flex items-center justify-center h-16 w-32 group">
              <img 
                src="/images/logos/inc-logo.png" 
                alt="Inc. Magazine" 
                class="max-h-10 max-w-full object-contain grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300"
                loading="lazy"
              >
            </div>
            
            <div class="flex items-center justify-center h-16 w-32 group">
              <img 
                src="/images/logos/cbs-logo.png" 
                alt="CBS" 
                class="max-h-10 max-w-full object-contain grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300"
                loading="lazy"
              >
            </div>
            
            <div class="flex items-center justify-center h-16 w-32 group">
              <img 
                src="/images/logos/forbes-logo.png" 
                alt="Forbes" 
                class="max-h-10 max-w-full object-contain grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300"
                loading="lazy"
              >
            </div>
            
            <div class="flex items-center justify-center h-16 w-32 group">
              <img 
                src="/images/logos/fox-business-logo.png" 
                alt="Fox Business" 
                class="max-h-10 max-w-full object-contain grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300"
                loading="lazy"
              >
            </div>
            
            <div class="flex items-center justify-center h-16 w-32 group">
              <img 
                src="/images/logos/nbc-logo.png" 
                alt="NBC" 
                class="max-h-10 max-w-full object-contain grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300"
                loading="lazy"
              >
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  // This component doesn't need any reactive data or methods
  // The images will be handled by your asset pipeline
  </script>