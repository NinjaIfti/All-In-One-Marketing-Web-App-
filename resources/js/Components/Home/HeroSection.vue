<template>
    <section class="bg-gradient-to-br from-[#1e0933] via-[#2f1652] to-[#1e0933] text-white min-h-screen flex items-center relative overflow-hidden">
      <!-- Background decorative elements -->
      <div class="absolute inset-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
          <defs>
            <pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse">
              <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#5b4b8a" stroke-width="1"/>
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
      </div>
      
      <!-- Accent Circles -->
      <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#5b4b8a] opacity-20 blur-3xl"></div>
      <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-[#a67c5b] opacity-10 blur-3xl"></div>
      
      <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
          
          <!-- Left Content -->
          <div class="lg:col-span-7 space-y-8">
            <div class="space-y-4">
              <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#5b4b8a] bg-opacity-20 text-[#c9b3e3] text-sm font-medium">
                <span class="w-2 h-2 rounded-full bg-[#a67c5b] mr-2"></span>
                All In One Marketing Software & CRM
              </div>
              <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
                Replace <span class="text-[#c9b3e3] font-black">All Marketing & Business Software</span> In One Tool!
              </h1>
              <p class="text-xl lg:text-2xl text-[#e2d2f4] font-medium">
                <strong>Send Unlimited</strong> Emails & SMS With Our Plans
              </p>
            </div>
  
            <!-- Feature List -->
            <div class="space-y-5">
              <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-[#a67c5b] rounded-full flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
                <span class="text-lg text-[#e2d2f4]">Complete CRM system with UNLIMITED Contacts</span>
              </div>
              
              <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-[#a67c5b] rounded-full flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9" />
                  </svg>
                </div>
                <span class="text-lg text-[#e2d2f4]">Free Website, Funnels, & Hosting</span>
              </div>
              
              <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-[#a67c5b] rounded-full flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                  </svg>
                </div>
                <span class="text-lg text-[#e2d2f4]">Unlimited Automations</span>
              </div>
              
              <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-[#a67c5b] rounded-full flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <span class="text-lg text-[#e2d2f4]">Create AI SMS bots, AI Email Bots, AI Calling Bots</span>
              </div>
              
              <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-[#5b4b8a] rounded-full flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                  </svg>
                </div>
                <span class="text-lg text-[#e2d2f4]">14-Day Free Trial Available</span>
              </div>

              <!-- NEW: Plans Preview -->
              <div class="mt-8 flex flex-wrap items-center gap-4">
                <div class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg border border-[#c9b3e3]/20">
                  <div class="text-[#c9b3e3] font-medium">Starter</div>
                  <div class="text-white font-bold text-xl">$97<span class="text-sm font-normal">/mo</span></div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg border border-[#c9b3e3]/20">
                  <div class="text-[#c9b3e3] font-medium">Professional</div>
                  <div class="text-white font-bold text-xl">$297<span class="text-sm font-normal">/mo</span></div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg border border-[#c9b3e3]/20">
                  <div class="text-[#c9b3e3] font-medium">Enterprise</div>
                  <div class="text-white font-bold text-xl">$497<span class="text-sm font-normal">/mo</span></div>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Right Form -->
          <div class="lg:col-span-5">
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden max-w-md mx-auto border border-[#c9b3e3]/20">
              <div class="bg-gradient-to-r from-[#a67c5b] to-[#8e6849] px-6 py-4 text-center">
                <h3 class="text-2xl font-bold text-white">Start Your 14-Day Free Trial</h3>
              </div>
              
              <div class="p-8 space-y-6">
                <!-- Star Rating -->
                <div class="flex justify-center">
                  <StarRating :rating="5" />
                </div>
                
                <!-- Form -->
                <form class="space-y-4" @submit.prevent="submitForm">
                  <div>
                    <input 
                      v-model="form.name"
                      type="text" 
                      placeholder="Name *" 
                      class="w-full px-4 py-3 bg-white/10 border border-[#c9b3e3]/20 rounded-lg text-white placeholder-[#e2d2f4] focus:outline-none focus:ring-2 focus:ring-[#a67c5b] focus:border-transparent"
                      required
                    >
                  </div>
                  
                  <div class="flex">
                    <div class="flex items-center justify-center px-3 bg-white/10 border border-r-0 border-[#c9b3e3]/20 rounded-l-lg text-[#e2d2f4]">
                      <span class="text-sm">🇺🇸 +1</span>
                    </div>
                    <input 
                      v-model="form.phone"
                      type="tel" 
                      placeholder="Phone *" 
                      class="flex-1 px-4 py-3 bg-white/10 border border-[#c9b3e3]/20 rounded-r-lg text-white placeholder-[#e2d2f4] focus:outline-none focus:ring-2 focus:ring-[#a67c5b] focus:border-transparent"
                      required
                    >
                  </div>
                  
                  <div>
                    <input 
                      v-model="form.email"
                      type="email" 
                      placeholder="Email *" 
                      class="w-full px-4 py-3 bg-white/10 border border-[#c9b3e3]/20 rounded-lg text-white placeholder-[#e2d2f4] focus:outline-none focus:ring-2 focus:ring-[#a67c5b] focus:border-transparent"
                      required
                    >
                  </div>
                  
                  <!-- Select Plan Dropdown -->
                  <div>
                    <select
                      v-model="form.plan"
                      class="w-full px-4 py-3 bg-white/10 border border-[#c9b3e3]/20 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#a67c5b] focus:border-transparent"
                      required
                    >
                      <option value="" disabled selected class="text-[#2f1652] bg-white">Select Plan</option>
                      <option value="starter" class="text-[#2f1652] bg-white">Starter: $97/month</option>
                      <option value="professional" class="text-[#2f1652] bg-white">Professional: $297/month</option>
                      <option value="enterprise" class="text-[#2f1652] bg-white">Enterprise: $497/month</option>
                    </select>
                  </div>
                  
                  <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-[#5b4b8a] to-[#2f1652] hover:from-[#5b4b8a] hover:to-[#1e0933] text-white font-bold py-4 px-6 rounded-lg text-xl transition-all duration-200 transform hover:scale-105 shadow-lg"
                    :disabled="submitting"
                  >
                    <span v-if="!submitting">Start Free Trial</span>
                    <span v-else class="flex items-center justify-center">
                      <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                      Processing...
                    </span>
                  </button>
                </form>
                
                <!-- Security Notice -->
                <div class="text-center">
                  <div class="flex justify-center mb-2">
                    <svg class="h-5 w-5 text-[#c9b3e3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                  </div>
                  <p class="text-[#c9b3e3] text-sm">Your info is kept 100% confidential</p>
                </div>
                
                <!-- Testimonial Quote -->
                <div class="bg-[#1e0933] text-white p-4 rounded-lg text-center border border-[#5b4b8a]/30">
                  <div class="text-3xl text-[#a67c5b] mb-2">"</div>
                  <p class="italic text-[#e2d2f4]">All In One Marketing provides unbelievable service! Keep Up The Good Work!</p>
                </div>
                
                <!-- Disclaimer -->
                <div class="text-xs text-[#c9b3e3]/70 text-center leading-relaxed">
                  By clicking "Start Free Trial" I give AllInOneMarketing.com and its partners express written permission to contact me at the number and email I provided above, via email, phone, text message (SMS/MMS) and/or cell phone. This consent is not a condition of receiving services.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import StarRating from '@/Components/Marketing/StarRating.vue';
  
  const form = ref({
    name: '',
    phone: '',
    email: '',
    plan: ''
  });
  
  const submitting = ref(false);
  
  const submitForm = async () => {
    submitting.value = true;
    
    try {
      // Add your form submission logic here
      console.log('Form submitted:', form.value);
      
      // Simulate API call
      await new Promise(resolve => setTimeout(resolve, 2000));
      
      // Handle success
      alert('Thank you! Your free trial has been activated. We will contact you soon.');
      
      // Reset form
      form.value = {
        name: '',
        phone: '',
        email: '',
        plan: ''
      };
    } catch (error) {
      console.error('Form submission error:', error);
      alert('Something went wrong. Please try again.');
    } finally {
      submitting.value = false;
    }
  };
  </script>