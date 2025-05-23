<template>
  <div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <NavBar :navItems="navItems" />
    
    <!-- Page Content -->
    <main class="flex-grow">
      <slot></slot>
    </main>
    
    <!-- Footer -->
    <footer class="bg-gradient-to-br from-[#1e0933] via-[#2f1652] to-[#1e0933] text-white relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute inset-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
          <defs>
            <pattern id="footer-grid" width="50" height="50" patternUnits="userSpaceOnUse">
              <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#5b4b8a" stroke-width="1"/>
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#footer-grid)" />
        </svg>
      </div>
      
      <!-- Accent Circles -->
      <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#5b4b8a] opacity-20 blur-3xl"></div>
      <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-[#a67c5b] opacity-10 blur-3xl"></div>
      
      <div class="container mx-auto px-4 py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
          <!-- Logo and About -->
          <div class="space-y-6">
            <div class="flex items-center">
              <img src="/images/logo-white.png" alt="All In One Marketing" class="h-10 w-auto">
            </div>
            <p class="text-[#e2d2f4] leading-relaxed">
              The all-in-one marketing platform that combines CRM, email marketing, SMS, and AI automation.
            </p>
            <div class="flex space-x-4">
              <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-[#c9b3e3] hover:text-white hover:bg-[#a67c5b] transition-colors duration-300">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                </svg>
              </a>
              <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-[#c9b3e3] hover:text-white hover:bg-[#a67c5b] transition-colors duration-300">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.054 10.054 0 01-3.127 1.184 4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                </svg>
              </a>
              <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-[#c9b3e3] hover:text-white hover:bg-[#a67c5b] transition-colors duration-300">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm-2 16h-2v-6h2v6zm-1-6.891a1.094 1.094 0 100-2.188 1.094 1.094 0 000 2.188zM18 16h-2v-3.15c0-.866-.275-1.461-1.211-1.461-.623 0-.975.322-1.136.637-.059.153-.074.367-.074.579V16h-2v-6h2v.894c.327-.446.81-.894 1.969-.894 1.438 0 2.452.895 2.452 2.822V16z" />
                </svg>
              </a>
            </div>
          </div>
          
          <!-- Quick Links -->
          <div class="space-y-6">
            <div>
              <h3 class="text-xl font-semibold mb-4 text-white inline-block relative">
                Quick Links
                <div class="absolute -bottom-1 left-0 h-0.5 w-12 bg-[#a67c5b]"></div>
              </h3>
            </div>
            <ul class="space-y-3">
              <li>
                <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 flex items-center group">
                  <svg class="w-4 h-4 mr-2 text-[#a67c5b] group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  About Us
                </a>
              </li>
              <li>
                <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 flex items-center group">
                  <svg class="w-4 h-4 mr-2 text-[#a67c5b] group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  Services
                </a>
              </li>
              <li>
                <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 flex items-center group">
                  <svg class="w-4 h-4 mr-2 text-[#a67c5b] group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  Pricing
                </a>
              </li>
              <li>
                <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 flex items-center group">
                  <svg class="w-4 h-4 mr-2 text-[#a67c5b] group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  Contact
                </a>
              </li>
            </ul>
          </div>
          
          <!-- Services -->
          <div class="space-y-6">
            <div>
              <h3 class="text-xl font-semibold mb-4 text-white inline-block relative">
                Services
                <div class="absolute -bottom-1 left-0 h-0.5 w-12 bg-[#a67c5b]"></div>
              </h3>
            </div>
            <ul class="space-y-3">
              <li>
                <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 flex items-center group">
                  <svg class="w-4 h-4 mr-2 text-[#a67c5b] group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  CRM Software
                </a>
              </li>
              <li>
                <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 flex items-center group">
                  <svg class="w-4 h-4 mr-2 text-[#a67c5b] group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  Email Marketing
                </a>
              </li>
              <li>
                <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 flex items-center group">
                  <svg class="w-4 h-4 mr-2 text-[#a67c5b] group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  SMS Marketing
                </a>
              </li>
              <li>
                <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 flex items-center group">
                  <svg class="w-4 h-4 mr-2 text-[#a67c5b] group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  AI Automation
                </a>
              </li>
            </ul>
          </div>
          
          <!-- Contact -->
          <div class="space-y-6">
            <div>
              <h3 class="text-xl font-semibold mb-4 text-white inline-block relative">
                Contact Us
                <div class="absolute -bottom-1 left-0 h-0.5 w-12 bg-[#a67c5b]"></div>
              </h3>
            </div>
            <ul class="space-y-4">
              <li class="flex items-start">
                <div class="w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 mr-3">
                  <svg class="h-5 w-5 text-[#a67c5b]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <span class="text-[#e2d2f4] pt-2">support@allinonemarketingapp.com</span>
              </li>
              <li class="flex items-start">
                <div class="w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 mr-3">
                  <svg class="h-5 w-5 text-[#a67c5b]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
                <span class="text-[#e2d2f4] pt-2">(555) 123-4567</span>
              </li>
              <li class="flex items-start">
                <div class="w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 mr-3">
                  <svg class="h-5 w-5 text-[#a67c5b]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div class="text-[#e2d2f4] pt-1">
                  123 Marketing St, Suite 100<br>
                  San Francisco, CA 94103
                </div>
              </li>
            </ul>
          </div>
        </div>
        
        <!-- Newsletter Sign-up (New Addition) -->
        <div class="mt-16 max-w-xl mx-auto">
          <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
            <h3 class="text-xl font-semibold mb-3 text-white text-center">Get Marketing Insights</h3>
            <p class="text-[#c9b3e3] mb-4 text-center">Subscribe to our newsletter for expert tips and strategies</p>
            <form class="flex flex-col sm:flex-row gap-3">
              <input 
                type="email" 
                placeholder="Your email address" 
                class="flex-1 px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-[#e2d2f4] focus:outline-none focus:ring-2 focus:ring-[#a67c5b] focus:border-transparent"
              >
              <button 
                type="submit"
                class="px-6 py-3 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-semibold rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl whitespace-nowrap"
              >
                Subscribe
              </button>
            </form>
          </div>
        </div>
        
        <div class="border-t border-white/10 mt-16 pt-8">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-[#c9b3e3] text-sm">
              &copy; {{ new Date().getFullYear() }} All In One Marketing. All rights reserved.
            </p>
            <div class="flex flex-wrap justify-center gap-x-6 gap-y-2 mt-4 md:mt-0">
              <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 text-sm">Terms of Service</a>
              <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 text-sm">Privacy Policy</a>
              <a href="#" class="text-[#c9b3e3] hover:text-white transition-colors duration-200 text-sm">Cookie Policy</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import NavBar from '@/Components/Marketing/NavBar.vue';

// Define the active navigation item
const navItems = ref([
  { name: 'About', route: route('about'), active: false },
  { name: 'Brand Ambassador', route: route('brand-ambassador'), active: false },
  { name: 'Reviews', route: route('reviews'), active: false },
  { name: 'Services', route: route('services'), active: false },
  { name: 'Get In Touch', route: route('contact'), active: false }
]);
</script>

<style scoped>
.bg-navy-900 {
  background-color: #0a1933;
}

.text-navy-900 {
  color: #0a1933;
}

.text-orange-500 {
  color: #f97316;
}

.hover\:text-orange-500:hover {
  color: #f97316;
}
</style>