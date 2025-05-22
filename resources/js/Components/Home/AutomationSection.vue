<template>
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
            Simple, But <span class="text-orange-500 font-black">Powerful Automations</span>
          </h2>
          <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Convert more leads and close more deals with personalized and automated follow-up messages
          </p>
        </div>
  
        <!-- Automation Features Grid -->
        <div class="space-y-16">
          
          <!-- Time Saving Feature -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
              <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">
                Our Software Saves Business Owners <span class="font-black">10+ Hours per week</span>
              </h3>
              <p class="text-lg text-gray-600 leading-relaxed">
                Easily set different types of conditions and workflow actions based on a variety of data points. Send specific emails, text messages, and ringless voicemails based on customer data.
              </p>
              
              <!-- Time Savings Stats -->
              <div class="grid grid-cols-2 gap-6 mt-8">
                <div class="text-center p-4 bg-green-50 rounded-lg">
                  <div class="text-3xl font-bold text-green-600">10+</div>
                  <div class="text-sm text-gray-600">Hours Saved/Week</div>
                </div>
                <div class="text-center p-4 bg-blue-50 rounded-lg">
                  <div class="text-3xl font-bold text-blue-600">85%</div>
                  <div class="text-sm text-gray-600">Less Manual Work</div>
                </div>
              </div>
            </div>
            
            <div class="lg:order-last">
              <img 
                src="/images/automation-workflow.png" 
                alt="Automation Workflow" 
                class="w-full h-auto rounded-xl shadow-lg"
              >
            </div>
          </div>
  
          <!-- Lead Conversion Feature -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-last lg:order-first">
              <img 
                src="/images/lead-conversion.png" 
                alt="Lead Conversion Automation" 
                class="w-full h-auto rounded-xl shadow-lg"
              >
            </div>
            
            <div class="space-y-6 order-first lg:order-last">
              <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">
                Convert Leads with <span class="font-black">Automated Follow-Up</span>
              </h3>
              <p class="text-lg text-gray-600 leading-relaxed">
                Automatically follow-up with your leads via email, SMS, and ringless voicemail. Convert more leads into sales and increase your revenue.
              </p>
              
              <!-- Conversion Stats -->
              <div class="space-y-4">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                  <span class="text-gray-700">Email Follow-ups</span>
                  <span class="font-semibold text-green-600">+45% Conversion</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                  <span class="text-gray-700">SMS Campaigns</span>
                  <span class="font-semibold text-green-600">+62% Open Rate</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                  <span class="text-gray-700">Voice Drops</span>
                  <span class="font-semibold text-green-600">+38% Response</span>
                </div>
              </div>
            </div>
          </div>
  
          <!-- CRM Feature -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
              <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">
                CRM With <span class="font-black">Unlimited Contacts</span>
              </h3>
              <p class="text-lg text-gray-600 leading-relaxed">
                Our CRM feature is easy to manage and is highly customizable. Easily create smart lists based on custom field data, tag contacts, and perform bulk actions to help save time and energy.
              </p>
              
              <!-- CRM Features -->
              <div class="space-y-3">
                <CRMFeature title="Unlimited Contacts" description="No limits on your contact database" />
                <CRMFeature title="Smart Lists" description="Auto-segment based on behavior" />
                <CRMFeature title="Custom Fields" description="Track any data point you need" />
                <CRMFeature title="Bulk Actions" description="Manage thousands of contacts at once" />
              </div>
            </div>
            
            <div class="lg:order-last">
              <img 
                src="/images/crm-dashboard.png" 
                alt="CRM Dashboard" 
                class="w-full h-auto rounded-xl shadow-lg"
              >
            </div>
          </div>
  
          <!-- Communication Feature -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-last lg:order-first">
              <img 
                src="/images/communication-tools.png" 
                alt="Communication Tools" 
                class="w-full h-auto rounded-xl shadow-lg"
              >
            </div>
            
            <div class="space-y-6 order-first lg:order-last">
              <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">
                Send Unlimited <span class="text-orange-500 font-black">Emails & SMS</span>
              </h3>
              <p class="text-lg text-gray-600 leading-relaxed mb-6">
                Our software includes unlimited usage for communication via email, SMS, and phone. Never pay to send an email or text again!
              </p>
  
              <!-- Communication Methods -->
              <div class="space-y-4">
                <div class="flex items-center space-x-4 p-4 bg-blue-50 rounded-lg">
                  <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-900">Email Marketing</h4>
                    <p class="text-gray-600 text-sm">Unlimited emails with advanced builder</p>
                  </div>
                </div>
                
                <div class="flex items-center space-x-4 p-4 bg-green-50 rounded-lg">
                  <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-900">SMS Marketing</h4>
                    <p class="text-gray-600 text-sm">Unlimited text messages worldwide</p>
                  </div>
                </div>
                
                <div class="flex items-center space-x-4 p-4 bg-purple-50 rounded-lg">
                  <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-900">Voice & Calling</h4>
                    <p class="text-gray-600 text-sm">Phone calls & voicemail drops</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import CRMFeature from '@/Components/Home/CRMFeature.vue';
  </script>