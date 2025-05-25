<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { ref, onMounted } from 'vue';

// Mock data for pages
const pages = ref([
  {
    id: 1,
    title: 'Home',
    slug: '/',
    status: 'Published',
    lastUpdated: 'May 24, 2023',
    author: 'Admin User'
  },
  {
    id: 2,
    title: 'About Us',
    slug: '/about',
    status: 'Published',
    lastUpdated: 'May 20, 2023',
    author: 'Admin User'
  },
  {
    id: 3,
    title: 'Services',
    slug: '/services',
    status: 'Published',
    lastUpdated: 'May 18, 2023',
    author: 'Admin User'
  },
  {
    id: 4,
    title: 'Blog',
    slug: '/blog',
    status: 'Published',
    lastUpdated: 'May 22, 2023',
    author: 'Content Editor'
  },
  {
    id: 5,
    title: 'Contact',
    slug: '/contact',
    status: 'Published',
    lastUpdated: 'May 15, 2023',
    author: 'Admin User'
  },
  {
    id: 6,
    title: 'New Product Launch',
    slug: '/new-product',
    status: 'Draft',
    lastUpdated: 'May 24, 2023',
    author: 'Content Editor'
  }
]);

// Mock data for navigation menus
const menus = ref([
  {
    id: 1,
    name: 'Main Navigation',
    location: 'Header',
    itemCount: 5
  },
  {
    id: 2,
    name: 'Footer Links',
    location: 'Footer',
    itemCount: 8
  },
  {
    id: 3,
    name: 'Social Media',
    location: 'Footer',
    itemCount: 4
  }
]);

// Mock data for forms
const forms = ref([
  {
    id: 1,
    name: 'Contact Form',
    submissions: 24,
    lastSubmission: 'May 24, 2023'
  },
  {
    id: 2,
    name: 'Newsletter Signup',
    submissions: 156,
    lastSubmission: 'May 24, 2023'
  },
  {
    id: 3,
    name: 'Request a Demo',
    submissions: 12,
    lastSubmission: 'May 23, 2023'
  }
]);

// Active tab
const activeTab = ref('pages');

// Set active tab
const setActiveTab = (tab) => {
  activeTab.value = tab;
};

onMounted(() => {
  // This would normally fetch data from an API
});
</script>

<template>
  <Head title="Website Management" />

  <AdminLayout>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Website Management</h1>
          <p class="mt-1 text-gray-500">Manage your website content and settings</p>
        </div>
        <div class="mt-4 md:mt-0">
          <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Create Page
          </button>
        </div>
      </div>

      <!-- Tabs -->
      <div class="border-b border-gray-200 mb-6">
        <nav class="-mb-px flex space-x-8">
          <button
            @click="setActiveTab('pages')"
            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
            :class="activeTab === 'pages' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            Pages
          </button>
          <button
            @click="setActiveTab('navigation')"
            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
            :class="activeTab === 'navigation' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            Navigation
          </button>
          <button
            @click="setActiveTab('forms')"
            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
            :class="activeTab === 'forms' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            Forms
          </button>
          <button
            @click="setActiveTab('settings')"
            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
            :class="activeTab === 'settings' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            Settings
          </button>
        </nav>
      </div>

      <!-- Pages Tab Content -->
      <div v-if="activeTab === 'pages'" class="bg-white shadow overflow-hidden rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Pages</h2>
          <div class="flex space-x-2">
            <div class="relative">
              <input
                type="text"
                placeholder="Search pages..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
              />
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </div>
            </div>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Title
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  URL
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Last Updated
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Author
                </th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="page in pages" :key="page.id" class="hover:bg-gray-50">
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ page.title }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ page.slug }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-md"
                    :class="page.status === 'Published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'"
                  >
                    {{ page.status }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ page.lastUpdated }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ page.author }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button type="button" class="text-purple-600 hover:text-purple-900 mr-3">Edit</button>
                  <button type="button" class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                  <button type="button" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Navigation Tab Content -->
      <div v-if="activeTab === 'navigation'" class="bg-white shadow overflow-hidden rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Navigation Menus</h2>
          <button type="button" class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <svg class="-ml-1 mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Add Menu
          </button>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Menu Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Location
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Items
                </th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="menu in menus" :key="menu.id" class="hover:bg-gray-50">
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ menu.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ menu.location }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ menu.itemCount }} items</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button type="button" class="text-purple-600 hover:text-purple-900 mr-3">Edit</button>
                  <button type="button" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Forms Tab Content -->
      <div v-if="activeTab === 'forms'" class="bg-white shadow overflow-hidden rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Forms</h2>
          <button type="button" class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <svg class="-ml-1 mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Create Form
          </button>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Form Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Submissions
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Last Submission
                </th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="form in forms" :key="form.id" class="hover:bg-gray-50">
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ form.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ form.submissions }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ form.lastSubmission }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button type="button" class="text-purple-600 hover:text-purple-900 mr-3">Edit</button>
                  <button type="button" class="text-blue-600 hover:text-blue-900 mr-3">View Submissions</button>
                  <button type="button" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Settings Tab Content -->
      <div v-if="activeTab === 'settings'" class="bg-white shadow overflow-hidden rounded-lg">
        <div class="p-4 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Website Settings</h2>
        </div>
        <div class="p-6 space-y-6">
          <!-- General Settings -->
          <div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">General</h3>
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
              <div>
                <label for="site-title" class="block text-sm font-medium text-gray-700">Site Title</label>
                <input
                  type="text"
                  name="site-title"
                  id="site-title"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  value="All-In-One Marketing"
                />
              </div>
              <div>
                <label for="site-tagline" class="block text-sm font-medium text-gray-700">Tagline</label>
                <input
                  type="text"
                  name="site-tagline"
                  id="site-tagline"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  value="Your Complete Marketing Solution"
                />
              </div>
              <div>
                <label for="site-url" class="block text-sm font-medium text-gray-700">Site URL</label>
                <input
                  type="text"
                  name="site-url"
                  id="site-url"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  value="https://allinonemarketing.com"
                />
              </div>
              <div>
                <label for="admin-email" class="block text-sm font-medium text-gray-700">Admin Email</label>
                <input
                  type="email"
                  name="admin-email"
                  id="admin-email"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  value="admin@allinonemarketing.com"
                />
              </div>
            </div>
          </div>

          <!-- SEO Settings -->
          <div class="pt-6 border-t border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-4">SEO</h3>
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
              <div class="sm:col-span-2">
                <label for="meta-description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                <textarea
                  id="meta-description"
                  name="meta-description"
                  rows="3"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                >All-In-One Marketing provides comprehensive marketing solutions for businesses of all sizes. Email marketing, SMS campaigns, and more.</textarea>
              </div>
              <div>
                <label for="google-analytics" class="block text-sm font-medium text-gray-700">Google Analytics ID</label>
                <input
                  type="text"
                  name="google-analytics"
                  id="google-analytics"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  value="UA-12345678-1"
                />
              </div>
            </div>
          </div>

          <!-- Social Media Settings -->
          <div class="pt-6 border-t border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Social Media</h3>
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
              <div>
                <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook URL</label>
                <input
                  type="text"
                  name="facebook"
                  id="facebook"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  value="https://facebook.com/allinonemarketing"
                />
              </div>
              <div>
                <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter URL</label>
                <input
                  type="text"
                  name="twitter"
                  id="twitter"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  value="https://twitter.com/allinonemarketing"
                />
              </div>
              <div>
                <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram URL</label>
                <input
                  type="text"
                  name="instagram"
                  id="instagram"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  value="https://instagram.com/allinonemarketing"
                />
              </div>
              <div>
                <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                <input
                  type="text"
                  name="linkedin"
                  id="linkedin"
                  class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  value="https://linkedin.com/company/allinonemarketing"
                />
              </div>
            </div>
          </div>

          <!-- Save Button -->
          <div class="pt-6 border-t border-gray-200 flex justify-end">
            <button
              type="button"
              class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            >
              Save Settings
            </button>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template> 