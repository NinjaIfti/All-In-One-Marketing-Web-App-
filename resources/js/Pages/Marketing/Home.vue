<script setup>
import { Head } from '@inertiajs/vue3';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import StarRating from '@/Components/Marketing/StarRating.vue';
</script>

<template>
  <Head title="All In One Marketing - Home" />
  
  <MarketingLayout>
    <!-- Main Hero Section -->
    <div class="bg-navy-900 text-white">
      <div class="container mx-auto flex flex-col lg:flex-row py-12">
        <!-- Left content -->
        <div class="lg:w-7/12 px-4 lg:px-8">
          <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold mb-4">All In One Marketing Software & CRM</h1>
          <h2 class="text-2xl lg:text-3xl mb-10">Replace <span class="text-orange-500 font-bold">All Marketing & Business Software</span> In One Tool!</h2>
          
          <div class="bg-white rounded-lg shadow-lg p-6 mb-8 w-full lg:w-10/12">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-navy-900 rounded-full flex items-center justify-center mr-4">
                <span class="text-white text-2xl">∞</span>
              </div>
              <div>
                <h3 class="text-navy-900 font-bold text-lg">Complete CRM system with UNLIMITED Contacts</h3>
              </div>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-navy-900 rounded-full flex items-center justify-center mr-4">
                <span class="text-white text-2xl">🌐</span>
              </div>
              <div>
                <h3 class="text-navy-900 font-bold text-lg">Free Website, Funnels, & Hosting</h3>
              </div>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-navy-900 rounded-full flex items-center justify-center mr-4">
                <span class="text-white text-2xl">🔄</span>
              </div>
              <div>
                <h3 class="text-navy-900 font-bold text-lg">Unlimited Automations</h3>
              </div>
            </div>
            
            <div class="flex items-center">
              <div class="w-12 h-12 bg-navy-900 rounded-full flex items-center justify-center mr-4">
                <span class="text-white text-2xl">🤖</span>
              </div>
              <div>
                <h3 class="text-navy-900 font-bold text-lg">Create AI SMS bots, AI Email Bots, AI Calling Bots</h3>
              </div>
            </div>
          </div>
          
          <div class="flex items-center mb-8">
            <span class="text-xl lg:text-2xl mr-4">Send Unlimited</span>
            <div class="bg-white text-navy-900 font-bold py-2 px-4 rounded-lg">
              Emails & SMS For $0
            </div>
          </div>
          
          <div class="mb-8">
            <div class="flex items-center mb-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span>7-Day Refund Guarantee</span>
            </div>
          </div>
        </div>
        
        <!-- Right form -->
        <div class="lg:w-5/12 px-4 lg:px-8">
          <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="p-2">
              <div class="bg-gray-50 rounded-lg px-6 py-8">
                <h2 class="text-center text-2xl lg:text-3xl font-bold text-navy-900 mb-8">One Time Fee Of $97!</h2>
                
                <!-- Star Rating -->
                <div class="flex justify-center mb-8">
                  <StarRating :rating="5" />
                </div>
                
                <!-- Form -->
                <div class="space-y-4">
                  <input type="text" placeholder="Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                  
                  <div class="flex">
                    <div class="w-16 bg-gray-100 flex items-center justify-center rounded-l-lg border border-gray-300">
                      <span class="text-gray-500">🇺🇸</span>
                    </div>
                    <input type="tel" placeholder="Phone" class="flex-1 px-4 py-3 border border-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                  </div>
                  
                  <input type="email" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                  
                  <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-6 rounded-lg text-xl transition duration-200">
                    Unlock Now
                  </button>
                  
                  <div class="text-center text-gray-600 text-sm">
                    <div class="flex justify-center mb-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                      </svg>
                    </div>
                    Your info is kept 100% confidential
                  </div>
                </div>
                
                <!-- Testimonial Quote -->
                <div class="mt-8 bg-navy-900 text-white p-4 rounded-lg">
                  <div class="text-3xl font-serif text-orange-500 opacity-90 mb-2">"</div>
                  <p class="text-white text-center italic">
                    All In One Marketing provides unbelievable service! Keep Up The Good Work!
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- As Seen On Section -->
    <div class="bg-gray-100 py-8">
      <div class="container mx-auto">
        <h3 class="text-center text-2xl text-gray-500 mb-8">As Seen On</h3>
        <div class="flex flex-wrap justify-center items-center gap-8 opacity-60">
          <img src="/images/logo-inc.png" alt="Inc." class="h-8">
          <img src="/images/logo-cbs.png" alt="CBS" class="h-8">
          <img src="/images/logo-forbes.png" alt="Forbes" class="h-8">
          <img src="/images/logo-fox.png" alt="Fox Business" class="h-8">
        </div>
      </div>
    </div>
  </MarketingLayout>
</template>

<style scoped>
.bg-navy-900 {
  background-color: #0a1933;
}

.text-navy-900 {
  color: #0a1933;
}

.bg-orange-500 {
  background-color: #f97316;
}

.bg-orange-600 {
  background-color: #ea580c;
}

.text-orange-500 {
  color: #f97316;
}
</style>