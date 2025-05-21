<template>
  <div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <NavBar :navItems="navItems" />
    
    <!-- Page Content -->
    <main class="flex-grow">
      <slot></slot>
    </main>
    
    <!-- Footer -->
    <footer class="bg-navy-900 text-white">
      <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <!-- Logo and About -->
          <div class="col-span-1 md:col-span-1">
            <div class="flex items-center mb-4">
              <img src="/images/logo-white.png" alt="All In One Marketing" class="h-10 w-auto">
            </div>
            <p class="text-gray-300 mb-4">
              The all-in-one marketing platform that combines CRM, email marketing, SMS, and AI automation.
            </p>
            <div class="flex space-x-4">
              <a href="#" class="text-gray-300 hover:text-orange-500">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                </svg>
              </a>
              <a href="#" class="text-gray-300 hover:text-orange-500">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.054 10.054 0 01-3.127 1.184 4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                </svg>
              </a>
              <a href="#" class="text-gray-300 hover:text-orange-500">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm-2 16h-2v-6h2v6zm-1-6.891a1.094 1.094 0 100-2.188 1.094 1.094 0 000 2.188zM18 16h-2v-3.15c0-.866-.275-1.461-1.211-1.461-.623 0-.975.322-1.136.637-.059.153-.074.367-.074.579V16h-2v-6h2v.894c.327-.446.81-.894 1.969-.894 1.438 0 2.452.895 2.452 2.822V16z" />
                </svg>
              </a>
            </div>
          </div>
          
          <!-- Quick Links -->
          <div class="col-span-1">
            <h3 class="text-lg font-semibold mb-4 text-white">Quick Links</h3>
            <ul class="space-y-2">
              <li>
                <a href="#" class="text-gray-300 hover:text-orange-500">About Us</a>
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-orange-500">Services</a>
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-orange-500">Pricing</a>
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-orange-500">Contact</a>
              </li>
            </ul>
          </div>
          
          <!-- Services -->
          <div class="col-span-1">
            <h3 class="text-lg font-semibold mb-4 text-white">Services</h3>
            <ul class="space-y-2">
              <li>
                <a href="#" class="text-gray-300 hover:text-orange-500">CRM Software</a>
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-orange-500">Email Marketing</a>
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-orange-500">SMS Marketing</a>
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-orange-500">AI Automation</a>
              </li>
            </ul>
          </div>
          
          <!-- Contact -->
          <div class="col-span-1">
            <h3 class="text-lg font-semibold mb-4 text-white">Contact Us</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <svg class="h-6 w-6 text-orange-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="text-gray-300">support@allinonemarketingapp.com</span>
              </li>
              <li class="flex items-start">
                <svg class="h-6 w-6 text-orange-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span class="text-gray-300">(555) 123-4567</span>
              </li>
              <li class="flex items-start">
                <svg class="h-6 w-6 text-orange-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="text-gray-300">123 Marketing St, Suite 100<br>San Francisco, CA 94103</span>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="border-t border-gray-800 mt-12 pt-8">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm">
              &copy; {{ new Date().getFullYear() }} All In One Marketing. All rights reserved.
            </p>
            <div class="flex space-x-6 mt-4 md:mt-0">
              <a href="#" class="text-gray-400 hover:text-orange-500 text-sm">Terms of Service</a>
              <a href="#" class="text-gray-400 hover:text-orange-500 text-sm">Privacy Policy</a>
              <a href="#" class="text-gray-400 hover:text-orange-500 text-sm">Cookie Policy</a>
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