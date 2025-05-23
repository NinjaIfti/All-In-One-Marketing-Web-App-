<template>
    <section class="bg-white py-20 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-80"></div>
      <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-[#f8f5fc] opacity-80"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <!-- Video Section -->
        <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
            <div class="space-y-6">
              <div class="aspect-video bg-[#1e0933] rounded-xl overflow-hidden shadow-2xl relative group cursor-pointer" @click="playVideo">
                <img 
                  src="/images/video-thumbnail.jpg" 
                  alt="Marketing Software Demo" 
                  class="w-full h-full object-cover"
                >
                <div class="absolute inset-0 bg-gradient-to-br from-[#1e0933]/50 to-transparent flex items-center justify-center group-hover:from-[#1e0933]/30 transition-all duration-300">
                  <div class="w-20 h-20 bg-white bg-opacity-90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-[#5b4b8a] ml-1" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                  </div>
                </div>
              </div>
              
              <!-- Video badges -->
              <div class="flex flex-wrap justify-center gap-4">
                <div class="bg-[#f8f5fc] px-4 py-2 rounded-full flex items-center space-x-2">
                  <svg class="w-5 h-5 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="text-sm font-medium text-[#2f1652]">3:45 minute demo</span>
                </div>
                
                <div class="bg-[#f8f5fc] px-4 py-2 rounded-full flex items-center space-x-2">
                  <svg class="w-5 h-5 text-[#a67c5b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                  </svg>
                  <span class="text-sm font-medium text-[#2f1652]">HD quality</span>
                </div>
              </div>
            </div>
            
            <div class="space-y-6">
              <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#f8f5fc] text-[#5b4b8a] text-sm font-medium mb-2">
                <span class="w-2 h-2 rounded-full bg-[#a67c5b] mr-2"></span>
                Expert Marketing Solutions
              </div>
              
              <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] leading-tight">
                Software & Marketing Services by a Shark's team with 
                <span class="text-[#a67c5b] font-black">$6 Billion in Sales</span>
              </h2>
              
              <div class="h-1 w-24 bg-[#c9b3e3]"></div>
              
              <p class="text-lg text-[#2f1652] leading-relaxed">
                Our all-in-one platform <strong>replaces CRMs like HubSpot, Salesforce, and Pipedrive… email services like Aweber and SMS services</strong> saving you time, money and headaches
              </p>
              
              <!-- Feature list -->
              <div class="space-y-3 mt-6">
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">One central platform for all your marketing needs</span>
                </div>
                
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Save thousands annually on multiple subscriptions</span>
                </div>
                
                <div class="flex items-start space-x-3">
                  <svg class="w-5 h-5 text-[#a67c5b] mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-[#2f1652]">Get more features at a fraction of the cost</span>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Customer Reviews Section -->
          <div class="bg-gradient-to-br from-[#1e0933] to-[#2f1652] rounded-2xl p-8 lg:p-12 text-white shadow-xl relative overflow-hidden">
            <!-- Decorative background elements -->
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
            
            <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-[#5b4b8a] opacity-20 blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-[#a67c5b] opacity-10 blur-3xl"></div>
            
            <div class="relative z-10">
              <div class="text-center mb-16">
                <div class="inline-block mb-4">
                  <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
                  <span class="text-[#c9b3e3] uppercase font-bold tracking-wider text-sm">Customer Testimonials</span>
                  <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
                </div>
                
                <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                  Our Customers Love Us! All In One Marketing Is A <span class="text-[#c9b3e3]">Game Changer!</span>
                </h2>
                
                <div class="flex justify-center items-center space-x-3 mb-8">
                  <span class="text-xl font-semibold text-[#e2d2f4]">Hundreds of</span>
                  <div class="flex">
                    <StarRating :rating="5" />
                  </div>
                  <span class="text-xl font-semibold text-[#e2d2f4]">Reviews</span>
                </div>
                
                <!-- Awards -->
                <div class="flex flex-wrap justify-center items-center gap-8 mb-6">
                  <div class="bg-white/10 backdrop-blur-sm px-6 py-3 rounded-lg border border-white/10">
                    <img src="/images/awards/best-software-2024.png" alt="Best Software 2024" class="h-12">
                  </div>
                  <div class="bg-white/10 backdrop-blur-sm px-6 py-3 rounded-lg border border-white/10">
                    <img src="/images/awards/top-rated-crm.png" alt="Top Rated CRM" class="h-12">
                  </div>
                  <div class="bg-white/10 backdrop-blur-sm px-6 py-3 rounded-lg border border-white/10">
                    <img src="/images/awards/customer-choice.png" alt="Customer Choice" class="h-12">
                  </div>
                </div>
              </div>
      
              <!-- Testimonial Grid -->
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <TestimonialCard
                  v-for="testimonial in testimonials"
                  :key="testimonial.id"
                  :testimonial="testimonial"
                />
              </div>
      
              <div class="text-center mt-16">
                <a 
                  href="/reviews" 
                  class="inline-flex items-center px-8 py-3 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-semibold rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl"
                >
                  See More Customer Reviews
                  <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                </a>
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
  import TestimonialCard from '@/Components/Home/TestimonialCard.vue';
  
  const testimonials = ref([
    {
      id: 1,
      name: "Manual",
      title: "Marketing Agency Owner",
      quote: "Thousands Per Year As A Marketing Agency Owner",
      subtitle: "Manual Is Saving...",
      rating: 5,
      videoThumbnail: "/images/testimonials/manual-thumb.jpg"
    },
    {
      id: 2,
      name: "Presley",
      title: "Business Owner",
      quote: "Blown Away By Endless CRM Features & Value",
      subtitle: "Presley Is...",
      rating: 5,
      videoThumbnail: "/images/testimonials/presley-thumb.jpg"
    },
    {
      id: 3,
      name: "Ed",
      title: "Digital Marketer",
      quote: "Managing All Digital Marketing In One Software",
      subtitle: "Ed loves...",
      rating: 5,
      videoThumbnail: "/images/testimonials/ed-thumb.jpg"
    },
    {
      id: 4,
      name: "Alfred",
      title: "Entrepreneur",
      quote: "Hundreds Of Hours Using Automated Workflows",
      subtitle: "Alfred Is Saving...",
      rating: 5,
      videoThumbnail: "/images/testimonials/alfred-thumb.jpg"
    }
  ]);
  
  const playVideo = () => {
    // Add video modal or redirect logic here
    console.log('Play main demo video');
  };
  </script>