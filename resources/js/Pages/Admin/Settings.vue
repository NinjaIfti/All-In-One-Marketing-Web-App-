<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { ref, onMounted } from 'vue';

// Mock data for users
const users = ref([
  {
    id: 1,
    name: 'Admin User',
    email: 'admin@example.com',
    role: 'Admin',
    avatar: '/images/avatars/avatar-1.jpg',
    lastActive: '2 hours ago'
  },
  {
    id: 2,
    name: 'Content Editor',
    email: 'editor@example.com',
    role: 'Editor',
    avatar: '/images/avatars/avatar-2.jpg',
    lastActive: '1 day ago'
  },
  {
    id: 3,
    name: 'Marketing Manager',
    email: 'marketing@example.com',
    role: 'Manager',
    avatar: '/images/avatars/avatar-3.jpg',
    lastActive: '3 hours ago'
  }
]);

// General settings form
const generalSettings = ref({
  companyName: 'All-In-One Marketing',
  timezone: 'America/New_York',
  dateFormat: 'MM/DD/YYYY',
  timeFormat: '12-hour',
  currency: 'USD',
  language: 'en',
});

// Email settings form
const emailSettings = ref({
  fromName: 'All-In-One Marketing',
  fromEmail: 'notifications@allinonemarketing.com',
  smtpHost: 'smtp.example.com',
  smtpPort: '587',
  smtpUsername: 'smtp_user',
  smtpPassword: '••••••••',
  encryption: 'tls',
});

// API keys
const apiKeys = ref([
  {
    id: 1,
    name: 'Google Analytics',
    key: 'UA-12345678-1',
    created: 'Jan 12, 2023'
  },
  {
    id: 2,
    name: 'Mailchimp API',
    key: 'a1b2c3••••••••••••••••',
    created: 'Feb 05, 2023'
  },
  {
    id: 3,
    name: 'Twilio SMS',
    key: '9876••••••••••••••••',
    created: 'Mar 14, 2023'
  }
]);

// Active tab
const activeTab = ref('general');

// Set active tab
const setActiveTab = (tab) => {
  activeTab.value = tab;
};

// Generate the placeholder avatar URL if no avatar exists
const getAvatarUrl = (user) => {
  return user.avatar || `https://ui-avatars.com/api/?name=${encodeURIComponent(user.name)}&background=0D8ABC&color=fff`;
};

// Save settings form (mock function)
const saveSettings = () => {
  // This would normally make an API call to save settings
  alert('Settings saved successfully!');
};

onMounted(() => {
  // This would normally fetch data from an API
});
</script>

<template>
  <Head title="Admin Settings" />

  <AdminLayout>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Settings</h1>
          <p class="mt-1 text-gray-500">Manage your application settings</p>
        </div>
      </div>

      <!-- Tabs -->
      <div class="border-b border-gray-200 mb-6">
        <nav class="-mb-px flex space-x-8">
          <button
            @click="setActiveTab('general')"
            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
            :class="activeTab === 'general' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            General
          </button>
          <button
            @click="setActiveTab('email')"
            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
            :class="activeTab === 'email' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            Email
          </button>
          <button
            @click="setActiveTab('api')"
            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
            :class="activeTab === 'api' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            API Keys
          </button>
          <button
            @click="setActiveTab('users')"
            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
            :class="activeTab === 'users' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            Users
          </button>
          <button
            @click="setActiveTab('backup')"
            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
            :class="activeTab === 'backup' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
          >
            Backup
          </button>
        </nav>
      </div>

      <!-- General Settings Tab -->
      <div v-if="activeTab === 'general'" class="bg-white shadow overflow-hidden rounded-lg">
        <div class="px-6 py-5 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">General Settings</h2>
        </div>
        <div class="px-6 py-5">
          <form @submit.prevent="saveSettings">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="company-name" class="block text-sm font-medium text-gray-700">Company Name</label>
                <div class="mt-1">
                  <input
                    type="text"
                    id="company-name"
                    v-model="generalSettings.companyName"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="timezone" class="block text-sm font-medium text-gray-700">Timezone</label>
                <div class="mt-1">
                  <select
                    id="timezone"
                    v-model="generalSettings.timezone"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="America/New_York">Eastern Time (ET)</option>
                    <option value="America/Chicago">Central Time (CT)</option>
                    <option value="America/Denver">Mountain Time (MT)</option>
                    <option value="America/Los_Angeles">Pacific Time (PT)</option>
                    <option value="Europe/London">London (GMT)</option>
                  </select>
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="date-format" class="block text-sm font-medium text-gray-700">Date Format</label>
                <div class="mt-1">
                  <select
                    id="date-format"
                    v-model="generalSettings.dateFormat"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="MM/DD/YYYY">MM/DD/YYYY</option>
                    <option value="DD/MM/YYYY">DD/MM/YYYY</option>
                    <option value="YYYY-MM-DD">YYYY-MM-DD</option>
                  </select>
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="time-format" class="block text-sm font-medium text-gray-700">Time Format</label>
                <div class="mt-1">
                  <select
                    id="time-format"
                    v-model="generalSettings.timeFormat"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="12-hour">12-hour (AM/PM)</option>
                    <option value="24-hour">24-hour</option>
                  </select>
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="currency" class="block text-sm font-medium text-gray-700">Currency</label>
                <div class="mt-1">
                  <select
                    id="currency"
                    v-model="generalSettings.currency"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="USD">US Dollar (USD)</option>
                    <option value="EUR">Euro (EUR)</option>
                    <option value="GBP">British Pound (GBP)</option>
                    <option value="CAD">Canadian Dollar (CAD)</option>
                    <option value="AUD">Australian Dollar (AUD)</option>
                  </select>
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                <div class="mt-1">
                  <select
                    id="language"
                    v-model="generalSettings.language"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="en">English</option>
                    <option value="es">Spanish</option>
                    <option value="fr">French</option>
                    <option value="de">German</option>
                    <option value="pt">Portuguese</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="mt-6 flex justify-end">
              <button
                type="submit"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
              >
                Save Settings
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Email Settings Tab -->
      <div v-if="activeTab === 'email'" class="bg-white shadow overflow-hidden rounded-lg">
        <div class="px-6 py-5 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Email Settings</h2>
        </div>
        <div class="px-6 py-5">
          <form @submit.prevent="saveSettings">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="from-name" class="block text-sm font-medium text-gray-700">From Name</label>
                <div class="mt-1">
                  <input
                    type="text"
                    id="from-name"
                    v-model="emailSettings.fromName"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="from-email" class="block text-sm font-medium text-gray-700">From Email</label>
                <div class="mt-1">
                  <input
                    type="email"
                    id="from-email"
                    v-model="emailSettings.fromEmail"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="smtp-host" class="block text-sm font-medium text-gray-700">SMTP Host</label>
                <div class="mt-1">
                  <input
                    type="text"
                    id="smtp-host"
                    v-model="emailSettings.smtpHost"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="smtp-port" class="block text-sm font-medium text-gray-700">SMTP Port</label>
                <div class="mt-1">
                  <input
                    type="text"
                    id="smtp-port"
                    v-model="emailSettings.smtpPort"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="smtp-username" class="block text-sm font-medium text-gray-700">SMTP Username</label>
                <div class="mt-1">
                  <input
                    type="text"
                    id="smtp-username"
                    v-model="emailSettings.smtpUsername"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="smtp-password" class="block text-sm font-medium text-gray-700">SMTP Password</label>
                <div class="mt-1">
                  <input
                    type="password"
                    id="smtp-password"
                    v-model="emailSettings.smtpPassword"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="encryption" class="block text-sm font-medium text-gray-700">Encryption</label>
                <div class="mt-1">
                  <select
                    id="encryption"
                    v-model="emailSettings.encryption"
                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="none">None</option>
                    <option value="ssl">SSL</option>
                    <option value="tls">TLS</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="mt-6">
              <button
                type="button"
                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
              >
                Send Test Email
              </button>
              <button
                type="submit"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
              >
                Save Settings
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- API Keys Tab -->
      <div v-if="activeTab === 'api'" class="bg-white shadow overflow-hidden rounded-lg">
        <div class="px-6 py-5 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">API Keys</h2>
        </div>
        <div class="px-6 py-5">
          <div class="mb-6">
            <button
              type="button"
              class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            >
              <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
              Add New API Key
            </button>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    API Key
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Created
                  </th>
                  <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="api in apiKeys" :key="api.id" class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ api.name }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900 font-mono">{{ api.key }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ api.created }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button type="button" class="text-blue-600 hover:text-blue-900 mr-3">Reveal</button>
                    <button type="button" class="text-red-600 hover:text-red-900">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Users Tab -->
      <div v-if="activeTab === 'users'" class="bg-white shadow overflow-hidden rounded-lg">
        <div class="px-6 py-5 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">User Management</h2>
        </div>
        <div class="px-6 py-5">
          <div class="mb-6">
            <button
              type="button"
              class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            >
              <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
              Add New User
            </button>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    User
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Role
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Last Active
                  </th>
                  <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="user in users" :key="user.id" class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" :src="getAvatarUrl(user)" alt="" />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>
                        <div class="text-sm text-gray-500">{{ user.email }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      :class="{
                        'bg-green-100 text-green-800': user.role === 'Admin',
                        'bg-blue-100 text-blue-800': user.role === 'Editor',
                        'bg-purple-100 text-purple-800': user.role === 'Manager'
                      }"
                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                    >
                      {{ user.role }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ user.lastActive }}
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
      </div>

      <!-- Backup Tab -->
      <div v-if="activeTab === 'backup'" class="bg-white shadow overflow-hidden rounded-lg">
        <div class="px-6 py-5 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Backup & Restore</h2>
        </div>
        <div class="px-6 py-5">
          <p class="text-sm text-gray-500 mb-6">
            Create backups of your application data, settings, and content. You can restore from these backups if needed.
          </p>
          
          <div class="space-y-6">
            <!-- Create Backup -->
            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="text-lg font-medium text-gray-900 mb-2">Create Backup</h3>
              <p class="text-sm text-gray-500 mb-4">
                Generate a complete backup of your application data.
              </p>
              <div class="flex items-center space-x-4">
                <button
                  type="button"
                  class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                >
                  <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
                  Create Backup
                </button>
                <span class="text-sm text-gray-500">Last backup: May 24, 2023 at 3:45 PM</span>
              </div>
            </div>
            
            <!-- Restore Backup -->
            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="text-lg font-medium text-gray-900 mb-2">Restore from Backup</h3>
              <p class="text-sm text-gray-500 mb-4">
                Upload a backup file to restore your application data.
              </p>
              <div>
                <label 
                  for="backup-file" 
                  class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 cursor-pointer"
                >
                  <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  Select Backup File
                </label>
                <input id="backup-file" type="file" class="hidden" />
              </div>
            </div>
            
            <!-- Auto Backup Settings -->
            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="text-lg font-medium text-gray-900 mb-2">Automatic Backups</h3>
              <p class="text-sm text-gray-500 mb-4">
                Configure automatic backup settings.
              </p>
              <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                <div>
                  <label for="backup-frequency" class="block text-sm font-medium text-gray-700">Backup Frequency</label>
                  <select
                    id="backup-frequency"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
                  >
                    <option>Daily</option>
                    <option>Weekly</option>
                    <option>Monthly</option>
                    <option>Never</option>
                  </select>
                </div>
                <div>
                  <label for="retention-period" class="block text-sm font-medium text-gray-700">Retention Period</label>
                  <select
                    id="retention-period"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
                  >
                    <option>7 days</option>
                    <option>30 days</option>
                    <option>90 days</option>
                    <option>1 year</option>
                  </select>
                </div>
              </div>
              <div class="mt-4">
                <button
                  type="button"
                  class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                >
                  Save Backup Settings
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template> 