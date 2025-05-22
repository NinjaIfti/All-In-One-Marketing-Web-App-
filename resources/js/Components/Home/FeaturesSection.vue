<template>
    <section class="bg-gradient-to-br from-slate-800 to-slate-900 py-16">
      <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
            Plus, get Access To <span class="text-orange-400 font-black">All Of These Features</span>
          </h2>
        </div>
  
        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
          <FeatureCard
            title="Website Builder"
            description="Drag and drop website builder with premade templates."
            image="/images/features/website-builder.png"
            icon="🌐"
          />
          
          <FeatureCard
            title="Form & Survey Builder"
            description="Easily build forms and surveys to collect new leads and gather customer insight."
            image="/images/features/form-builder.png"
            icon="📝"
          />
          
          <FeatureCard
            title="Funnel Builder"
            description="Create sequences that take leads through the necessary steps to convert them into a prospect."
            image="/images/features/funnel-builder.png"
            icon="🔄"
          />
          
          <FeatureCard
            title="Sales Pipelines"
            description="View and manage all of your leads and customers from one convenient location."
            image="/images/features/sales-pipeline.png"
            icon="📊"
          />
          
          <FeatureCard
            title="Reporting & Analytics"
            description="See valuable graphic representations of performance as well as detailed source reporting"
            image="/images/features/analytics.png"
            icon="📈"
          />
          
          <FeatureCard
            title="Facebook/Google Ads"
            description="Integrate your Facebook and Google ads directly with the software so leads flow in automatically."
            image="/images/features/ads-integration.png"
            icon="📱"
          />
          
          <FeatureCard
            title="Email & SMS Builder"
            description="Easy-to-use drag & drop builders for creating beautiful emails and SMS campaigns."
            image="/images/features/email-builder.png"
            icon="✉️"
          />
          
          <FeatureCard
            title="AI Automation"
            description="Create intelligent workflows that respond to customer behavior automatically."
            image="/images/features/ai-automation.png"
            icon="🤖"
          />
          
          <FeatureCard
            title="Calendar & Booking"
            description="Allow customers to book appointments directly with automated confirmation systems."
            image="/images/features/calendar.png"
            icon="📅"
          />
        </div>
  
        <!-- Call to Action -->
        <div class="text-center">
          <a 
            href="#signup" 
            class="inline-flex items-center px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold text-lg rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
          >
            Sign Up Now
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import FeatureCard from '@/Components/Home/FeatureCard.vue';
  </script>