<script setup>
import { Head } from '@inertiajs/vue3';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
</script>

<template>
  <Head title="Our Services - All In One Marketing" />
  
  <MarketingLayout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-[#1e0933] via-[#2f1652] to-[#1e0933] text-white py-16 relative overflow-hidden">
      <!-- Background decorative elements -->
      <div class="absolute inset-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
          <defs>
            <pattern id="hero-grid" width="50" height="50" patternUnits="userSpaceOnUse">
              <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#5b4b8a" stroke-width="1"/>
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#hero-grid)" />
        </svg>
      </div>
      
      <!-- Accent Circles -->
      <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#5b4b8a] opacity-20 blur-3xl"></div>
      <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-[#a67c5b] opacity-10 blur-3xl"></div>
      
      <div class="container mx-auto px-4 text-center relative z-10 py-8">
        <div class="max-w-3xl mx-auto">
          <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#5b4b8a] bg-opacity-20 text-[#c9b3e3] text-sm font-medium mb-6">
            <span class="w-2 h-2 rounded-full bg-[#a67c5b] mr-2"></span>
            All-In-One Marketing Solutions
          </div>
          <h1 class="text-4xl lg:text-5xl font-bold mb-6">Powerful <span class="text-[#c9b3e3]">Marketing Tools</span> for Growing Businesses</h1>
          <p class="text-xl lg:text-2xl text-[#e2d2f4] leading-relaxed mb-8">
            Everything you need to acquire customers, grow revenue, and scale your business - all in one platform
          </p>
          <a 
            href="#pricing" 
            class="inline-flex items-center px-8 py-4 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-bold text-lg rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg"
          >
            View Our Plans
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </a>
        </div>
      </div>
    </section>

    <!-- Service Overview Section -->
    <section class="bg-white py-16 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-70"></div>
      <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-70"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Our Services</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            All You Need For <span class="text-[#a67c5b]">Marketing Success</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            Our comprehensive platform combines powerful marketing tools, automation, and CRM capabilities to help you generate leads, convert customers, and grow revenue.
          </p>
        </div>

        <!-- Service Categories -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Email Marketing -->
          <div class="bg-gradient-to-br from-[#f8f5fc] to-[#e2d2f4] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-[#c9b3e3]/10 group">
            <div class="p-8 text-center relative">
              <div class="absolute top-0 right-0 w-40 h-40 bg-[#c9b3e3] opacity-10 rounded-full -translate-y-20 translate-x-20 group-hover:scale-110 transition-transform duration-500"></div>
              
              <div class="w-16 h-16 bg-[#5b4b8a] rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
              </div>
              
              <h3 class="text-2xl font-bold text-[#1e0933] mb-4">Email Marketing</h3>
              <p class="text-[#2f1652] mb-6">
                Create beautiful email campaigns, automate follow-ups, and track performance with detailed analytics.
              </p>
              
              <div class="space-y-3 text-left mb-8">
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Drag & drop email builder</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Automated sequences</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Smart segmentation</span>
                </div>
              </div>
            </div>
          </div>

          <!-- CRM & Sales -->
          <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-[#c9b3e3]/20 group">
            <div class="p-8 text-center relative">
              <div class="absolute top-0 right-0 w-40 h-40 bg-[#f8f5fc] opacity-70 rounded-full -translate-y-20 translate-x-20 group-hover:scale-110 transition-transform duration-500"></div>
              
              <div class="w-16 h-16 bg-[#a67c5b] rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v2m10-2v2M7 20c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
              </div>
              
              <h3 class="text-2xl font-bold text-[#1e0933] mb-4">CRM & Sales Pipeline</h3>
              <p class="text-[#2f1652] mb-6">
                Manage your leads, track opportunities, and close more deals with our intuitive CRM system.
              </p>
              
              <div class="space-y-3 text-left mb-8">
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Visual sales pipeline</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Contact management</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Deal tracking & forecasting</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Marketing Automation -->
          <div class="bg-gradient-to-br from-[#1e0933] to-[#2f1652] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 text-white group">
            <div class="p-8 text-center relative">
              <div class="absolute top-0 right-0 w-40 h-40 bg-[#5b4b8a] opacity-10 rounded-full -translate-y-20 translate-x-20 group-hover:scale-110 transition-transform duration-500"></div>
              <div class="absolute bottom-0 left-0 w-40 h-40 bg-[#a67c5b] opacity-10 rounded-full translate-y-20 -translate-x-20 group-hover:scale-110 transition-transform duration-500"></div>
              
              <div class="w-16 h-16 bg-[#a67c5b] rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
              </div>
              
              <h3 class="text-2xl font-bold mb-4">Marketing Automation</h3>
              <p class="text-[#e2d2f4] mb-6">
                Build powerful automation workflows that nurture leads and convert prospects into paying customers.
              </p>
              
              <div class="space-y-3 text-left mb-8">
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Visual workflow builder</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Multi-channel campaigns</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Behavior-based triggers</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="bg-[#f8f5fc] py-16 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#e2d2f4] opacity-30 blur-3xl"></div>
      <div class="absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-[#c9b3e3] opacity-20 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Pricing Plans</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            Choose The Right <span class="text-[#a67c5b]">Plan For You</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto mb-6">
            All plans include a 14-day free trial. No credit card required to start.
          </p>
        </div>

        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
          <!-- Basic Plan -->
          <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-[#e2d2f4]/20 group hover:translate-y-[-4px]">
            <div class="p-8">
              <div class="text-center mb-6">
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#f8f5fc] text-[#5b4b8a] text-sm font-medium mb-3">
                  Starter Plan
                </div>
                <h3 class="text-2xl font-bold text-[#1e0933]">Basic</h3>
                <div class="mt-3 flex justify-center items-baseline">
                  <span class="text-5xl font-extrabold text-[#5b4b8a]">$97</span>
                  <span class="text-xl text-[#2f1652] font-medium">/month</span>
                </div>
                <p class="text-[#2f1652] mt-2">Perfect for small businesses just getting started</p>
              </div>

              <div class="space-y-4 mb-8">
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Basic email marketing tools</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Simple CRM functionality</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Up to 1,000 contacts</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Basic automation workflows</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Email support</span>
                </div>
                <div class="flex items-start space-x-3 text-gray-400">
                  <svg class="w-5 h-5 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                  <span>Advanced segmentation</span>
                </div>
                <div class="flex items-start space-x-3 text-gray-400">
                  <svg class="w-5 h-5 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                  <span>Custom integrations</span>
                </div>
              </div>

              <div class="text-center">
                <a 
                  href="/register" 
                  class="inline-flex items-center justify-center w-full px-6 py-3 bg-[#5b4b8a] hover:bg-[#4a3d73] text-white font-semibold rounded-lg transition-colors duration-200"
                >
                  Start 14-Day Free Trial
                </a>
                <p class="text-xs text-[#2f1652] mt-3">No credit card required</p>
              </div>
            </div>
          </div>

          <!-- Pro Plan -->
          <div class="bg-white rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-[#5b4b8a] relative transform hover:translate-y-[-8px] z-10">
            <div class="absolute top-0 inset-x-0 flex justify-center">
              <div class="bg-[#5b4b8a] text-white px-4 py-1 rounded-b-lg text-sm font-bold">
                MOST POPULAR
              </div>
            </div>
            
            <div class="p-8 pt-10">
              <div class="text-center mb-6">
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#f8f5fc] text-[#5b4b8a] text-sm font-medium mb-3">
                  Professional Plan
                </div>
                <h3 class="text-2xl font-bold text-[#1e0933]">Pro</h3>
                <div class="mt-3 flex justify-center items-baseline">
                  <span class="text-5xl font-extrabold text-[#5b4b8a]">$297</span>
                  <span class="text-xl text-[#2f1652] font-medium">/month</span>
                </div>
                <p class="text-[#2f1652] mt-2">Best for growing businesses and teams</p>
              </div>

              <div class="space-y-4 mb-8">
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Advanced email marketing</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Full CRM functionality</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Up to 10,000 contacts</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Advanced automation workflows</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Priority email & chat support</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#2f1652]">Advanced segmentation</span>
                </div>
                <div class="flex items-start space-x-3 text-gray-400">
                  <svg class="w-5 h-5 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                  <span>Dedicated account manager</span>
                </div>
              </div>

              <div class="text-center">
                <a 
                  href="/register" 
                  class="inline-flex items-center justify-center w-full px-6 py-3 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-semibold rounded-lg transition-colors duration-200 shadow-lg"
                >
                  Start 14-Day Free Trial
                </a>
                <p class="text-xs text-[#2f1652] mt-3">No credit card required</p>
              </div>
            </div>
          </div>

          <!-- Enterprise Plan -->
          <div class="bg-gradient-to-br from-[#1e0933] to-[#2f1652] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 text-white group hover:translate-y-[-4px]">
            <div class="p-8">
              <div class="text-center mb-6">
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#5b4b8a]/40 text-[#e2d2f4] text-sm font-medium mb-3">
                  Enterprise Plan
                </div>
                <h3 class="text-2xl font-bold">Enterprise</h3>
                <div class="mt-3 flex justify-center items-baseline">
                  <span class="text-5xl font-extrabold text-[#c9b3e3]">$497</span>
                  <span class="text-xl text-[#e2d2f4] font-medium">/month</span>
                </div>
                <p class="text-[#e2d2f4] mt-2">For established businesses with advanced needs</p>
              </div>

              <div class="space-y-4 mb-8">
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Complete marketing suite</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Enterprise CRM capabilities</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Unlimited contacts</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Advanced marketing automation</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">24/7 priority support</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Custom integrations</span>
                </div>
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-[#e2d2f4]">Dedicated account manager</span>
                </div>
              </div>

              <div class="text-center">
                <a 
                  href="/register" 
                  class="inline-flex items-center justify-center w-full px-6 py-3 bg-white hover:bg-[#f8f5fc] text-[#1e0933] font-semibold rounded-lg transition-colors duration-200 shadow-lg"
                >
                  Start 14-Day Free Trial
                </a>
                <p class="text-xs text-[#e2d2f4] mt-3">No credit card required</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonial Section -->
    <section class="bg-white py-16 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-70"></div>
      <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-70"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Success Stories</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            What Our <span class="text-[#a67c5b]">Customers Say</span>
          </h2>
        </div>

        <!-- Testimonial -->
        <div class="max-w-4xl mx-auto bg-gradient-to-br from-[#f8f5fc] to-[#e2d2f4] rounded-xl p-8 md:p-12 shadow-lg">
          <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
            <div class="flex-shrink-0">
              <img 
                src="/images/testimonial-avatar.png" 
                alt="Testimonial" 
                class="w-24 h-24 rounded-full border-4 border-white shadow-lg"
              >
            </div>
            <div>
              <svg class="w-12 h-12 text-[#5b4b8a] opacity-20 mb-4" fill="currentColor" viewBox="0 0 32 32">
                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.896 3.456-8.352 9.12-8.352 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
              </svg>
              <p class="text-[#2f1652] text-xl mb-6">
                "All In One Marketing has completely transformed how we approach our marketing. The automation tools have saved us countless hours, and the CRM has helped us close 40% more deals. Worth every penny!"
              </p>
              <div>
                <h4 class="text-[#1e0933] font-bold text-lg">Sarah Johnson</h4>
                <p class="text-[#5b4b8a]">Marketing Director, TechSolutions Inc.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-[#f8f5fc] py-16 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#e2d2f4] opacity-30 blur-3xl"></div>
      <div class="absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-[#c9b3e3] opacity-20 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Frequently Asked Questions</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            Common <span class="text-[#a67c5b]">Questions</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            Get answers to the most common questions about our services and plans.
          </p>
        </div>

        <div class="max-w-4xl mx-auto space-y-6">
          <!-- FAQ Item 1 -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300 border border-[#e2d2f4]/20">
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">What is included in the 14-day free trial?</h3>
            <p class="text-[#2f1652]">
              Our 14-day free trial includes full access to all features of your selected plan. You can explore the platform, set up your marketing campaigns, and see how our tools can help your business grow. No credit card is required to start, and you can cancel anytime during the trial period.
            </p>
          </div>
          
          <!-- FAQ Item 2 -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300 border border-[#e2d2f4]/20">
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">Can I upgrade or downgrade my plan later?</h3>
            <p class="text-[#2f1652]">
              Yes, you can easily upgrade or downgrade your plan at any time through your account settings. When upgrading, you'll immediately gain access to additional features. If you downgrade, the changes will take effect at the start of your next billing cycle.
            </p>
          </div>
          
          <!-- FAQ Item 3 -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300 border border-[#e2d2f4]/20">
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">Do you offer annual billing options?</h3>
            <p class="text-[#2f1652]">
              Yes, we offer annual billing with a 20% discount compared to monthly billing. You can select annual billing during signup or switch from your account settings page. Annual billing provides the best value for businesses committed to long-term growth.
            </p>
          </div>
          
          <!-- FAQ Item 4 -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300 border border-[#e2d2f4]/20">
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">What kind of support is included?</h3>
            <p class="text-[#2f1652]">
              All plans include access to our support resources, including documentation, tutorials, and community forums. Basic plans include email support, while Pro and Enterprise plans include priority email and chat support. Enterprise plans also include a dedicated account manager and 24/7 priority support.
            </p>
          </div>
          
          <!-- FAQ Item 5 -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300 border border-[#e2d2f4]/20">
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">Can I migrate my data from another platform?</h3>
            <p class="text-[#2f1652]">
              Yes, we offer data migration assistance for all customers. Our team will help you migrate your contacts, campaigns, and other important data from your previous platform. Pro and Enterprise plans include dedicated migration support to ensure a smooth transition.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Final CTA -->
    <section class="bg-gradient-to-br from-[#5b4b8a] to-[#2f1652] py-16 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute inset-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
          <defs>
            <pattern id="cta-grid" width="50" height="50" patternUnits="userSpaceOnUse">
              <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#8e6849" stroke-width="1"/>
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#cta-grid)" />
        </svg>
      </div>
      
      <!-- Accent Circles -->
      <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-[#c9b3e3] opacity-20 blur-3xl"></div>
      <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-[#a67c5b] opacity-10 blur-3xl"></div>

      <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
          Ready to <span class="text-[#c9b3e3]">Grow Your Business</span> with All In One Marketing?
        </h2>
        <p class="text-xl text-[#e2d2f4] mb-8 max-w-3xl mx-auto">
          Join thousands of successful businesses that have transformed their marketing with our all-in-one platform.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <a 
            href="/register" 
            class="inline-flex items-center px-8 py-4 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-bold text-lg rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg"
          >
            Start Your Free Trial
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>
          <a 
            href="/contact" 
            class="inline-flex items-center px-8 py-4 bg-transparent hover:bg-white/10 text-white border-2 border-white font-bold text-lg rounded-lg transition-all duration-200"
          >
            Contact Sales
          </a>
        </div>
        <p class="text-[#c9b3e3] text-sm mt-6">14-day free trial • No credit card required</p>
      </div>
    </section>
  </MarketingLayout>
</template> 