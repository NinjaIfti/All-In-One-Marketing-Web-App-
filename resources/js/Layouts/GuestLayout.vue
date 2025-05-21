<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Top navbar -->
    <div class="bg-white shadow">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
              <Link href="/" class="flex items-center">
                <img class="h-8 w-auto" src="/images/logo.png" alt="All In One Marketing Logo">
                <span class="ml-3 text-gray-900 font-bold text-lg">All In One Marketing</span>
              </Link>
            </div>
          </div>
          
          <!-- Navigation Links -->
          <div class="hidden md:flex md:items-center md:space-x-4">
            <Link href="/" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
              Home
            </Link>
            <Link href="/about" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
              About
            </Link>
            <Link href="/services" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
              Services
            </Link>
            <Link href="/contact" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
              Contact
            </Link>
            
            <div class="ml-4 flex items-center">
              <Link href="/login" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                Login
              </Link>
              <Link 
                href="/register" 
                class="ml-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
              >
                Sign Up
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <main>
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <slot />
      </div>
    </main>
  </div>
</template> 