<script setup>
import { Head } from '@inertiajs/vue3';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
</script>

<template>
  <Head title="About - All In One Marketing" />
  
  <MarketingLayout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white py-16">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl lg:text-5xl font-bold mb-6">Who is Laquinda Johnson?</h1>
            <p class="text-xl lg:text-2xl text-gray-300 leading-relaxed">
                Laquinda Johnson one of the succesful businesswomen, inventor of the infomercial, As Seen On TV pioneer, producer of over <span class="text-orange-400 font-bold">$6 Billion in Global Sales</span> and recently took Celsius to a <span class="text-orange-400 font-bold">$15 Billion market cap</span>, can help you 10x your business!!
          </p>
        </div>
      </div>
    </section>

    <!-- Image Section (Previously Video Section) -->
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
          <div class="rounded-2xl overflow-hidden shadow-2xl">
            <div class="relative">
              <img 
                src="/images/me.jpg" 
                alt="Profile Image" 
                class="w-full mx-auto"
              >
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Celsius Success Story -->
    <section class="bg-gray-50 py-16">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <!-- Left Content -->
          <div class="space-y-6">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
              Celsius: <span class="text-orange-500 font-black">$15 Billion Market Cap</span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed">
              Kevin Harrington worked with Celsius for 10 years and helped grow the company from a small business to a household name by doing a deal with Pepsi and getting Pepsi distribution.
            </p>
            
            <!-- Success Stats -->
            <div class="grid grid-cols-2 gap-6">
              <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <div class="text-3xl font-bold text-orange-500 mb-2">10</div>
                <div class="text-gray-600 font-medium">Years Partnership</div>
              </div>
              <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <div class="text-3xl font-bold text-green-500 mb-2">$15B</div>
                <div class="text-gray-600 font-medium">Market Cap</div>
              </div>
            </div>
          </div>
          
          <!-- Right Image -->
          <div class="relative">
            <div class="bg-gradient-to-br from-orange-100 to-blue-100 rounded-2xl transform rotate-3 absolute inset-0"></div>
            <img 
              src="/images/celsius-success-story.jpg" 
              alt="Celsius Success Story" 
              class="relative w-full h-auto rounded-2xl shadow-xl"
            >
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-orange-500 py-12">
      <div class="container mx-auto px-4 text-center">
        <div class="max-w-2xl mx-auto">
          <h3 class="text-2xl lg:text-3xl font-bold text-white mb-8">
            Ready to 10x Your Business Like Celsius?
          </h3>
          <a 
            href="/automate" 
            class="inline-flex items-center px-8 py-4 bg-white text-orange-500 font-bold text-lg rounded-lg hover:bg-gray-100 transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
          >
            Learn More: $97 Unlimited Usage CRM
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>
    </section>

    <!-- Our Mission Section -->
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
          <!-- Icon -->
          <div class="w-24 h-24 mx-auto mb-8 bg-orange-100 rounded-full flex items-center justify-center">
            <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v2m10-2v2M7 20c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </div>
          
          <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
            Our goal is to help as many entrepreneurs & business owners as possible
          </h2>
          
          <div class="space-y-6 text-lg text-gray-600 leading-relaxed">
            <p>
              With over <strong>100 years of combined experience</strong> in the digital marketing space, we consistently encountered the same issue; having to manage dozens of tools to keep our business going. After examining the market and realizing there was nothing available that met our needs, we decided to build the All In One Marketing Platform.
            </p>
            
            <p>
              With All In One Marketing, we combined dozens of software platforms into one easy-to-use platform. As a result, we have helped <strong>thousands of entrepreneurs and business owners</strong> save money while increasing their client base. It is our goal to continue to enhance the platform and help thousands more in the years to come!
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Value Proposition Section -->
    <section class="bg-gradient-to-br from-slate-800 to-slate-900 text-white py-16">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl lg:text-4xl font-bold mb-4">
            Close more sales when combining our marketing automations tool with our powerful CRM
          </h2>
        </div>
        
        <div class="text-center">
          <a 
            href="/automate" 
            class="inline-flex items-center px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold text-lg rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
          >
            Learn More: $97 Unlimited Usage CRM
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>
    </section>

    <!-- Growth Section -->
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
            We've Helped Thousands of Business Owners <span class="text-orange-500 font-black">Grow Their Revenue</span>
          </h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            With over 100 years of combined experience working with thousands of business owners, All In One Marketing was specifically developed to help increase business revenue.
          </p>
        </div>
      </div>
    </section>

    <!-- Support Features -->
    <section class="bg-gray-50 py-16">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
          
          <!-- Support Network -->
          <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-start space-x-6">
              <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
              </div>
              <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Support Network</h3>
                <p class="text-gray-600 leading-relaxed">
                  Get access to our professional support. Our team will help answer any questions you have about our software.
                </p>
              </div>
            </div>
          </div>

          <!-- Business Network -->
          <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-start space-x-6">
              <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v2m10-2v2M7 20c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
              </div>
              <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Network of Business Owners</h3>
                <p class="text-gray-600 leading-relaxed">
                  Join thousands of business owners just like you by attending one of our Masterminds. Put yourself around the right people to 10x your business.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Final CTA Section -->
    <section class="bg-gradient-to-r from-orange-500 to-orange-600 py-16">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
          
          <!-- Left Content -->
          <div class="text-white">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">
              Try <span class="font-black">ALL IN ONE Marketing Software</span> for yourself
            </h2>
            <p class="text-xl text-orange-100 mb-8">
              Join thousands of successful business owners who have transformed their operations with our all-in-one platform.
            </p>
            
            <!-- Features List -->
            <div class="space-y-3">
              <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-orange-200" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-orange-100">Replace dozens of expensive tools</span>
              </div>
              <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-orange-200" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-orange-100">Save thousands per year</span>
              </div>
              <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-orange-200" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-orange-100">24/7 support included</span>
              </div>
            </div>
          </div>
          
          <!-- Right CTA -->
          <div class="text-center lg:text-right">
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-8">
              <h3 class="text-2xl font-bold text-white mb-6">Ready to Get Started?</h3>
              <a 
                href="/automate" 
                class="inline-flex items-center px-8 py-4 bg-white text-orange-500 font-bold text-lg rounded-lg hover:bg-gray-100 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
              >
                Learn More
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
              <p class="text-orange-100 text-sm mt-4">One-time fee of $97 • No monthly subscriptions</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MarketingLayout>
</template>

<style scoped>
/* Custom styles if needed */
</style>