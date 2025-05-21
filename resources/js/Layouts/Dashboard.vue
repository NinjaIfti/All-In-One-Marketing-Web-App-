<script setup>
import { Head } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

// Mock data for dashboard statistics
const stats = ref([
  { name: 'Total Contacts', value: '3,542', change: '+12.5%', changeType: 'increase', icon: 'users' },
  { name: 'Email Campaigns', value: '24', change: '+6.3%', changeType: 'increase', icon: 'mail' },
  { name: 'SMS Campaigns', value: '16', change: '+3.2%', changeType: 'increase', icon: 'message-square' },
  { name: 'Average Open Rate', value: '42.8%', change: '+2.4%', changeType: 'increase', icon: 'percent' },
]);

// Recent activities
const recentActivities = ref([
  { id: 1, action: 'Created new campaign', target: 'Summer Sale 2025', time: '2 hours ago', icon: 'campaign' },
  { id: 2, action: 'Added 150 new contacts', target: 'Main Database', time: 'Yesterday', icon: 'contact' },
  { id: 3, action: 'Sent email campaign', target: 'Monthly Newsletter', time: '2 days ago', icon: 'email' },
  { id: 4, action: 'Updated automation', target: 'Welcome Sequence', time: '3 days ago', icon: 'automation' },
  { id: 5, action: 'Created new website page', target: 'About Us', time: '5 days ago', icon: 'globe' },
]);

// Upcoming tasks
const tasks = ref([
  { id: 1, name: 'Schedule July newsletter', due: 'Tomorrow', priority: 'high' },
  { id: 2, name: 'Review customer survey results', due: 'Jun 24', priority: 'medium' },
  { id: 3, name: 'Update contact segmentation', due: 'Jun 26', priority: 'medium' },
  { id: 4, name: 'Prepare Q3 marketing plan', due: 'Jun 30', priority: 'high' },
]);

// Campaign performance data for chart
const campaignData = ref({
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
  datasets: [
    {
      label: 'Email Opens',
      data: [4200, 5100, 5800, 6300, 7100, 7800],
      borderColor: '#0a1933',
      backgroundColor: 'rgba(10, 25, 51, 0.1)',
      tension: 0.4,
    },
    {
      label: 'SMS Responses',
      data: [2100, 2400, 2900, 3400, 3800, 4200],
      borderColor: '#f97316',
      backgroundColor: 'rgba(249, 115, 22, 0.1)',
      tension: 0.4,
    }
  ]
});

// Get icon for activity based on type
const getActivityIcon = (iconType) => {
  switch(iconType) {
    case 'campaign':
      return `<div class="flex items-center justify-center w-8 h-8 rounded-full bg-purple-100 text-purple-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z" />
                </svg>
              </div>`;
    case 'contact':
      return `<div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                </svg>
              </div>`;
    case 'email':
      return `<div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-100 text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
              </div>`;
    case 'automation':
      return `<div class="flex items-center justify-center w-8 h-8 rounded-full bg-indigo-100 text-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                </svg>
              </div>`;
    case 'globe':
      return `<div class="flex items-center justify-center w-8 h-8 rounded-full bg-pink-100 text-pink-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />
                </svg>
              </div>`;
    default:
      return `<div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                </svg>
              </div>`;
  }
};

// Get priority badge style based on priority
const getPriorityBadgeClass = (priority) => {
  switch(priority) {
    case 'high':
      return 'bg-red-100 text-red-800';
    case 'medium':
      return 'bg-yellow-100 text-yellow-800';
    case 'low':
      return 'bg-green-100 text-green-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
};

// Format priority text for display
const formatPriority = (priority) => {
  return priority.charAt(0).toUpperCase() + priority.slice(1);
};

// Get stat icon based on type
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

// Load chart data
onMounted(() => {
  // This would normally load data from an API
  // For this example, we're using the mock data defined above
});
</script>

<template>
  <Head title="Dashboard" />

  <DashboardLayout>
    <div>
      <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
      
      <!-- Welcome message -->
      <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-5 sm:p-6">
          <div class="sm:flex sm:items-center sm:justify-between">
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">Welcome back!</h3>
              <div class="mt-2 max-w-xl text-sm text-gray-500">
                <p>Here's what's happening with your marketing today.</p>
              </div>
            </div>
            <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
              <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Create New Campaign
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Stats -->
      <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <div v-for="(item, index) in stats" :key="index" class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0 bg-navy-100 rounded-md p-3" v-html="getStatIcon(item.icon)"></div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">{{ item.name }}</dt>
                  <dd class="flex items-baseline">
                    <div class="text-2xl font-semibold text-gray-900">{{ item.value }}</div>
                    <div class="ml-2 flex items-baseline text-sm font-semibold" :class="item.changeType === 'increase' ? 'text-green-600' : 'text-red-600'">
                      <svg v-if="item.changeType === 'increase'" class="self-center flex-shrink-0 h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      </svg>
                      <svg v-else class="self-center flex-shrink-0 h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">{{ item.changeType === 'increase' ? 'Increased' : 'Decreased' }} by</span>
                      {{ item.change }}
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Charts and activity -->
      <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Recent activity -->
        <div class="bg-white shadow rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Recent Activity</h3>
          </div>
          <div class="border-t border-gray-200">
            <ul role="list" class="divide-y divide-gray-200">
              <li v-for="activity in recentActivities" :key="activity.id" class="px-4 py-4 sm:px-6">
                <div class="flex items-center space-x-4">
                  <div v-html="getActivityIcon(activity.icon)"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">
                      {{ activity.action }}
                    </p>
                    <p class="text-sm text-gray-500 truncate">
                      {{ activity.target }}
                    </p>
                  </div>
                  <div class="flex-shrink-0 text-sm text-gray-500">
                    {{ activity.time }}
                  </div>
                </div>
              </li>
            </ul>
            <div class="px-4 py-4 sm:px-6 border-t border-gray-200">
              <a href="#" class="text-sm font-medium text-orange-500 hover:text-orange-600">
                View all activity<span aria-hidden="true"> &rarr;</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Tasks -->
        <div class="bg-white shadow rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center justify-between">
              <h3 class="text-lg leading-6 font-medium text-gray-900">Upcoming Tasks</h3>
              <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-orange-500 bg-orange-100 hover:bg-orange-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Add Task
              </button>
            </div>
          </div>
          <div class="border-t border-gray-200">
            <ul role="list" class="divide-y divide-gray-200">
              <li v-for="task in tasks" :key="task.id" class="px-4 py-4 sm:px-6">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <input id="task" name="task" type="checkbox" class="h-4 w-4 text-orange-500 focus:ring-orange-500 border-gray-300 rounded">
                    <label for="task" class="ml-3 block text-sm font-medium text-gray-700">{{ task.name }}</label>
                  </div>
                  <div class="flex items-center">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" :class="getPriorityBadgeClass(task.priority)">
                      {{ formatPriority(task.priority) }}
                    </span>
                    <span class="ml-2 text-sm text-gray-500">{{ task.due }}</span>
                  </div>
                </div>
              </li>
            </ul>
            <div class="px-4 py-4 sm:px-6 border-t border-gray-200">
              <a href="#" class="text-sm font-medium text-orange-500 hover:text-orange-600">
                View all tasks<span aria-hidden="true"> &rarr;</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Quick Actions</h3>
          </div>
          <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 gap-4">
              <button type="button" class="flex items-center p-4 border border-gray-300 rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-navy-900 text-white">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                </div>
                <div class="ml-4 text-left">
                  <h4 class="text-sm font-medium text-gray-900">Add New Contact</h4>
                  <p class="text-xs text-gray-500">Add a new contact to your database</p>
                </div>
              </button>
              
              <button type="button" class="flex items-center p-4 border border-gray-300 rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-navy-900 text-white">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div class="ml-4 text-left">
                  <h4 class="text-sm font-medium text-gray-900">Create Email Campaign</h4>
                  <p class="text-xs text-gray-500">Design and schedule an email campaign</p>
                </div>
              </button>
              
              <button type="button" class="flex items-center p-4 border border-gray-300 rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-navy-900 text-white">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                  </svg>
                </div>
                <div class="ml-4 text-left">
                  <h4 class="text-sm font-medium text-gray-900">View Reports</h4>
                  <p class="text-xs text-gray-500">Access analytics and performance reports</p>
                </div>
              </button>
            </div>
          </div>
        </div>
      </div>

      <Link href="/admin/dashboard" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center">
        Go to Dashboard
      </Link>
    </div>
  </DashboardLayout>
</template>

<style scoped>
.text-orange-500 {
  color: #f97316;
}

.text-orange-600 {
  color: #ea580c;
}

.bg-orange-500 {
  background-color: #f97316;
}

.bg-orange-600 {
  background-color: #ea580c;
}

.bg-orange-100 {
  background-color: #ffedd5;
}

.bg-orange-200 {
  background-color: #fed7aa;
}

.hover\:bg-orange-600:hover {
  background-color: #ea580c;
}

.hover\:bg-orange-200:hover {
  background-color: #fed7aa;
}

.hover\:text-orange-600:hover {
  color: #ea580c;
}

.focus\:ring-orange-500:focus {
  --tw-ring-color: #f97316;
}

.bg-navy-900 {
  background-color: #0a1933;
}

.bg-navy-100 {
  background-color: #e0e7ff;
}
</style>