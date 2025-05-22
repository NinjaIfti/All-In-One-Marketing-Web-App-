<script setup>
import { Head } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/admin/DashboardLayout.vue';
import { ref, onMounted, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

// User profile data
const userProfile = ref({
  name: 'John Doe',
  email: 'john.doe@example.com',
  plan: 'Professional',
  joinDate: 'January 15, 2025',
  totalCampaigns: 24,
  totalContacts: 3542,
  emailsSent: 45320,
  avgOpenRate: 42.8
});

// Quick stats for user
const quickStats = ref([
  { 
    name: 'Active Campaigns', 
    value: '8', 
    icon: 'mail',
    color: 'text-orange-600',
    bgColor: 'bg-orange-100'
  },
  { 
    name: 'Total Contacts', 
    value: '3,542', 
    icon: 'users',
    color: 'text-blue-600',
    bgColor: 'bg-blue-100'
  },
  { 
    name: 'Emails Sent Today', 
    value: '1,245', 
    icon: 'send',
    color: 'text-green-600',
    bgColor: 'bg-green-100'
  },
  { 
    name: 'Avg Open Rate', 
    value: '42.8%', 
    icon: 'percent',
    color: 'text-purple-600',
    bgColor: 'bg-purple-100'
  },
]);

// Recent campaigns for user
const myCampaigns = ref([
  { 
    id: 1, 
    name: 'Weekly Newsletter - May Week 3', 
    status: 'Sent', 
    sentDate: 'May 20, 2025',
    recipients: 1450,
    opened: 620,
    clicked: 185,
    openRate: 42.7,
    clickRate: 12.8
  },
  { 
    id: 2, 
    name: 'Product Launch Announcement', 
    status: 'Scheduled', 
    sentDate: 'May 24, 2025',
    recipients: 2100,
    opened: 0,
    clicked: 0,
    openRate: 0,
    clickRate: 0
  },
  { 
    id: 3, 
    name: 'Customer Satisfaction Survey', 
    status: 'Draft', 
    sentDate: '-',
    recipients: 0,
    opened: 0,
    clicked: 0,
    openRate: 0,
    clickRate: 0
  },
]);

// Engagement metrics over time
const engagementData = ref([
  { date: 'Mon', opens: 245, clicks: 89 },
  { date: 'Tue', opens: 312, clicks: 124 },
  { date: 'Wed', opens: 289, clicks: 98 },
  { date: 'Thu', opens: 356, clicks: 145 },
  { date: 'Fri', opens: 398, clicks: 178 },
  { date: 'Sat', opens: 267, clicks: 92 },
  { date: 'Sun', opens: 234, clicks: 76 },
]);

// Recent contacts
const recentContacts = ref([
  { id: 1, name: 'Sarah Johnson', email: 'sarah.j@example.com', addedDate: 'May 21, 2025', status: 'Active' },
  { id: 2, name: 'Michael Chen', email: 'michael.c@example.com', addedDate: 'May 20, 2025', status: 'Active' },
  { id: 3, name: 'Emma Williams', email: 'emma.w@example.com', addedDate: 'May 19, 2025', status: 'Active' },
  { id: 4, name: 'James Brown', email: 'james.b@example.com', addedDate: 'May 18, 2025', status: 'Unsubscribed' },
]);

// Quick actions for user
const quickActions = ref([
  { name: 'Create Campaign', icon: 'plus-circle', route: 'campaigns.create', color: 'bg-orange-500' },
  { name: 'Import Contacts', icon: 'upload', route: 'contacts.import', color: 'bg-blue-500' },
  { name: 'View Analytics', icon: 'bar-chart', route: 'analytics.index', color: 'bg-purple-500' },
  { name: 'Email Templates', icon: 'layout', route: 'templates.index', color: 'bg-green-500' },
]);

// Upcoming tasks
const upcomingTasks = ref([
  { id: 1, title: 'Review campaign performance', dueDate: 'Today', priority: 'High' },
  { id: 2, title: 'Update email templates', dueDate: 'Tomorrow', priority: 'Medium' },
  { id: 3, title: 'Clean contact list', dueDate: 'May 25', priority: 'Low' },
]);

const getStatIcon = (iconType) => {
  switch(iconType) {
    case 'mail':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>`;
    case 'users':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>`;
    case 'send':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
              </svg>`;
    case 'percent':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>`;
    default:
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>`;
  }
};

const getActionIcon = (iconType) => {
  switch(iconType) {
    case 'plus-circle':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>`;
    case 'upload':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
              </svg>`;
    case 'bar-chart':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>`;
    case 'layout':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
              </svg>`;
    default:
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>`;
  }
};

const getCurrentDate = () => {
  const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  return new Date().toLocaleDateString('en-US', options);
};

const getMaxValue = (data, key) => {
  return Math.max(...data.map(item => item[key]));
};

onMounted(() => {
  // Load user data and stats
});
</script>

<template>
  <Head title="My Dashboard" />

  <DashboardLayout>
    <div class="py-6">
      <!-- Welcome Header -->
      <div class="mb-8">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 text-white">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
              <h1 class="text-3xl font-bold">Welcome back, {{ userProfile.name }}!</h1>
              <p class="mt-2 text-orange-100">{{ getCurrentDate() }}</p>
              <div class="mt-4 flex flex-wrap gap-4 text-sm">
                <div class="flex items-center">
                  <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                  <span>{{ userProfile.totalCampaigns }} Campaigns</span>
                </div>
                <div class="flex items-center">
                  <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <span>{{ userProfile.totalContacts.toLocaleString() }} Contacts</span>
                </div>
                <div class="flex items-center">
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-200 text-orange-800">
                    {{ userProfile.plan }} Plan
                  </span>
                </div>
              </div>
            </div>
            <div class="mt-4 md:mt-0">
              <button class="bg-white text-orange-600 px-6 py-3 rounded-md font-medium hover:bg-orange-50 transition-colors shadow-md">
                Create New Campaign
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Stats -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div v-for="stat in quickStats" :key="stat.name" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
          <div class="flex items-center">
            <div :class="[stat.bgColor, 'rounded-lg p-3']">
              <div v-html="getStatIcon(stat.icon)" :class="stat.color"></div>
            </div>
            <div class="ml-4">
              <p class="text-sm text-gray-500">{{ stat.name }}</p>
              <p class="text-2xl font-bold text-gray-900">{{ stat.value }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Engagement Chart -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-lg p-6">
          <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Weekly Engagement</h2>
            <div class="flex items-center space-x-4 text-sm">
              <div class="flex items-center">
                <div class="w-3 h-3 bg-orange-500 rounded-full mr-2"></div>
                <span class="text-gray-600">Opens</span>
              </div>
              <div class="flex items-center">
                <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                <span class="text-gray-600">Clicks</span>
              </div>
            </div>
          </div>
          
          <div class="relative h-64">
            <div class="absolute inset-0 flex items-end">
              <div v-for="(day, index) in engagementData" :key="index" class="flex-1 flex flex-col items-center mx-1">
                <div class="w-full flex items-end space-x-1 h-56">
                  <div 
                    class="flex-1 bg-orange-500 rounded-t opacity-80"
                    :style="{ height: `${(day.opens / getMaxValue(engagementData, 'opens')) * 100}%` }"
                  ></div>
                  <div 
                    class="flex-1 bg-blue-500 rounded-t opacity-80"
                    :style="{ height: `${(day.clicks / getMaxValue(engagementData, 'clicks')) * 100}%` }"
                  ></div>
                </div>
                <span class="mt-2 text-xs text-gray-600">{{ day.date }}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-lg p-6">
          <h2 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h2>
          <div class="grid grid-cols-2 gap-4">
            <button
              v-for="action in quickActions"
              :key="action.name"
              class="flex flex-col items-center p-4 rounded-lg border-2 border-gray-200 hover:border-orange-500 transition-colors group"
            >
              <div 
                :class="[action.color, 'rounded-full p-3 text-white mb-3 group-hover:scale-110 transition-transform']"
                v-html="getActionIcon(action.icon)"
              ></div>
              <span class="text-sm font-medium text-gray-700">{{ action.name }}</span>
            </button>
          </div>
        </div>
      </div>

      <!-- My Campaigns Section -->
      <div class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
          <h2 class="text-lg font-semibold text-gray-900">My Recent Campaigns</h2>
          <Link href="#" class="text-sm text-orange-600 hover:text-orange-500 font-medium">View All</Link>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Campaign</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recipients</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Open Rate</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Click Rate</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="campaign in myCampaigns" :key="campaign.id" class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div>
                    <div class="text-sm font-medium text-gray-900">{{ campaign.name }}</div>
                    <div class="text-sm text-gray-500">{{ campaign.sentDate }}</div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span 
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                    :class="{
                      'bg-green-100 text-green-800': campaign.status === 'Sent',
                      'bg-blue-100 text-blue-800': campaign.status === 'Scheduled',
                      'bg-gray-100 text-gray-800': campaign.status === 'Draft'
                    }"
                  >
                    {{ campaign.status }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  {{ campaign.recipients.toLocaleString() }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <span class="text-sm text-gray-900">{{ campaign.openRate }}%</span>
                    <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
                      <div class="bg-green-500 h-2 rounded-full" :style="`width: ${campaign.openRate}%`"></div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <span class="text-sm text-gray-900">{{ campaign.clickRate }}%</span>
                    <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
                      <div class="bg-blue-500 h-2 rounded-full" :style="`width: ${campaign.clickRate}%`"></div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <button class="text-orange-600 hover:text-orange-900 mr-3">View</button>
                  <button class="text-gray-600 hover:text-gray-900">Edit</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Bottom Row -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
        <!-- Recent Contacts -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900">Recent Contacts</h2>
            <Link href="#" class="text-sm text-orange-600 hover:text-orange-500 font-medium">Manage Contacts</Link>
          </div>
          <div class="divide-y divide-gray-200">
            <div v-for="contact in recentContacts" :key="contact.id" class="px-6 py-4 hover:bg-gray-50">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-600 font-medium">{{ contact.name.split(' ').map(n => n[0]).join('') }}</span>
                  </div>
                  <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">{{ contact.name }}</p>
                    <p class="text-sm text-gray-500">{{ contact.email }}</p>
                  </div>
                </div>
                <div class="text-right">
                  <p class="text-xs text-gray-500">{{ contact.addedDate }}</p>
                  <span 
                    class="inline-flex px-2 py-1 text-xs rounded-full mt-1"
                    :class="contact.status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'"
                  >
                    {{ contact.status }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tasks & Reminders -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900">Tasks & Reminders</h2>
            <button class="text-sm text-orange-600 hover:text-orange-500 font-medium">Add Task</button>
          </div>
          <div class="divide-y divide-gray-200">
            <div v-for="task in upcomingTasks" :key="task.id" class="px-6 py-4 hover:bg-gray-50">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <input type="checkbox" class="h-4 w-4 text-orange-600 rounded border-gray-300 focus:ring-orange-500">
                  <label class="ml-3 text-sm text-gray-900">{{ task.title }}</label>
                </div>
                <div class="flex items-center space-x-2">
                  <span class="text-xs text-gray-500">{{ task.dueDate }}</span>
                  <span 
                    class="px-2 py-1 text-xs rounded-full"
                    :class="{
                      'bg-red-100 text-red-800': task.priority === 'High',
                      'bg-yellow-100 text-yellow-800': task.priority === 'Medium',
                      'bg-green-100 text-green-800': task.priority === 'Low'
                    }"
                  >
                    {{ task.priority }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Help Section -->
      <div class="mt-8 bg-gradient-to-r from-navy-900 to-navy-800 rounded-lg shadow-lg p-6 text-white">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
          <div>
            <h3 class="text-xl font-semibold">Need Help Getting Started?</h3>
            <p class="mt-2 text-navy-100">Check out our tutorials and guides to make the most of your marketing campaigns.</p>
          </div>
          <div class="mt-4 md:mt-0 flex space-x-4">
            <button class="bg-white text-navy-900 px-4 py-2 rounded-md font-medium hover:bg-gray-100 transition-colors">
              View Tutorials
            </button>
            <button class="border border-white text-white px-4 py-2 rounded-md font-medium hover:bg-white hover:text-navy-900 transition-colors">
              Contact Support
            </button>
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>


.text-navy-100 {
  color: #dbeafe;
}

.text-navy-700 {
  color: #0f2851;
}

.text-navy-800 {
  color: #0f2547;
}

.text-navy-900 {
  color: #0a1933;
}

.bg-navy-800 {
  background-color: #0f2547;
}

.bg-navy-900 {
  background-color: #0a1933;
}

.from-navy-900 {
  --tw-gradient-from: #0a1933;
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(10, 25, 51, 0));
}

.to-navy-800 {
  --tw-gradient-to: #0f2547;
}

.hover\:bg-white:hover {
  background-color: #ffffff;
}

.hover\:text-navy-900:hover {
  color: #0a1933;
}

.text-orange-100 {
  color: #ffedd5;
}

.text-orange-500 {
  color: #f97316;
}

.text-orange-600 {
  color: #ea580c;
}

.text-orange-800 {
  color: #9a3412;
}

.bg-orange-50 {
  background-color: #fff7ed;
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

.bg-orange-600 {
  background-color: #ea580c;
}

.hover\:text-orange-500:hover {
  color: #f97316;
}

.hover\:text-orange-900:hover {
  color: #7c2d12;
}

.hover\:border-orange-500:hover {
  border-color: #f97316;
}

.focus\:ring-orange-500:focus {
  --tw-ring-color: #f97316;
}

.from-orange-500 {
  --tw-gradient-from: #f97316;
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(249, 115, 22, 0));
}

.to-orange-600 {
  --tw-gradient-to: #ea580c;
}