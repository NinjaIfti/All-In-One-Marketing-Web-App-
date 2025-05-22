<template>
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <!-- Video Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
          <div class="space-y-6">
            <div class="aspect-video bg-gray-900 rounded-xl overflow-hidden shadow-2xl relative group cursor-pointer" @click="playVideo">
              <img 
                src="/images/video-thumbnail.jpg" 
                alt="Marketing Software Demo" 
                class="w-full h-full object-cover"
              >
              <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center group-hover:bg-opacity-20 transition-all duration-300">
                <div class="w-20 h-20 bg-white bg-opacity-90 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                  <svg class="w-8 h-8 text-gray-800 ml-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          
          <div class="space-y-6">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
              Software & Marketing Services by a Shark's team with 
              <span class="text-orange-500 font-black">$6 Billion in Sales</span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed">
              Our all-in-one platform <strong>replaces CRMs like HubSpot, Salesforce, and Pipedrive… email services like Aweber and SMS services</strong> saving you time, money and headaches
            </p>
          </div>
        </div>
  
        <!-- Customer Reviews Section -->
        <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-8 lg:p-12 text-white">
          <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
              Our Customers Love Us! All In One Marketing Is A Game Changer!
            </h2>
            <div class="flex justify-center items-center space-x-2 mb-6">
              <span class="text-xl font-semibold">Hundreds of</span>
              <div class="flex">
                <StarRating :rating="5" />
              </div>
              <span class="text-xl font-semibold">Reviews</span>
            </div>
            
            <!-- Awards -->
            <div class="flex flex-wrap justify-center items-center gap-6 opacity-80">
              <img src="/images/awards/best-software-2024.png" alt="Best Software 2024" class="h-12">
              <img src="/images/awards/top-rated-crm.png" alt="Top Rated CRM" class="h-12">
              <img src="/images/awards/customer-choice.png" alt="Customer Choice" class="h-12">
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
  
          <div class="text-center mt-12">
            <a 
              href="/reviews" 
              class="inline-flex items-center px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-lg transition-colors duration-200"
            >
              See More Customer Reviews
              <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </a>
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