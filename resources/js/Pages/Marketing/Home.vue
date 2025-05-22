<script setup>
import { Head } from '@inertiajs/vue3';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import HeroSection from '@/Components/Home/HeroSection.vue';
import AsSeenOnSection from '@/Components/Home/AsSeenOnSection.vue';
import VideoTestimonialSection from '@/Components/Home/VideoTestimonialSection.vue';
import SoftwareReplacementSection from '@/Components/Home/SoftwareReplacementSection.vue';
import SupportSection from '@/Components/Home/SupportSection.vue';
import AutomationSection from '@/Components/Home/AutomationSection.vue';
import FeaturesSection from '@/Components/Home/FeaturesSection.vue';
import ServicesSection from '@/Components/Home/ServicesSection.vue';
import StickyBottomCTA from '@/Components/Home/StickyBottomCTA.vue';
</script>

<template>
  <Head title="All In One Marketing - Replace All Software In 1 Place" />
  
  <MarketingLayout>
    <!-- Main Hero Section -->
    <HeroSection />
    
    <!-- As Seen On Section -->
    <AsSeenOnSection />
    
    <!-- Video & Testimonials Section -->
    <VideoTestimonialSection />
    
    <!-- Software Replacement Section -->
    <SoftwareReplacementSection />
    
    <!-- 24/7 Support Section -->
    <SupportSection />
    
    <!-- Automation Features -->
    <AutomationSection />
    
    <!-- All Features Grid -->
    <FeaturesSection />
    
    <!-- Additional Services -->
    <ServicesSection />
    
    <!-- Sticky Bottom CTA -->
    <StickyBottomCTA />
  </MarketingLayout>
</template>