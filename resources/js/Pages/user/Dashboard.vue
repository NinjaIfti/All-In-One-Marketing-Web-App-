<script setup>
import { Head, Link } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import { ref, onMounted } from 'vue';

const props = defineProps({
  user: Object,
});

// User stats
const stats = ref([
  { 
    name: 'Email Campaigns', 
    value: '5', 
    icon: 'mail',
    color: 'bg-gradient-to-br from-purple-500 to-purple-600',
    iconBg: 'bg-purple-100'
  },
  { 
    name: 'Subscribers', 
    value: '142', 
    icon: 'users',
    color: 'bg-gradient-to-br from-blue-500 to-blue-600',
    iconBg: 'bg-blue-100'
  },
  { 
    name: 'Open Rate', 
    value: '38.2%', 
    icon: 'percent',
    color: 'bg-gradient-to-br from-green-500 to-green-600',
    iconBg: 'bg-green-100'
  },
  { 
    name: 'Click Rate', 
    value: '12.5%', 
    icon: 'mouse-pointer',
    color: 'bg-gradient-to-br from-orange-500 to-orange-600',
    iconBg: 'bg-orange-100'
  },
]);

// Recent campaigns
const campaigns = ref([
  { 
    id: 1, 
    name: 'Weekly Newsletter', 
    sent: '125', 
    opens: '54',
    clicks: '18',
    date: 'May 15, 2025'
  },
  { 
    id: 2, 
    name: 'Product Update', 
    sent: '98', 
    opens: '42',
    clicks: '21',
    date: 'May 8, 2025'
  },
  { 
    id: 3, 
    name: 'Special Offer', 
    sent: '142', 
    opens: '86',
    clicks: '35',
    date: 'Apr 29, 2025'
  },
]);

// Quick actions
const quickActions = ref([
  { 
    name: 'New Campaign', 
    icon: 'mail-plus',
    color: 'bg-purple-500',
    route: 'user.campaigns.create'
  },
  { 
    name: 'Add Contacts', 
    icon: 'user-plus',
    color: 'bg-blue-500',
    route: 'user.contacts'
  },
  { 
    name: 'View Analytics', 
    icon: 'bar-chart-2',
    color: 'bg-green-500',
    route: 'user.analytics'
  },
  { 
    name: 'Get Help', 
    icon: 'help-circle',
    color: 'bg-orange-500',
    route: 'user.support'
  },
]);

const getIcon = (iconType) => {
  switch(iconType) {
    case 'mail':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>`;
    case 'users':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>`;
    case 'percent':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>`;
    case 'mouse-pointer':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
              </svg>`;
    case 'mail-plus':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>`;
    case 'user-plus':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
              </svg>`;
    case 'bar-chart-2':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>`;
    case 'help-circle':
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>`;
    default:
      return `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>`;
  }
};

const formatNumber = (num) => {
  return new Intl.NumberFormat().format(num);
};

onMounted(() => {
  // This would normally load data from an API
  // For this example, we're using mock data
});
</script>

<template>
  <Head title="Dashboard | PB&J Solutions" />

  <UserLayout>
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
            <h1 class="text-3xl font-bold text-purple-900">Welcome back, {{ props.user?.name }}</h1>
            <p class="mt-1 text-gray-600">Here's what's happening with your campaigns today.</p>
          </div>
          <Link :href="route('user.campaigns.create')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            New Campaign
          </Link>
      </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
          <div v-for="(stat, index) in stats" :key="index" 
               class="rounded-lg shadow-md overflow-hidden">
            <div class="p-5 flex items-center">
              <div class="flex-shrink-0">
                <div :class="[stat.iconBg, 'rounded-md p-3 text-white']" v-html="getIcon(stat.icon)"></div>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">
                    {{ stat.name }}
                  </dt>
                  <dd>
                    <div class="text-2xl font-bold text-purple-900">
                      {{ stat.value }}
              </div>
                  </dd>
                </dl>
              </div>
            </div>
            <div :class="stat.color" class="h-1"></div>
          </div>
        </div>

        <!-- Quick Actions -->
        <h2 class="text-xl font-semibold text-purple-900 mt-8 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
          <Link v-for="action in quickActions" :key="action.name"
                :href="route(action.route)"
                class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-center">
              <div :class="[action.color, 'p-3 rounded-full text-white']" v-html="getIcon(action.icon)"></div>
              <h3 class="ml-4 text-lg font-medium text-gray-900">{{ action.name }}</h3>
          </div>
          </Link>
      </div>

        <!-- Recent Campaigns -->
        <h2 class="text-xl font-semibold text-purple-900 mt-8 mb-4">Recent Campaigns</h2>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Campaign
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Sent
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Opens
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Clicks
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date
                  </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="campaign in campaigns" :key="campaign.id" class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-purple-800">{{ campaign.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ campaign.sent }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ campaign.opens }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ campaign.clicks }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ campaign.date }}
                </td>
                </tr>
                <tr v-if="campaigns.length === 0">
                  <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                    No campaigns found. Create your first campaign to get started.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
          <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <Link :href="route('user.campaigns')" class="text-sm font-medium text-purple-600 hover:text-purple-500">
              View All Campaigns <span aria-hidden="true">&rarr;</span>
            </Link>
          </div>
        </div>

        <!-- Tips & Resources -->
        <div class="mt-8 bg-gradient-to-r from-purple-600 to-purple-800 rounded-lg shadow-md p-6 text-white">
          <h2 class="text-xl font-semibold mb-2">Tips & Resources</h2>
          <p class="mb-4">Improve your marketing with these helpful resources</p>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white bg-opacity-10 p-4 rounded-lg">
              <h3 class="font-medium text-lg mb-1">Email Best Practices</h3>
              <p class="text-sm text-purple-100">Learn how to improve your open rates</p>
          </div>
            <div class="bg-white bg-opacity-10 p-4 rounded-lg">
              <h3 class="font-medium text-lg mb-1">Segmentation Guide</h3>
              <p class="text-sm text-purple-100">Target your audience more effectively</p>
                </div>
            <div class="bg-white bg-opacity-10 p-4 rounded-lg">
              <h3 class="font-medium text-lg mb-1">Analytics 101</h3>
              <p class="text-sm text-purple-100">Make data-driven marketing decisions</p>
            </div>
          </div>
          <div class="mt-4 text-right">
            <Link :href="route('user.resources')" class="text-sm text-white hover:underline">
              View All Resources <span aria-hidden="true">&rarr;</span>
            </Link>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template>

<style scoped>
.text-purple-900 {
  color: #4c1d95;
}

.text-purple-800 {
  color: #5b21b6;
}

.text-purple-600 {
  color: #7c3aed;
}

.text-purple-500 {
  color: #8b5cf6;
}

.bg-purple-600 {
  background-color: #7c3aed;
}

.bg-purple-800 {
  background-color: #5b21b6;
}

.hover\:bg-purple-700:hover {
  background-color: #6d28d9;
}

.focus\:ring-purple-500:focus {
  --tw-ring-color: #8b5cf6;
}
</style>