<template>
    <nav class="bg-white shadow">
      <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between h-20">
          <div class="flex">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
              <Link :href="route('home')" class="flex items-center">
                <img class="h-12 w-auto" src="/images/logo.png" alt="All In One Marketing Logo">
                <span class="ml-3 text-navy-900 font-bold text-xl hidden md:inline-block">All In One Marketing</span>
              </Link>
            </div>
          </div>
            
          <!-- Navigation Links -->
          <div class="hidden md:flex md:items-center md:space-x-8">
            <Link 
              v-for="(item, index) in navItems" 
              :key="index" 
              :href="item.route" 
              class="text-navy-900 hover:text-orange-500 px-3 py-2 font-medium transition duration-150"
              :class="{'text-orange-500 font-semibold': item.active}"
            >
              {{ item.name }}
            </Link>
          </div>
            
          <!-- CTA Button -->
          <div class="flex items-center space-x-2">
            <Link 
              :href="route('login')" 
              class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-base font-medium rounded-md text-navy-900 bg-white hover:bg-gray-100 transition duration-150"
            >
              Login
            </Link>
            <Link 
              :href="route('custom.register')" 
              class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-base font-medium rounded-md text-white bg-orange-500 hover:bg-orange-600 transition duration-150"
            >
              Sign Up Now
            </Link>
          </div>
            
          <!-- Mobile menu button -->
          <div class="flex md:hidden items-center">
            <button 
              type="button"
              @click="mobileMenuOpen = !mobileMenuOpen"
              class="inline-flex items-center justify-center p-2 rounded-md text-navy-900 hover:text-orange-500 hover:bg-gray-100"
            >
              <svg 
                class="block h-6 w-6" 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke="currentColor" 
                aria-hidden="true"
              >
                <path 
                  v-if="!mobileMenuOpen" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  d="M4 6h16M4 12h16M4 18h16" 
                />
                <path 
                  v-else 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  d="M6 18L18 6M6 6l12 12" 
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
        
      <!-- Mobile menu -->
      <div class="md:hidden" v-show="mobileMenuOpen">
        <div class="px-2 pt-2 pb-3 space-y-1">
          <Link 
            v-for="(item, index) in navItems" 
            :key="index" 
            :href="item.route" 
            class="block px-3 py-2 rounded-md text-base font-medium"
            :class="item.active ? 'text-orange-500 bg-gray-50' : 'text-navy-900 hover:bg-gray-50 hover:text-orange-500'"
          >
            {{ item.name }}
          </Link>
          <Link 
            :href="route('login')" 
            class="block px-3 py-2 rounded-md text-base font-medium text-navy-900 hover:bg-gray-50 hover:text-orange-500"
          >
            Login
          </Link>
          <Link 
            :href="route('custom.register')" 
            class="block px-3 py-2 rounded-md text-base font-medium text-white bg-orange-500 hover:bg-orange-600 mt-2"
          >
            Sign Up Now
          </Link>
        </div>
      </div>
    </nav>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { Link } from '@inertiajs/vue3';
  
  const mobileMenuOpen = ref(false);
  
  const props = defineProps({
    navItems: {
      type: Array,
      default: () => [
        { name: 'About', route: route('about'), active: false },
        { name: 'Brand Ambassador', route: route('brand-ambassador'), active: false },
        { name: 'Reviews', route: route('reviews'), active: false },
        { name: 'Services', route: route('services'), active: false },
        { name: 'Get In Touch', route: route('contact'), active: false }
      ]
    }
  });
  </script>
  
  <style scoped>
  .text-navy-900 {
    color: #0a1933;
  }
  
  .text-orange-500 {
    color: #f97316;
  }
  
  .bg-orange-500 {
    background-color: #f97316;
  }
  
  .bg-orange-600 {
    background-color: #ea580c;
  }
  
  .hover\:text-orange-500:hover {
    color: #f97316;
  }
  
  .hover\:bg-orange-600:hover {
    background-color: #ea580c;
  }
  </style>