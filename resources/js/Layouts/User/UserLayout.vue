<script setup>
import { ref } from 'vue';
import { Link, usePage, router } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
const showingMobileMenu = ref(false);

const user = usePage().props.auth.user;

const navItems = [
  { name: 'Dashboard', href: route('user.dashboard'), icon: 'home' },
  { name: 'Campaigns', href: route('user.campaigns'), icon: 'mail' },
  { name: 'Contacts', href: route('user.contacts'), icon: 'users' },
  { name: 'Analytics', href: route('user.analytics'), icon: 'bar-chart-2' },
  { name: 'Automation', href: route('user.automation'), icon: 'refresh-cw' },
  { name: 'Support Chat', href: route('user.chat.index'), icon: 'message-circle' },
  { name: 'Settings', href: route('user.settings'), icon: 'settings' }
];

const getNavIcon = (iconName) => {
  switch(iconName) {
    case 'home':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>`;
    case 'mail':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>`;
    case 'users':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>`;
    case 'bar-chart-2':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>`;
    case 'refresh-cw':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
              </svg>`;
    case 'message-circle':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              </svg>`;
    case 'settings':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>`;
    default:
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>`;
  }
};

const logout = () => {
  router.post(route('logout'));
};
</script>

<template>
  <div class="min-h-screen bg-gray-100 flex">
    <!-- Mobile menu -->
    <div :class="{'block': showingMobileMenu, 'hidden': ! showingMobileMenu}" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-20 lg:hidden" @click="showingMobileMenu = false"></div>

    <div :class="{'translate-x-0': showingMobileMenu, '-translate-x-full': ! showingMobileMenu}" class="fixed inset-y-0 left-0 w-64 transition duration-300 transform bg-purple-800 lg:translate-x-0 lg:static lg:inset-0 z-30">
      <div class="flex items-center justify-center h-16 bg-purple-900">
        <div class="flex items-center">
          <div class="text-white text-xl font-bold">PB&J Solutions</div>
        </div>
      </div>
      <nav class="mt-5 px-2">
        <div v-for="item in navItems" :key="item.name" class="mb-1">
          <Link :href="item.href" :class="{'bg-purple-700 text-white': $page.url.startsWith(item.href), 'text-purple-200 hover:bg-purple-700 hover:text-white': !$page.url.startsWith(item.href)}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <span v-html="getNavIcon(item.icon)" class="mr-3"></span>
            {{ item.name }}
          </Link>
        </div>
      </nav>
      <div class="px-2 mt-6">
        <div class="bg-purple-700 rounded-lg p-3 text-purple-200 text-sm">
          <div class="font-medium mb-1">Need Help?</div>
          <p class="opacity-90 text-xs">Our support team is ready to assist you with any questions.</p>
          <Link :href="route('user.support')" class="mt-2 inline-flex items-center text-xs text-purple-100 hover:text-white">
            Contact Support
            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </Link>
        </div>
      </div>
    </div>

    <div class="flex-1 flex flex-col">
      <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
        <button @click="showingMobileMenu = true" type="button" class="px-4 lg:hidden text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500">
          <span class="sr-only">Open sidebar</span>
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </button>

        <div class="flex-1 px-4 flex justify-between">
          <div class="flex-1 flex">
            <!-- Search bar could go here -->
          </div>
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Notification bell -->
            <button class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="ml-3 relative">
              <div>
                <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                  <span class="sr-only">Open user menu</span>
                  <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-800 font-medium">
                    {{ user.name.charAt(0) }}
                  </div>
                </button>
              </div>
              <div v-show="showingNavigationDropdown" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                <Link :href="route('profile.edit')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</Link>
                <Link :href="route('user.settings')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</Link>
                <div class="border-t border-gray-100"></div>
                <button @click="logout" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <main class="flex-1 relative overflow-y-auto focus:outline-none">
        <slot></slot>
      </main>
    </div>
  </div>
</template>

<style scoped>
.bg-purple-700 {
  background-color: #6d28d9;
}

.bg-purple-800 {
  background-color: #5b21b6;
}

.bg-purple-900 {
  background-color: #4c1d95;
}

.text-purple-100 {
  color: #ede9fe;
}

.text-purple-200 {
  color: #ddd6fe;
}

.hover\:bg-purple-700:hover {
  background-color: #6d28d9;
}

.focus\:ring-purple-500:focus {
  --tw-ring-color: #8b5cf6;
}
</style> 