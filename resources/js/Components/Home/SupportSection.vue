<template>
    <section class="bg-gradient-to-br from-blue-900 to-slate-900 py-16">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          
          <!-- Left Side - Image -->
          <div class="hidden lg:block">
            <div class="relative">
              <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl p-8 shadow-2xl">
                <img 
                  src="/images/support-illustration.png" 
                  alt="24/7 AI Support" 
                  class="w-full h-auto"
                >
              </div>
              
              <!-- Floating support badges -->
              <div class="absolute -top-4 -right-4 bg-green-500 text-white px-4 py-2 rounded-full font-semibold text-sm shadow-lg">
                <div class="flex items-center space-x-2">
                  <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                  <span>Online Now</span>
                </div>
              </div>
              
              <div class="absolute -bottom-4 -left-4 bg-white text-gray-800 px-4 py-2 rounded-full font-semibold text-sm shadow-lg">
                <div class="flex items-center space-x-2">
                  <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                  </svg>
                  <span>24/7 Available</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Right Side - Content -->
          <div class="text-white space-y-6">
            <div class="lg:hidden mb-8">
              <img 
                src="/images/support-illustration.png" 
                alt="24/7 AI Support" 
                class="w-64 h-auto mx-auto"
              >
            </div>
            
            <h2 class="text-3xl lg:text-4xl font-bold">
              Includes <span class="text-orange-400 font-black">24/7 AI Support</span>
            </h2>
            
            <p class="text-lg text-gray-300 leading-relaxed">
              Your business matters to us. That's why we provide 24/7 AI support. When challenges arise, you're never alone—we're always here to help!
            </p>
            
            <p class="text-lg text-gray-300 leading-relaxed">
              Plus, you also receive an onboarding call from our team so you can get set up right away.
            </p>
            
            <!-- Support Features -->
            <div class="space-y-4 mt-8">
              <SupportFeature 
                icon="🤖"
                title="AI-Powered Support"
                description="Get instant answers to your questions 24/7"
              />
              
              <SupportFeature 
                icon="📞"
                title="Personal Onboarding Call"
                description="One-on-one setup assistance from our experts"
              />
              
              <SupportFeature 
                icon="💬"
                title="Live Chat Support"
                description="Real human support when you need it most"
              />
              
              <SupportFeature 
                icon="📚"
                title="Complete Training Library"
                description="Step-by-step tutorials and video guides"
              />
            </div>
            
            <!-- Support Stats -->
            <div class="grid grid-cols-3 gap-6 mt-8 pt-8 border-t border-gray-700">
              <div class="text-center">
                <div class="text-2xl font-bold text-orange-400">99.9%</div>
                <div class="text-sm text-gray-300">Uptime</div>
              </div>
              <div class="text-center">
                <div class="text-2xl font-bold text-orange-400">&lt;30s</div>
                <div class="text-sm text-gray-300">Response Time</div>
              </div>
              <div class="text-center">
                <div class="text-2xl font-bold text-orange-400">24/7</div>
                <div class="text-sm text-gray-300">Available</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import SupportFeature from '@/Components/Home/SupportFeature.vue';
  </script>