<script setup>
import { Head } from '@inertiajs/vue3';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
</script>

<template>
  <Head title="Brand Ambassador Program - All In One Marketing" />
  
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
            Become a Brand Partner
          </div>
          <h1 class="text-4xl lg:text-5xl font-bold mb-6">Join Our <span class="text-[#c9b3e3]">Brand Ambassador</span> Program</h1>
          <p class="text-xl lg:text-2xl text-[#e2d2f4] leading-relaxed mb-8">
            Partner with us to promote our marketing platform and earn generous commissions while helping businesses grow
          </p>
          <a 
            href="#apply" 
            class="inline-flex items-center px-8 py-4 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-bold text-lg rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg"
          >
            Apply Now
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>
        </div>
      </div>
    </section>

    <!-- Program Overview Section -->
    <section class="bg-white py-16 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-70"></div>
      <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-70"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Program Overview</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            What is the <span class="text-[#a67c5b]">Brand Ambassador</span> Program?
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            Our Brand Ambassador Program is designed for marketers, influencers, and business professionals who want to represent and promote our All-In-One Marketing platform while earning competitive commissions.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
          <div class="relative">
            <div class="aspect-video rounded-xl overflow-hidden shadow-xl">
              <img 
                src="/images/brand-ambassador-team.jpg" 
                alt="Brand Ambassador Team"
                class="w-full h-full object-cover"
              >
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-[#f8f5fc] rounded-full z-[-1]"></div>
            <div class="absolute -top-6 -left-6 w-24 h-24 bg-[#e2d2f4] rounded-full z-[-1]"></div>
          </div>

          <div class="flex flex-col justify-center">
            <h3 class="text-2xl font-bold text-[#1e0933] mb-4">Why Become an Ambassador?</h3>
            <p class="text-[#2f1652] mb-6">
              As a Brand Ambassador for All-In-One Marketing, you'll have the opportunity to earn substantial commissions while representing a product that genuinely helps businesses grow. Our ambassadors are passionate about marketing and helping others succeed.
            </p>
            
            <div class="space-y-4">
              <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-[#5b4b8a] flex items-center justify-center mt-1">
                  <span class="text-white font-bold">1</span>
                </div>
                <div>
                  <h4 class="font-semibold text-[#1e0933]">Promote Our Platform</h4>
                  <p class="text-[#2f1652]">Share our marketing platform with your network and audience</p>
                </div>
              </div>
              
              <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-[#5b4b8a] flex items-center justify-center mt-1">
                  <span class="text-white font-bold">2</span>
                </div>
                <div>
                  <h4 class="font-semibold text-[#1e0933]">Generate Referrals</h4>
                  <p class="text-[#2f1652]">Use your unique referral link to track sign-ups and sales</p>
                </div>
              </div>
              
              <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-[#5b4b8a] flex items-center justify-center mt-1">
                  <span class="text-white font-bold">3</span>
                </div>
                <div>
                  <h4 class="font-semibold text-[#1e0933]">Earn Commissions</h4>
                  <p class="text-[#2f1652]">Receive generous commissions for every successful referral</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Benefits Section -->
    <section class="bg-[#f8f5fc] py-16 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#e2d2f4] opacity-30 blur-3xl"></div>
      <div class="absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-[#c9b3e3] opacity-20 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Program Benefits</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            Ambassador <span class="text-[#a67c5b]">Benefits</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            Being part of our Brand Ambassador program comes with exclusive benefits and opportunities
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
          <!-- Benefit 1: Competitive Commissions -->
          <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-[#e2d2f4]/20">
            <div class="w-16 h-16 bg-[#5b4b8a] rounded-full flex items-center justify-center mb-6 shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">Competitive Commissions</h3>
            <p class="text-[#2f1652]">
              Earn up to 30% commission on every successful referral that signs up for our platform. Our tiered commission structure rewards top performers with even higher rates.
            </p>
          </div>
          
          <!-- Benefit 2: Marketing Resources -->
          <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-[#e2d2f4]/20">
            <div class="w-16 h-16 bg-[#a67c5b] rounded-full flex items-center justify-center mb-6 shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">Marketing Resources</h3>
            <p class="text-[#2f1652]">
              Access exclusive marketing materials, including professional graphics, pre-written copy, promotional videos, and presentation templates to help you promote effectively.
            </p>
          </div>
          
          <!-- Benefit 3: Early Access -->
          <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-[#e2d2f4]/20">
            <div class="w-16 h-16 bg-gradient-to-br from-[#5b4b8a] to-[#2f1652] rounded-full flex items-center justify-center mb-6 shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">Early Feature Access</h3>
            <p class="text-[#2f1652]">
              Get early access to new platform features and updates before they're publicly released, allowing you to stay ahead of the curve and better promote our latest innovations.
            </p>
          </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto mt-8">
          <!-- Benefit 4: Training & Support -->
          <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-[#e2d2f4]/20">
            <div class="w-16 h-16 bg-[#5b4b8a] rounded-full flex items-center justify-center mb-6 shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">Training & Support</h3>
            <p class="text-[#2f1652]">
              Receive comprehensive training on our platform features and effective promotion strategies. Our dedicated ambassador support team is always available to answer questions and provide guidance.
            </p>
          </div>
          
          <!-- Benefit 5: Networking Opportunities -->
          <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-[#e2d2f4]/20">
            <div class="w-16 h-16 bg-[#a67c5b] rounded-full flex items-center justify-center mb-6 shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v2m10-2v2M7 20c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-[#1e0933] mb-3">Networking Opportunities</h3>
            <p class="text-[#2f1652]">
              Connect with other ambassadors and marketing professionals through exclusive events, webinars, and our private ambassador community. Expand your network and learn from successful peers.
            </p>
          </div>
        </div>
        
        <div class="text-center mt-12">
          <div class="inline-flex items-center px-4 py-2 rounded-full bg-[#5b4b8a]/10 text-[#5b4b8a] text-sm font-medium">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            Earnings potential varies based on referral quality and volume
          </div>
        </div>
      </div>
    </section>

    <!-- Requirements Section -->
    <section class="bg-white py-16 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-70"></div>
      <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-70"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Program Requirements</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            Who Can <span class="text-[#a67c5b]">Become An Ambassador</span>?
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            We're looking for passionate individuals who align with our values and have the right skills to represent our brand
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-4xl mx-auto">
          <div class="bg-gradient-to-br from-[#1e0933] to-[#2f1652] rounded-xl p-8 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-40 h-40 bg-[#5b4b8a] opacity-10 rounded-full -translate-y-20 translate-x-20"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-[#a67c5b] opacity-10 rounded-full translate-y-20 -translate-x-20"></div>
            
            <h3 class="text-2xl font-bold mb-6 relative z-10">Ideal Candidates Have:</h3>
            
            <div class="space-y-4 relative z-10">
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-[#a67c5b] mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-[#e2d2f4]">Experience in marketing, sales, or business development</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-[#a67c5b] mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-[#e2d2f4]">An established network of business professionals or entrepreneurs</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-[#a67c5b] mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-[#e2d2f4]">Strong social media presence or industry influence</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-[#a67c5b] mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-[#e2d2f4]">Excellent communication and presentation skills</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-[#a67c5b] mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-[#e2d2f4]">Genuine interest in marketing and business growth</span>
              </div>
            </div>
          </div>

          <div>
            <h3 class="text-2xl font-bold text-[#1e0933] mb-6">Commitment Requirements:</h3>
            
            <div class="space-y-6">
              <div>
                <h4 class="flex items-center text-lg font-semibold text-[#5b4b8a] mb-2">
                  <span class="w-6 h-6 rounded-full bg-[#5b4b8a] text-white flex items-center justify-center mr-2 text-sm font-bold">1</span>
                  Promotional Activities
                </h4>
                <p class="text-[#2f1652] pl-8">
                  Actively promote All-In-One Marketing through your channels, networks, and at relevant events at least 2-4 times per month.
                </p>
              </div>
              
              <div>
                <h4 class="flex items-center text-lg font-semibold text-[#5b4b8a] mb-2">
                  <span class="w-6 h-6 rounded-full bg-[#5b4b8a] text-white flex items-center justify-center mr-2 text-sm font-bold">2</span>
                  Content Creation
                </h4>
                <p class="text-[#2f1652] pl-8">
                  Create and share relevant content highlighting our platform's features and benefits. This can include social posts, blog articles, or videos.
                </p>
              </div>
              
              <div>
                <h4 class="flex items-center text-lg font-semibold text-[#5b4b8a] mb-2">
                  <span class="w-6 h-6 rounded-full bg-[#5b4b8a] text-white flex items-center justify-center mr-2 text-sm font-bold">3</span>
                  Program Participation
                </h4>
                <p class="text-[#2f1652] pl-8">
                  Participate in quarterly ambassador meetings, occasional training sessions, and provide feedback on your ambassador experience.
                </p>
              </div>
              
              <div>
                <h4 class="flex items-center text-lg font-semibold text-[#5b4b8a] mb-2">
                  <span class="w-6 h-6 rounded-full bg-[#5b4b8a] text-white flex items-center justify-center mr-2 text-sm font-bold">4</span>
                  Brand Representation
                </h4>
                <p class="text-[#2f1652] pl-8">
                  Always maintain professionalism and accurately represent our platform's capabilities when promoting it to potential customers.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Ambassador Testimonials -->
    <section class="bg-[#f8f5fc] py-16 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#e2d2f4] opacity-30 blur-3xl"></div>
      <div class="absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-[#c9b3e3] opacity-20 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Success Stories</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            Hear From Our <span class="text-[#a67c5b]">Ambassadors</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            Learn how our brand ambassadors have found success with our program
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
          <!-- Testimonial 1 -->
          <div class="bg-white rounded-xl p-8 shadow-lg border border-[#e2d2f4]/20 relative">
            <div class="absolute top-6 right-6">
              <svg class="w-12 h-12 text-[#5b4b8a] opacity-20" fill="currentColor" viewBox="0 0 32 32">
                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.896 3.456-8.352 9.12-8.352 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
              </svg>
            </div>
            
            <p class="text-[#2f1652] mb-8 italic">
              "Becoming a Brand Ambassador for All In One Marketing was the best decision for my consulting business. The commissions have added a significant revenue stream, and my clients love the platform!"
            </p>
            
            <div class="flex items-center">
              <img 
                src="/images/ambassador-1.jpg" 
                alt="Michael Roberts" 
                class="w-12 h-12 rounded-full object-cover mr-4"
              />
              <div>
                <h4 class="font-bold text-[#1e0933]">Michael Roberts</h4>
                <p class="text-sm text-[#5b4b8a]">Marketing Consultant</p>
              </div>
            </div>
          </div>
          
          <!-- Testimonial 2 -->
          <div class="bg-white rounded-xl p-8 shadow-lg border border-[#e2d2f4]/20 relative">
            <div class="absolute top-6 right-6">
              <svg class="w-12 h-12 text-[#5b4b8a] opacity-20" fill="currentColor" viewBox="0 0 32 32">
                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.896 3.456-8.352 9.12-8.352 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
              </svg>
            </div>
            
            <p class="text-[#2f1652] mb-8 italic">
              "The training and marketing materials provided are top-notch. I've been able to effectively promote the platform to my audience while building my own credibility as a marketing expert."
            </p>
            
            <div class="flex items-center">
              <img 
                src="/images/ambassador-2.jpg" 
                alt="Jessica Chen" 
                class="w-12 h-12 rounded-full object-cover mr-4"
              />
              <div>
                <h4 class="font-bold text-[#1e0933]">Jessica Chen</h4>
                <p class="text-sm text-[#5b4b8a]">Digital Marketing Influencer</p>
              </div>
            </div>
          </div>
          
          <!-- Testimonial 3 -->
          <div class="bg-white rounded-xl p-8 shadow-lg border border-[#e2d2f4]/20 relative">
            <div class="absolute top-6 right-6">
              <svg class="w-12 h-12 text-[#5b4b8a] opacity-20" fill="currentColor" viewBox="0 0 32 32">
                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.896 3.456-8.352 9.12-8.352 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
              </svg>
            </div>
            
            <p class="text-[#2f1652] mb-8 italic">
              "In my first six months as an ambassador, I've earned over $12,000 in commissions. The support team is always available to help with questions, and the community of other ambassadors is incredibly valuable."
            </p>
            
            <div class="flex items-center">
              <img 
                src="/images/ambassador-3.jpg" 
                alt="David Williams" 
                class="w-12 h-12 rounded-full object-cover mr-4"
              />
              <div>
                <h4 class="font-bold text-[#1e0933]">David Williams</h4>
                <p class="text-sm text-[#5b4b8a]">Business Growth Strategist</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Application Section -->
    <section id="apply" class="bg-gradient-to-br from-[#1e0933] via-[#2f1652] to-[#1e0933] text-white py-16 relative overflow-hidden">
      <!-- Background decorative elements -->
      <div class="absolute inset-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
          <defs>
            <pattern id="apply-grid" width="50" height="50" patternUnits="userSpaceOnUse">
              <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#5b4b8a" stroke-width="1"/>
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#apply-grid)" />
        </svg>
      </div>
      
      <!-- Accent Circles -->
      <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-[#5b4b8a] opacity-20 blur-3xl"></div>
      <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-[#a67c5b] opacity-10 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto">
          <div class="text-center mb-12">
            <div class="inline-block mb-4">
              <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
              <span class="text-[#c9b3e3] uppercase font-bold tracking-wider text-sm">Apply Now</span>
              <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
              Ready to <span class="text-[#c9b3e3]">Become an Ambassador</span>?
            </h2>
            <p class="text-xl text-[#e2d2f4] max-w-3xl mx-auto mb-8">
              Apply today to join our program and start earning while representing a platform that truly helps businesses grow
            </p>
          </div>

          <div class="bg-white/10 backdrop-blur-sm rounded-xl p-8 border border-white/10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
              <div>
                <h3 class="text-2xl font-bold text-white mb-6">Application Process</h3>
                
                <div class="space-y-6">
                  <div class="flex">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#a67c5b] flex items-center justify-center mr-4">
                      <span class="font-bold">1</span>
                    </div>
                    <div>
                      <h4 class="text-lg font-semibold text-white mb-1">Submit Application</h4>
                      <p class="text-[#e2d2f4]">Fill out the application form with your information and qualifications.</p>
                    </div>
                  </div>
                  
                  <div class="flex">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#a67c5b] flex items-center justify-center mr-4">
                      <span class="font-bold">2</span>
                    </div>
                    <div>
                      <h4 class="text-lg font-semibold text-white mb-1">Review Process</h4>
                      <p class="text-[#e2d2f4]">Our team will review your application and reach out for an interview if you're a good fit.</p>
                    </div>
                  </div>
                  
                  <div class="flex">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#a67c5b] flex items-center justify-center mr-4">
                      <span class="font-bold">3</span>
                    </div>
                    <div>
                      <h4 class="text-lg font-semibold text-white mb-1">Onboarding</h4>
                      <p class="text-[#e2d2f4]">Complete our ambassador training program and receive your promotional materials.</p>
                    </div>
                  </div>
                  
                  <div class="flex">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#a67c5b] flex items-center justify-center mr-4">
                      <span class="font-bold">4</span>
                    </div>
                    <div>
                      <h4 class="text-lg font-semibold text-white mb-1">Start Earning</h4>
                      <p class="text-[#e2d2f4]">Begin promoting the platform and earning commissions on successful referrals.</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div>
                <a 
                  href="/ambassador-application" 
                  class="block w-full py-4 px-6 bg-[#a67c5b] hover:bg-[#8e6849] text-white text-center font-bold text-lg rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg mb-6"
                >
                  Apply to Become an Ambassador
                </a>
                
                <div class="bg-white/5 p-6 rounded-lg">
                  <h4 class="text-lg font-semibold text-white mb-4">Have Questions?</h4>
                  <p class="text-[#e2d2f4] mb-4">
                    If you have any questions about the program before applying, please reach out to our team.
                  </p>
                  <div class="space-y-2">
                    <div class="flex items-center">
                      <svg class="w-5 h-5 text-[#c9b3e3] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                      </svg>
                      <a href="mailto:ambassadors@allinonemarketing.com" class="text-[#c9b3e3] hover:text-white">ambassadors@allinonemarketing.com</a>
                    </div>
                    <div class="flex items-center">
                      <svg class="w-5 h-5 text-[#c9b3e3] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                      </svg>
                      <span>Live chat available on our website</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MarketingLayout>
</template> 