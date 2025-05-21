<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const navigation = [
  { name: 'Dashboard', href: '/admin/dashboard', icon: 'HomeIcon' },
  { name: 'Contacts', href: '/admin/contacts', icon: 'UsersIcon' },
  { name: 'Campaigns', href: '/admin/campaigns', icon: 'ChartBarIcon' },
  { name: 'Automations', href: '/admin/automations', icon: 'CogIcon' },
  { name: 'Website', href: '/admin/website', icon: 'GlobeIcon' },
  { name: 'Analytics', href: '/admin/analytics', icon: 'ChartPieIcon' },
  { name: 'Settings', href: '/admin/settings', icon: 'AdjustmentsIcon' },
];

// Current user would come from props in a real app
const user = {
  name: 'Demo User',
  email: 'user@example.com',
  imageUrl: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
};

const sidebarOpen = ref(false);

const toggleSidebar = () => {
  sidebarOpen.value = !sidebarOpen.value;
};
</script>

<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Mobile sidebar -->
    <div 
      class="fixed inset-0 z-40 flex md:hidden" 
      role="dialog" 
      aria-modal="true"
      v-show="sidebarOpen"
    >
      <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true" @click="toggleSidebar"></div>
      <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-blue-700">
        <div class="absolute top-0 right-0 pt-2 -mr-12">
          <button 
            type="button" 
            class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            @click="toggleSidebar"
          >
            <span class="sr-only">Close sidebar</span>
            X
          </button>
        </div>
        <div class="flex items-center flex-shrink-0 px-4">
          <span class="text-xl font-bold text-white">All In One Marketing</span>
        </div>
        <div class="flex-1 h-0 mt-5 overflow-y-auto">
          <nav class="px-2 space-y-1">
            <Link 
              v-for="item in navigation" 
              :key="item.name"
              :href="item.href"
              class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md hover:bg-blue-800"
            >
              {{ item.name }}
            </Link>
          </nav>
        </div>
      </div>
      <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
      </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
      <div class="flex flex-col flex-1 min-h-0 bg-blue-700">
        <div class="flex items-center flex-shrink-0 h-16 px-4">
          <span class="text-xl font-bold text-white">All In One Marketing</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
          <nav class="flex-1 px-2 py-4 space-y-1">
            <Link 
              v-for="item in navigation" 
              :key="item.name"
              :href="item.href"
              class="flex items-center px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-blue-800"
            >
              {{ item.name }}
            </Link>
          </nav>
        </div>
      </div>
    </div>

    <div class="md:pl-64 flex flex-col">
      <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
        <button
          type="button"
          class="px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 md:hidden"
          @click="toggleSidebar"
        >
          <span class="sr-only">Open sidebar</span>
          ☰
        </button>
        <div class="flex-1 px-4 flex justify-between">
          <div class="flex-1 flex">
            <!-- Search bar could go here -->
          </div>
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div class="ml-3 relative">
              <div>
                <button 
                  type="button"
                  class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                  <span class="sr-only">Open user menu</span>
                  <span class="h-8 w-8 rounded-full bg-gray-300"></span>
                </button>
              </div>
              <!-- Dropdown menu would go here -->
            </div>
          </div>
        </div>
      </div>

      <main class="flex-1">
        <div class="py-6">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <slot />
          </div>
        </div>
      </main>
    </div>
  </div>
</template> 