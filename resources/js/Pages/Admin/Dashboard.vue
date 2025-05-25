<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

// Mock data for dashboard statistics
const stats = ref([
  { 
    name: 'Total Contacts', 
    value: '3,542', 
    change: '+12.5%', 
    changeType: 'increase', 
    icon: 'users',
    color: 'bg-gradient-to-br from-blue-500 to-blue-600',
    iconBg: 'bg-blue-100'
  },
  { 
    name: 'Email Campaigns', 
    value: '24', 
    change: '+6.3%', 
    changeType: 'increase', 
    icon: 'mail',
    color: 'bg-gradient-to-br from-orange-500 to-orange-600',
    iconBg: 'bg-orange-100'
  },
  { 
    name: 'SMS Campaigns', 
    value: '16', 
    change: '+3.2%', 
    changeType: 'increase', 
    icon: 'message-square',
    color: 'bg-gradient-to-br from-purple-500 to-purple-600',
    iconBg: 'bg-purple-100'
  },
  { 
    name: 'Open Rate', 
    value: '42.8%', 
    change: '+2.4%', 
    changeType: 'increase', 
    icon: 'percent',
    color: 'bg-gradient-to-br from-green-500 to-green-600',
    iconBg: 'bg-green-100'
  },
]);

// Revenue data for chart
const revenueData = ref([
  { date: '01 May', value: 12500 },
  { date: '05 May', value: 14000 },
  { date: '10 May', value: 16800 },
  { date: '15 May', value: 19200 },
  { date: '20 May', value: 21800 },
  { date: '25 May', value: 24600 },
  { date: '30 May', value: 28200 },
]);

// Recent campaigns
const recentCampaigns = ref([
  { 
    id: 1, 
    name: 'Summer Collection Launch', 
    status: 'Active', 
    progress: 68, 
    opens: 1450, 
    clicks: 385,
    date: 'May 22, 2025',
    type: 'Email',
    color: 'orange'
  },
  { 
    id: 2, 
    name: 'Flash Sale Notification', 
    status: 'Completed', 
    progress: 100, 
    opens: 3245, 
    clicks: 1106,
    date: 'May 18, 2025',
    type: 'SMS',
    color: 'green'
  },
  { 
    id: 3, 
    name: 'Customer Feedback Survey', 
    status: 'Scheduled', 
    progress: 0, 
    opens: 0, 
    clicks: 0,
    date: 'May 24, 2025',
    type: 'Email',
    color: 'blue'
  },
]);

// Top contacts
const topContacts = ref([
  { 
    id: 1, 
    name: 'Sarah Johnson', 
    email: 'sarah.j@example.com', 
    engagement: 92,
    avatar: '/images/avatars/avatar-1.jpg',
  },
  { 
    id: 2, 
    name: 'Michael Chen', 
    email: 'michael.c@example.com', 
    engagement: 87,
    avatar: '/images/avatars/avatar-2.jpg',
  },
  { 
    id: 3, 
    name: 'Olivia Rodriguez', 
    email: 'olivia.r@example.com', 
    engagement: 84,
    avatar: '/images/avatars/avatar-3.jpg',
  },
  { 
    id: 4, 
    name: 'Daniel Kim', 
    email: 'daniel.k@example.com', 
    engagement: 79,
    avatar: '/images/avatars/avatar-4.jpg',
  },
]);

// Upcoming tasks
const upcomingTasks = ref([
  { 
    id: 1, 
    title: 'Schedule June newsletter', 
    priority: 'High', 
    dueDate: 'Tomorrow',
    color: 'bg-red-500'
  },
  { 
    id: 2, 
    title: 'Review campaign analytics', 
    priority: 'Medium', 
    dueDate: 'Jun 24',
    color: 'bg-yellow-500'
  },
  { 
    id: 3, 
    title: 'Update contact segments', 
    priority: 'Medium', 
    dueDate: 'Jun 26',
    color: 'bg-yellow-500'
  },
  { 
    id: 4, 
    title: 'Prepare Q3 strategy', 
    priority: 'High', 
    dueDate: 'Jun 30',
    color: 'bg-red-500'
  },
]);

const getStatIcon = (iconType) => {
  switch(iconType) {
    case 'users':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>`;
    case 'mail':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>`;
    case 'message-square':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
              </svg>`;
    case 'percent':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>`;
    default:
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>`;
  }
};

const getCurrentDate = () => {
  const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  const now = new Date();
  return `${months[now.getMonth()]} ${now.getDate()}, ${now.getFullYear()}`;
};

// Generate the placeholder avatar URL if no avatar exists
const getAvatarUrl = (name) => {
  return `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=0D8ABC&color=fff`;
};

onMounted(() => {
  // This would normally load data from an API
  // For this example, we're using the mock data defined above
});
</script>

<template>
  <Head title="Admin Dashboard" />

  <AdminLayout>
    <div class="py-6">
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
          <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Dashboard</h1>
          <p class="mt-1 text-gray-500">{{ getCurrentDate() }} · Welcome back to your command center</p>
        </div>
        <div class="mt-4 md:mt-0 flex items-center space-x-3">
          <div class="relative">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-navy-900">
              <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              Last 30 days
            </button>
          </div>
          <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-navy-900 hover:bg-navy-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-navy-900">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            New Campaign
          </button>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div v-for="(item, index) in stats" :key="index" class="bg-white overflow-hidden shadow-lg rounded-lg transition-all duration-300 hover:shadow-xl">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0 flex h-12 w-12 items-center justify-center rounded-lg" :class="item.iconBg">
                <div v-html="getStatIcon(item.icon)" class="text-gray-700"></div>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">{{ item.name }}</dt>
                  <dd>
                    <div class="text-2xl font-bold text-gray-900">{{ item.value }}</div>
                    <div class="flex items-center mt-1">
                      <svg v-if="item.changeType === 'increase'" class="w-4 h-4 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="text-sm font-medium" :class="item.changeType === 'increase' ? 'text-green-600' : 'text-red-600'">{{ item.change }}</span>
                      <span class="text-sm text-gray-500 ml-1">vs. last month</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>
          <div class="h-1 w-full" :class="item.color"></div>
        </div>
      </div>

      <!-- Main Content Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Revenue Chart - 2 columns -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
              <h2 class="text-lg font-medium text-gray-900">Revenue Overview</h2>
              <div class="flex items-center space-x-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                  +12.5% growth
                </span>
                <button type="button" class="p-1 rounded-full text-gray-400 hover:text-gray-500">
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="px-6 py-5">
            <div class="relative h-80">
              <!-- Revenue chart visualization (placeholder) -->
              <div class="absolute bottom-0 left-0 right-0 h-64">
                <div class="flex items-end h-full space-x-2">
                  <div v-for="(item, idx) in revenueData" :key="idx" class="flex-1 flex flex-col items-center">
                    <div class="h-full flex items-end w-full px-1">
                      <div
                        class="w-full bg-gradient-to-t from-orange-500 to-orange-400 rounded-t-md shadow-md transition-all duration-500"
                        :style="{ height: `${(item.value / 30000) * 100}%` }"
                      ></div>
                    </div>
                    <div class="mt-2 text-xs text-gray-500 w-full text-center overflow-hidden truncate">{{ item.date }}</div>
                  </div>
                </div>
              </div>
              <!-- Y-axis labels -->
              <div class="absolute top-0 left-0 bottom-0 flex flex-col justify-between text-xs text-gray-500 py-2">
                <div>$30k</div>
                <div>$20k</div>
                <div>$10k</div>
                <div>$0</div>
              </div>
            </div>
            <div class="mt-6 flex items-center justify-between">
              <div>
                <span class="text-2xl font-bold text-gray-900">$124,750</span>
                <span class="ml-2 text-sm text-gray-500">total revenue</span>
              </div>
              <button type="button" class="inline-flex items-center text-sm font-medium text-orange-600 hover:text-orange-500">
                View detailed report
                <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Top Performing Contacts -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
              <h2 class="text-lg font-medium text-gray-900">Top Contacts</h2>
              <button type="button" class="text-sm font-medium text-orange-600 hover:text-orange-500">
                View all
              </button>
            </div>
          </div>
          <div>
            <ul class="divide-y divide-gray-200">
              <li v-for="contact in topContacts" :key="contact.id" class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                <div class="flex items-center space-x-4">
                  <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" :src="contact.avatar || getAvatarUrl(contact.name)" alt="" />
                  </div>
                  <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">{{ contact.name }}</p>
                    <p class="text-sm text-gray-500 truncate">{{ contact.email }}</p>
                  </div>
                  <div class="flex-shrink-0">
                    <div class="flex items-center space-x-1">
                      <span class="text-sm font-semibold">{{ contact.engagement }}%</span>
                      <div class="w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-green-500 rounded-full" :style="{ width: `${contact.engagement}%` }"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
              <button type="button" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Add New Contact
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Row -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
        <!-- Recent Campaigns -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
              <h2 class="text-lg font-medium text-gray-900">Recent Campaigns</h2>
              <button type="button" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-orange-700 bg-orange-100 hover:bg-orange-200">
                New Campaign
              </button>
            </div>
          </div>
          <div>
            <ul class="divide-y divide-gray-200">
              <li v-for="campaign in recentCampaigns" :key="campaign.id" class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                <div class="mb-2 flex items-center justify-between">
                  <h3 class="text-sm font-medium text-gray-900">{{ campaign.name }}</h3>
                  <span
                    class="px-2.5 py-0.5 text-xs font-medium rounded-full"
                    :class="{
                      'bg-green-100 text-green-800': campaign.status === 'Completed',
                      'bg-blue-100 text-blue-800': campaign.status === 'Scheduled',
                      'bg-orange-100 text-orange-800': campaign.status === 'Active'
                    }"
                  >
                    {{ campaign.status }}
                  </span>
                </div>
                <div class="flex items-center space-x-2 text-sm text-gray-500 mb-3">
                  <div class="flex items-center">
                    <svg class="h-4 w-4 mr-1 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ campaign.date }}
                  </div>
                  <div>·</div>
                  <div 
                    class="px-2 py-0.5 text-xs rounded-md"
                    :class="{
                      'bg-blue-50 text-blue-700': campaign.type === 'Email',
                      'bg-purple-50 text-purple-700': campaign.type === 'SMS'
                    }"
                  >
                    {{ campaign.type }}
                  </div>
                </div>
                <div class="mb-2">
                  <div class="relative pt-1">
                    <div class="overflow-hidden h-1.5 text-xs flex rounded bg-gray-200">
                      <div 
                        :style="{ width: `${campaign.progress}%` }" 
                        :class="{
                          'bg-green-500': campaign.status === 'Completed',
                          'bg-blue-500': campaign.status === 'Scheduled',
                          'bg-orange-500': campaign.status === 'Active'
                        }"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center"
                      ></div>
                    </div>
                  </div>
                </div>
                <div class="flex items-center justify-between text-sm">
                  <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                      <svg class="h-4 w-4 mr-1 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      {{ campaign.opens }} opens
                    </div>
                    <div class="flex items-center">
                      <svg class="h-4 w-4 mr-1 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                      </svg>
                      {{ campaign.clicks }} clicks
                    </div>
                  </div>
                  <button class="text-navy-700 hover:text-navy-900">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                  </button>
                </div>
              </li>
            </ul>
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
              <button type="button" class="text-sm font-medium text-orange-600 hover:text-orange-500 flex items-center justify-center w-full">
                View all campaigns
                <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Upcoming Tasks -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
              <h2 class="text-lg font-medium text-gray-900">Upcoming Tasks</h2>
              <button type="button" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-navy-700 bg-navy-100 hover:bg-navy-200">
                <svg class="-ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add Task
              </button>
            </div>
          </div>
          <div class="overflow-hidden">
            <ul class="divide-y divide-gray-200">
              <li v-for="task in upcomingTasks" :key="task.id" class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                <div class="flex items-center space-x-3">
                  <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-500 rounded border-gray-300 focus:ring-orange-500">
                    <span class="ml-3">
                      <span class="text-sm font-medium text-gray-900">{{ task.title }}</span>
                    </span>
                  </label>
                </div>
                <div class="mt-2 sm:mt-0 flex items-center justify-between">
                  <div class="flex space-x-4 mt-2">
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium" :class="task.color">
                      <svg class="mr-1.5 h-2 w-2 text-white" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                      </svg>
                      {{ task.priority }}
                    </span>
                    <span class="text-sm text-gray-500">{{ task.dueDate }}</span>
                  </div>
                  <div>
                    <button type="button" class="text-gray-400 hover:text-gray-500">
                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                      </svg>
                    </button>
                  </div>
                </div>
              </li>
            </ul>
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">Showing 4 of 12 tasks</span>
                <button type="button" class="text-sm font-medium text-navy-700 hover:text-navy-900 flex items-center">
                  View all tasks
                  <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Actions Section -->
      <div class="mt-8">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
            <div class="px-4 py-5 sm:p-6">
              <div class="flex items-center">
                <div class="flex-shrink-0 bg-orange-100 rounded-md p-3">
                  <svg class="h-6 w-6 text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div class="ml-5">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">Create Email Campaign</h3>
                  <p class="mt-2 text-sm text-gray-500">Design and schedule your next email campaign</p>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
              <div class="text-sm">
                <a href="#" class="font-medium text-orange-600 hover:text-orange-500">
                  Start now <span aria-hidden="true">&rarr;</span>
                </a>
              </div>
            </div>
          </div>
          
          <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
            <div class="px-4 py-5 sm:p-6">
              <div class="flex items-center">
                <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                  <svg class="h-6 w-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                  </svg>
                </div>
                <div class="ml-5">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">Send SMS Broadcast</h3>
                  <p class="mt-2 text-sm text-gray-500">Reach your audience with direct text messages</p>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
              <div class="text-sm">
                <a href="#" class="font-medium text-purple-600 hover:text-purple-500">
                  Start now <span aria-hidden="true">&rarr;</span>
                </a>
              </div>
            </div>
          </div>
          
          <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
            <div class="px-4 py-5 sm:p-6">
              <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                  <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                  </svg>
                </div>
                <div class="ml-5">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">Import Contacts</h3>
                  <p class="mt-2 text-sm text-gray-500">Add new contacts from CSV or Excel files</p>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
              <div class="text-sm">
                <a href="#" class="font-medium text-green-600 hover:text-green-500">
                  Start import <span aria-hidden="true">&rarr;</span>
                </a>
              </div>
            </div>
          </div>
          
          <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
            <div class="px-4 py-5 sm:p-6">
              <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                  <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                  </svg>
                </div>
                <div class="ml-5">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">View Analytics</h3>
                  <p class="mt-2 text-sm text-gray-500">Analyze your marketing performance</p>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
              <div class="text-sm">
                <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                  View reports <span aria-hidden="true">&rarr;</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Admin Dashboard Link -->
      <div class="mt-8">
        <Link :href="route('admin.dashboard')" class="block w-full bg-navy-900 hover:bg-navy-800 text-white font-medium py-3 px-6 rounded-lg shadow-lg transition duration-200 text-center">
          Go to Admin Dashboard
        </Link>
      </div>
    </div>
  </AdminLayout>
</template>

<style scoped>
.text-navy-700 {
  color: #0f2851;
}

.text-navy-900 {
  color: #0a1933;
}

.bg-navy-100 {
  background-color: #e0e7ff;
}

.bg-navy-200 {
  background-color: #c7d2fe;
}

.bg-navy-800 {
  background-color: #1e3a8a;
}

.bg-navy-900 {
  background-color: #0a1933;
}

.hover\:bg-navy-800:hover {
  background-color: #1e3a8a;
}

.focus\:ring-navy-900:focus {
  --tw-ring-color: #0a1933;
}

.text-orange-500 {
  color: #f97316;
}

.text-orange-600 {
  color: #ea580c;
}

.bg-orange-100 {
  background-color: #ffedd5;
}

.bg-orange-200 {
  background-color: #fed7aa;
}

.bg-orange-500 {
  background-color: #f97316;
}

.hover\:bg-orange-600:hover {
  background-color: #ea580c;
}

.focus\:ring-orange-500:focus {
  --tw-ring-color: #f97316;
}
</style>