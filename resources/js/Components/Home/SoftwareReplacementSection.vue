<template>
    <section class="bg-[#f8f5fc] py-20 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-[#e2d2f4] opacity-50 blur-3xl"></div>
      <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-[#c9b3e3] opacity-30 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">All-in-One Solution</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            Replaces <span class="text-[#a67c5b] font-black">All Of These Softwares</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto mb-12">
            Manage every aspect of your business with All In One Marketing Software. We replace every marketing tool in one platform and even include pre-made templates to get started immediately.
          </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <!-- Left Content -->
          <div class="space-y-6">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
              Replaces <span class="text-orange-500 font-black">All Of These Softwares</span>
            </h2>
            
            <p class="text-lg text-gray-600 leading-relaxed">
              Manage every aspect of your business with All In One Marketing Software. We replace every marketing tool all in one platform and even includes pre-made templates so you can get started immediately.
            </p>
            
            <div class="bg-white rounded-lg p-6 shadow-lg">
              <div class="flex items-start space-x-3">
                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mt-1">
                  <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                </div>
                <div>
                  <p class="text-gray-700 leading-relaxed">
                    <strong>We replace all of these!</strong> SalesForce, HubSpot, Clixlo, MailChimp, AWeber, PipeDrive, Keap, Active Campaign, Zoho, and much more!
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Right Software Logos Grid -->
          <div class="relative">
            <!-- Background decoration -->
            <div class="absolute inset-0 bg-gradient-to-br from-orange-100 to-blue-100 rounded-2xl transform rotate-3"></div>
            
            <!-- Main grid -->
            <div class="relative bg-white rounded-2xl p-8 shadow-xl">
              <div class="grid grid-cols-3 gap-6">
                <!-- Row 1 -->
                <SoftwareLogo 
                  name="HubSpot" 
                  logo="/images/software-logos/hubspot.png"
                  price="$800/mo"
                />
                <SoftwareLogo 
                  name="Salesforce" 
                  logo="/images/software-logos/salesforce.png"
                  price="$300/mo"
                />
                <SoftwareLogo 
                  name="Mailchimp" 
                  logo="/images/software-logos/mailchimp.png"
                  price="$350/mo"
                />
                
                <!-- Row 2 -->
                <SoftwareLogo 
                  name="ActiveCampaign" 
                  logo="/images/software-logos/activecampaign.png"
                  price="$180/mo"
                />
                <SoftwareLogo 
                  name="Pipedrive" 
                  logo="/images/software-logos/pipedrive.png"
                  price="$100/mo"
                />
                <SoftwareLogo 
                  name="AWeber" 
                  logo="/images/software-logos/aweber.png"
                  price="$70/mo"
                />
                
                <!-- Row 3 -->
                <SoftwareLogo 
                  name="Keap" 
                  logo="/images/software-logos/keap.png"
                  price="$200/mo"
                />
                <SoftwareLogo 
                  name="Zoho" 
                  logo="/images/software-logos/zoho.png"
                  price="$150/mo"
                />
                <SoftwareLogo 
                  name="ClickFunnels" 
                  logo="/images/software-logos/clickfunnels.png"
                  price="$300/mo"
                />
              </div>
              
              <!-- Total Cost -->
              <div class="mt-8 text-center">
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                  <p class="text-red-700 font-semibold text-lg">
                    Total Monthly Cost: <span class="text-2xl font-bold">$2,450+</span>
                  </p>
                </div>
                
                <div class="mt-4">
                  <div class="flex items-center justify-center space-x-2 text-2xl font-bold">
                    <span class="text-gray-400 line-through">$2,450/month</span>
                    <span class="text-green-600">→</span>
                    <span class="text-green-600">$97 one-time</span>
                  </div>
                  <p class="text-green-600 font-semibold mt-2">Save $29,303+ per year!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Call to Action -->
        <div class="text-center mt-12">
          <a 
            href="#signup" 
            class="inline-flex items-center px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold text-lg rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
          >
            Get Started Now - Save Thousands
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import SoftwareLogo from '@/Components/Home/SoftwareLogo.vue';
  </script>