<template>
  <section class="bg-[#f8f5fc] py-20 relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-[#e2d2f4] opacity-50 blur-3xl"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-[#c9b3e3] opacity-30 blur-3xl"></div>
    
    <div class="container mx-auto px-4 relative z-10">
      <div class="max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Pricing Plans</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            Choose The Plan That Fits Your <span class="text-[#a67c5b]">Business Needs</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            Our flexible pricing options are designed to scale with your business, providing enterprise-level features at a fraction of the cost of multiple separate tools.
          </p>
        </div>
        
        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
          <!-- Starter Plan -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden border-2 border-[#e2d2f4] hover:border-[#c9b3e3] transition-colors duration-300 transform hover:-translate-y-1 hover:shadow-xl">
            <div class="bg-[#e2d2f4] bg-opacity-30 px-6 py-4">
              <h3 class="text-xl font-bold text-[#1e0933]">Starter</h3>
              <p class="text-[#5b4b8a] text-sm">Perfect for small businesses</p>
            </div>
            
            <div class="p-6">
              <div class="flex items-end mb-6">
                <span class="text-4xl font-bold text-[#1e0933]">$97</span>
                <span class="text-[#5b4b8a] ml-2">/month</span>
              </div>
              
              <div class="space-y-4 mb-8">
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Up to 10,000 contacts</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Email & SMS marketing</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">CRM & contact management</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Basic automation workflows</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Website & landing page builder</span>
                </div>
              </div>
              
              <a href="#signup" class="block w-full py-3 px-4 bg-[#5b4b8a] hover:bg-[#4a3d73] text-white text-center font-bold rounded-lg transition-colors duration-200">
                Start Free Trial
              </a>
            </div>
          </div>
          
          <!-- Professional Plan -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden border-2 border-[#5b4b8a] transform hover:-translate-y-1 hover:shadow-xl relative">
            <!-- Popular Tag -->
            <div class="absolute top-0 right-0">
              <div class="bg-[#a67c5b] text-white text-xs font-bold py-1 px-3 transform translate-x-1/4 -translate-y-1/4 rotate-45">
                POPULAR
              </div>
            </div>
            
            <div class="bg-[#c9b3e3] bg-opacity-30 px-6 py-4">
              <h3 class="text-xl font-bold text-[#1e0933]">Professional</h3>
              <p class="text-[#5b4b8a] text-sm">Ideal for growing businesses</p>
            </div>
            
            <div class="p-6">
              <div class="flex items-end mb-6">
                <span class="text-4xl font-bold text-[#1e0933]">$297</span>
                <span class="text-[#5b4b8a] ml-2">/month</span>
              </div>
              
              <div class="space-y-4 mb-8">
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Up to 50,000 contacts</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Everything in Starter</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Advanced automation workflows</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">AI content generation</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Priority support</span>
                </div>
              </div>
              
              <a href="#signup" class="block w-full py-3 px-4 bg-[#a67c5b] hover:bg-[#8e6849] text-white text-center font-bold rounded-lg transition-colors duration-200">
                Start Free Trial
              </a>
            </div>
          </div>
          
          <!-- Enterprise Plan -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden border-2 border-[#e2d2f4] hover:border-[#c9b3e3] transition-colors duration-300 transform hover:-translate-y-1 hover:shadow-xl">
            <div class="bg-[#e2d2f4] bg-opacity-30 px-6 py-4">
              <h3 class="text-xl font-bold text-[#1e0933]">Enterprise</h3>
              <p class="text-[#5b4b8a] text-sm">For large organizations</p>
            </div>
            
            <div class="p-6">
              <div class="flex items-end mb-6">
                <span class="text-4xl font-bold text-[#1e0933]">$497</span>
                <span class="text-[#5b4b8a] ml-2">/month</span>
              </div>
              
              <div class="space-y-4 mb-8">
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Unlimited contacts</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Everything in Professional</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Advanced API integrations</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Dedicated account manager</span>
                </div>
                
                <div class="flex items-start">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Custom development</span>
                </div>
              </div>
              
              <a href="#signup" class="block w-full py-3 px-4 bg-[#5b4b8a] hover:bg-[#4a3d73] text-white text-center font-bold rounded-lg transition-colors duration-200">
                Start Free Trial
              </a>
            </div>
          </div>
        </div>
        
        <!-- Free Trial Banner -->
        <div class="bg-white rounded-xl shadow-lg p-6 lg:p-8 max-w-4xl mx-auto relative overflow-hidden">
          <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#5b4b8a] to-[#c9b3e3]"></div>
          <div class="absolute -top-20 -right-20 w-40 h-40 bg-[#e2d2f4] rounded-full opacity-30 blur-xl"></div>
          
          <div class="relative flex flex-col md:flex-row items-center gap-6">
            <div class="md:w-1/2 space-y-4">
              <h3 class="text-2xl font-bold text-[#1e0933]">All Plans Include a 14-Day Free Trial</h3>
              <p class="text-[#2f1652]">Test drive all features with no commitment. No credit card required to start.</p>
              <div class="flex flex-wrap gap-4 pt-2">
                <div class="flex items-center text-sm text-[#5b4b8a]">
                  <svg class="w-5 h-5 text-[#a67c5b] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span>Cancel anytime</span>
                </div>
                <div class="flex items-center text-sm text-[#5b4b8a]">
                  <svg class="w-5 h-5 text-[#a67c5b] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span>Full access</span>
                </div>
                <div class="flex items-center text-sm text-[#5b4b8a]">
                  <svg class="w-5 h-5 text-[#a67c5b] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span>No obligations</span>
                </div>
              </div>
            </div>
            
            <div class="md:w-1/2 flex justify-center md:justify-end">
              <a 
                href="#signup" 
                class="inline-flex items-center px-8 py-4 bg-[#5b4b8a] hover:bg-[#4a3d73] text-white font-bold rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl"
              >
                Start Your Free Trial
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
        
        <!-- FAQ Teaser -->
        <div class="text-center mt-16">
          <p class="text-[#5b4b8a]">Have questions about our plans?</p>
          <a href="#faq" class="inline-flex items-center text-[#a67c5b] font-bold hover:text-[#8e6849] transition-colors duration-200">
            View Frequently Asked Questions
            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
// No additional script needed for this component
</script> 