<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="min-h-screen flex flex-col bg-gray-50">
    <!-- Main Content - Removed header to match the landing page design -->
    <main class="flex-grow flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
      <slot></slot>
    </main>
    
    <!-- Footer -->
    <footer class="py-4 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center">
          <div class="flex justify-center space-x-6 mb-4">
            <a href="#" class="text-gray-400 hover:text-purple-500">
              <span class="sr-only">Facebook</span>
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-purple-500">
              <span class="sr-only">Twitter</span>
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.054 10.054 0 01-3.127 1.184 4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-purple-500">
              <span class="sr-only">LinkedIn</span>
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm-2 16h-2v-6h2v6zm-1-6.891a1.094 1.094 0 100-2.188 1.094 1.094 0 000 2.188zM18 16h-2v-3.15c0-.866-.275-1.461-1.211-1.461-.623 0-.975.322-1.136.637-.059.153-.074.367-.074.579V16h-2v-6h2v.894c.327-.446.81-.894 1.969-.894 1.438 0 2.452.895 2.452 2.822V16z" />
              </svg>
            </a>
          </div>
          
          <div class="text-gray-500 text-xs">
            <p>&copy; {{ new Date().getFullYear() }} PB&J Solutions. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<style scoped>
.text-purple-500 {
  color: #8b5cf6;
}

.hover\:text-purple-500:hover {
  color: #8b5cf6;
}
</style>