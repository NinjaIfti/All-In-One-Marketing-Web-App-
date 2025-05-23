<template>
    <section class="bg-white py-20 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-80"></div>
      <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-80"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Business Growth</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            We've Helped Thousands of Business Owners <span class="text-[#a67c5b] font-black">Grow Their Revenue</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-4xl mx-auto leading-relaxed">
            With over 100 years of combined experience working with thousands of business owners, All In One Marketing was specifically developed to help increase business revenue. <strong>Check out our additional services</strong>
          </p>
        </div>
  
        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          
          <!-- TV Interview Service -->
          <div class="bg-gradient-to-br from-[#5b4b8a] to-[#1e0933] rounded-2xl p-8 text-white relative overflow-hidden shadow-xl group hover:shadow-2xl transition-shadow duration-300">
            <div class="relative z-10">
              <h3 class="text-2xl font-bold mb-4">Guaranteed TV Interview On Major Networks</h3>
              
              <!-- Network Logos -->
              <div class="flex flex-wrap gap-3 mb-6">
                <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold">ABC</span>
                <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold">CBS</span>
                <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold">NBC</span>
                <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold">FOX</span>
              </div>
              
              <p class="text-[#e2d2f4] mb-6 leading-relaxed">
                Get interviewed about your business on major TV networks including ABC, CBS, NBC, FOX, & More
              </p>
              
              <a 
                href="/tv-interviews" 
                class="inline-flex items-center px-6 py-3 bg-white hover:bg-gray-100 text-[#5b4b8a] font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200 group-hover:translate-x-1"
              >
                Learn More
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
            </div>
            
            <!-- Background decoration -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-white bg-opacity-10 rounded-full -translate-y-16 translate-x-16 group-hover:scale-110 transition-transform duration-500"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white bg-opacity-10 rounded-full translate-y-12 -translate-x-12 group-hover:scale-110 transition-transform duration-500"></div>
          </div>
  
          <!-- 1-on-1 Consulting -->
          <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-[#e2d2f4] hover:border-[#c9b3e3] relative overflow-hidden group">
            <!-- Background decorations -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-[#f8f5fc] rounded-full -translate-y-20 translate-x-20 opacity-70 group-hover:scale-110 transition-transform duration-500"></div>
            
            <div class="relative z-10">
              <div class="text-center mb-6">
                <div class="w-16 h-16 bg-[#e2d2f4] rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                  </svg>
                </div>
                <h3 class="text-2xl font-bold text-[#1e0933] mb-4">1-on-1 Consulting & Support</h3>
              </div>
              
              <div class="mb-6">
                <img 
                  src="/images/services/consulting.png" 
                  alt="1-on-1 Consulting" 
                  class="w-full h-32 object-cover rounded-lg shadow-md"
                >
              </div>
              
              <p class="text-[#2f1652] mb-6 leading-relaxed">
                Get expert, personalized support to grow your business—no fluff, just real strategy and results.
              </p>
              
              <a 
                href="/consulting" 
                class="inline-flex items-center px-6 py-3 bg-[#5b4b8a] hover:bg-[#4a3d73] text-white font-semibold rounded-lg transition-colors duration-200 w-full justify-center shadow-md hover:shadow-lg"
              >
                Learn More
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
            </div>
          </div>
  
          <!-- Shark Retreat -->
          <div class="bg-gradient-to-br from-[#1e0933] to-[#2f1652] rounded-2xl p-8 text-white relative overflow-hidden shadow-xl group hover:shadow-2xl transition-shadow duration-300">
            <div class="relative z-10">
              <h3 class="text-2xl font-bold mb-4">Shark Retreat Business Mastermind</h3>
              
              <div class="mb-6">
                <img 
                  src="/images/services/shark-retreat-logo.png" 
                  alt="Shark Retreat" 
                  class="h-12 w-auto"
                >
              </div>
              
              <p class="text-[#e2d2f4] mb-6 leading-relaxed">
                One-day business retreat designed exclusively for business owners, led by Kevin from Shark Tank
              </p>
              
              <!-- Features -->
              <div class="space-y-2 mb-6 text-sm">
                <div class="flex items-center space-x-2">
                  <svg class="w-4 h-4 text-[#a67c5b]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Exclusive Shark Tank insights</span>
                </div>
                <div class="flex items-center space-x-2">
                  <svg class="w-4 h-4 text-[#a67c5b]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Networking with top entrepreneurs</span>
                </div>
                <div class="flex items-center space-x-2">
                  <svg class="w-4 h-4 text-[#a67c5b]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Business scaling strategies</span>
                </div>
              </div>
              
              <a 
                href="https://sharkretreat.com/aio" 
                target="_blank"
                class="inline-flex items-center px-6 py-3 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-semibold rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl"
              >
                Learn More
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
              </a>
            </div>
            
            <!-- Background decoration -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-[#a67c5b] bg-opacity-10 rounded-full -translate-y-20 translate-x-20 group-hover:scale-110 transition-transform duration-500"></div>
          </div>
        </div>

        <!-- Additional CTA -->
        <div class="mt-16 text-center">
          <div class="inline-block mb-8 max-w-3xl">
            <p class="text-[#2f1652] leading-relaxed text-lg">
              Enhance your business experience with our premium services. All services can be added to any of our <span class="font-bold text-[#5b4b8a]">monthly plans</span> starting at just <span class="font-bold text-[#a67c5b]">$97/month</span>.
            </p>
          </div>
          
          <a 
            href="#services" 
            class="inline-flex items-center px-8 py-3 bg-[#5b4b8a] hover:bg-[#4a3d73] text-white font-semibold rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl"
          >
            View All Services
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  // No reactive data needed for this component
  </script>