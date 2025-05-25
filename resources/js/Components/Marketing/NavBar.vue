<template>
    <nav class="bg-white shadow">
      <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between h-20">
          <div class="flex">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
              <Link :href="route('home')" class="flex items-center">
                <img class="h-12 w-auto" src="/images/logo.png" alt="PB&J Solutions Logo">
                <span class="ml-3 text-purple-900 font-bold text-xl hidden md:inline-block">PB&J Solutions</span>
              </Link>
            </div>
          </div>
            
          <!-- Navigation Links -->
          <div class="hidden md:flex md:items-center md:space-x-8">
            <Link 
              v-for="(item, index) in navItems" 
              :key="index" 
              :href="item.route" 
              class="text-purple-900 hover:text-purple-600 px-3 py-2 font-medium transition duration-150"
              :class="{'text-purple-600 font-semibold': item.active}"
            >
              {{ item.name }}
            </Link>
          </div>
            
          <!-- CTA Button -->
          <div class="flex items-center space-x-2">
            <!-- Show these buttons only for guests -->
            <template v-if="!$page.props.auth.user">
              <Link 
                :href="route('login')" 
                class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-base font-medium rounded-md text-purple-900 bg-white hover:bg-gray-100 transition duration-150"
              >
                Login
              </Link>
              <Link 
                :href="route('pbj.solutions')" 
                class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-base font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 transition duration-150"
              >
                Sign Up Now
              </Link>
            </template>
            
            <!-- Show these options for authenticated users -->
            <template v-else>
              <Link 
                :href="$page.props.auth.user.is_admin ? route('admin.dashboard') : route('user.dashboard')" 
                class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-base font-medium rounded-md text-purple-900 bg-white hover:bg-gray-100 transition duration-150"
              >
                Dashboard
              </Link>
              <Link 
                :href="route('profile.edit')" 
                class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-base font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 transition duration-150"
              >
                My Profile
              </Link>
              <button
                @click="logout"
                class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-base font-medium rounded-md text-gray-600 hover:text-gray-800 transition duration-150"
              >
                Logout
              </button>
            </template>
          </div>
            
          <!-- Mobile menu button -->
          <div class="flex md:hidden items-center">
            <button 
              type="button"
              @click="mobileMenuOpen = !mobileMenuOpen"
              class="inline-flex items-center justify-center p-2 rounded-md text-purple-900 hover:text-purple-600 hover:bg-gray-100"
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
            :class="item.active ? 'text-purple-600 bg-gray-50' : 'text-purple-900 hover:bg-gray-50 hover:text-purple-600'"
          >
            {{ item.name }}
          </Link>
          
          <!-- Mobile menu guest links -->
          <template v-if="!$page.props.auth.user">
            <Link 
              :href="route('login')" 
              class="block px-3 py-2 rounded-md text-base font-medium text-purple-900 hover:bg-gray-50 hover:text-purple-600"
            >
              Login
            </Link>
            <Link 
              :href="route('pbj.solutions')" 
              class="block px-3 py-2 rounded-md text-base font-medium text-white bg-purple-600 hover:bg-purple-700 mt-2"
            >
              Sign Up Now
            </Link>
          </template>
          
          <!-- Mobile menu authenticated user links -->
          <template v-else>
            <Link 
              :href="$page.props.auth.user.is_admin ? route('admin.dashboard') : route('user.dashboard')" 
              class="block px-3 py-2 rounded-md text-base font-medium text-purple-900 hover:bg-gray-50 hover:text-purple-600"
            >
              Dashboard
            </Link>
            <Link 
              :href="route('profile.edit')" 
              class="block px-3 py-2 rounded-md text-base font-medium text-white bg-purple-600 hover:bg-purple-700 mt-2"
            >
              My Profile
            </Link>
            <button @click="logout" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-purple-900 hover:bg-gray-50 hover:text-purple-600 mt-2">
              Logout
            </button>
          </template>
        </div>
      </div>
    </nav>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { Link, usePage, router } from '@inertiajs/vue3';
  
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
  
  // Add logout functionality
  const logout = () => {
    router.post(route('logout'));
  };
  </script>
  
  <style scoped>
  .text-purple-600 {
    color: #7c3aed;
  }
  
  .text-purple-900 {
    color: #4c1d95;
  }
  
  .bg-purple-600 {
    background-color: #7c3aed;
  }
  
  .bg-purple-700 {
    background-color: #6d28d9;
  }
  
  .hover\:text-purple-600:hover {
    color: #7c3aed;
  }
  
  .hover\:bg-purple-700:hover {
    background-color: #6d28d9;
  }
  </style>