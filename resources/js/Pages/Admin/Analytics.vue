<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { ref, onMounted } from 'vue';

// Mock data for visitor statistics
const visitorStats = ref({
  totalVisitors: 12845,
  uniqueVisitors: 8523,
  pageViews: 37291,
  avgTimeOnSite: '2m 45s',
  bounceRate: '38%',
  change: {
    totalVisitors: 12.5,
    uniqueVisitors: 8.7,
    pageViews: 15.2,
    avgTimeOnSite: 5.3,
    bounceRate: -2.1
  }
});

// Mock data for traffic sources
const trafficSources = ref([
  { name: 'Organic Search', value: 42, color: 'bg-blue-500' },
  { name: 'Direct', value: 28, color: 'bg-green-500' },
  { name: 'Social Media', value: 18, color: 'bg-purple-500' },
  { name: 'Email', value: 8, color: 'bg-yellow-500' },
  { name: 'Referral', value: 4, color: 'bg-red-500' }
]);

// Mock data for top pages
const topPages = ref([
  { 
    id: 1, 
    path: '/', 
    title: 'Homepage', 
    views: 12450, 
    avgTime: '1m 30s', 
    bounceRate: '32%'
  },
  { 
    id: 2, 
    path: '/services', 
    title: 'Services', 
    views: 5830, 
    avgTime: '2m 15s', 
    bounceRate: '41%'
  },
  { 
    id: 3, 
    path: '/about', 
    title: 'About Us', 
    views: 3245, 
    avgTime: '1m 45s', 
    bounceRate: '35%'
  },
  { 
    id: 4, 
    path: '/contact', 
    title: 'Contact', 
    views: 2980, 
    avgTime: '3m 20s', 
    bounceRate: '28%'
  },
  { 
    id: 5, 
    path: '/blog/latest-marketing-trends', 
    title: 'Latest Marketing Trends', 
    views: 2145, 
    avgTime: '4m 10s', 
    bounceRate: '22%'
  }
]);

// Mock data for visitor chart
const visitorData = ref([
  { day: 'Mon', visitors: 1245 },
  { day: 'Tue', visitors: 1380 },
  { day: 'Wed', visitors: 1530 },
  { day: 'Thu', visitors: 1620 },
  { day: 'Fri', visitors: 1480 },
  { day: 'Sat', visitors: 980 },
  { day: 'Sun', visitors: 870 }
]);

// Mock data for conversion metrics
const conversionMetrics = ref([
  { 
    name: 'Email Signups', 
    value: 245, 
    rate: '3.2%', 
    change: 12.5, 
    color: 'bg-blue-500'
  },
  { 
    name: 'Form Submissions', 
    value: 128, 
    rate: '1.8%', 
    change: 5.3, 
    color: 'bg-green-500'
  },
  { 
    name: 'Product Demo Requests', 
    value: 76, 
    rate: '0.9%', 
    change: -2.1, 
    color: 'bg-yellow-500'
  },
  { 
    name: 'Trial Signups', 
    value: 54, 
    rate: '0.6%', 
    change: 8.7, 
    color: 'bg-purple-500'
  }
]);

// Date range filter
const dateRange = ref('7days');

// Get the max value for the visitor chart (for scaling)
const maxVisitors = () => {
  return Math.max(...visitorData.value.map(day => day.visitors));
};

// Format large numbers
const formatNumber = (num) => {
  return new Intl.NumberFormat().format(num);
};

onMounted(() => {
  // This would normally fetch data from an API
});
</script>

<template>
  <Head title="Analytics" />

  <AdminLayout>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Analytics</h1>
          <p class="mt-1 text-gray-500">Track your website performance and marketing campaigns</p>
        </div>
        <div class="mt-4 md:mt-0">
          <select
            v-model="dateRange"
            class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
          >
            <option value="today">Today</option>
            <option value="yesterday">Yesterday</option>
            <option value="7days">Last 7 Days</option>
            <option value="30days">Last 30 Days</option>
            <option value="90days">Last 90 Days</option>
            <option value="year">This Year</option>
          </select>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex flex-col">
              <dt class="text-sm font-medium text-gray-500 truncate mb-1">Total Visitors</dt>
              <dd class="text-2xl font-bold text-gray-900">{{ formatNumber(visitorStats.totalVisitors) }}</dd>
              <div class="flex items-center mt-2">
                <span 
                  :class="visitorStats.change.totalVisitors >= 0 ? 'text-green-600' : 'text-red-600'"
                  class="text-sm font-semibold"
                >
                  <span v-if="visitorStats.change.totalVisitors >= 0">+</span>{{ visitorStats.change.totalVisitors }}%
                </span>
                <span class="text-sm text-gray-500 ml-1">vs. previous period</span>
              </div>
            </div>
          </div>
          <div class="bg-blue-600 h-1 w-full"></div>
        </div>
        
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex flex-col">
              <dt class="text-sm font-medium text-gray-500 truncate mb-1">Unique Visitors</dt>
              <dd class="text-2xl font-bold text-gray-900">{{ formatNumber(visitorStats.uniqueVisitors) }}</dd>
              <div class="flex items-center mt-2">
                <span 
                  :class="visitorStats.change.uniqueVisitors >= 0 ? 'text-green-600' : 'text-red-600'"
                  class="text-sm font-semibold"
                >
                  <span v-if="visitorStats.change.uniqueVisitors >= 0">+</span>{{ visitorStats.change.uniqueVisitors }}%
                </span>
                <span class="text-sm text-gray-500 ml-1">vs. previous period</span>
              </div>
            </div>
          </div>
          <div class="bg-green-600 h-1 w-full"></div>
        </div>
        
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex flex-col">
              <dt class="text-sm font-medium text-gray-500 truncate mb-1">Page Views</dt>
              <dd class="text-2xl font-bold text-gray-900">{{ formatNumber(visitorStats.pageViews) }}</dd>
              <div class="flex items-center mt-2">
                <span 
                  :class="visitorStats.change.pageViews >= 0 ? 'text-green-600' : 'text-red-600'"
                  class="text-sm font-semibold"
                >
                  <span v-if="visitorStats.change.pageViews >= 0">+</span>{{ visitorStats.change.pageViews }}%
                </span>
                <span class="text-sm text-gray-500 ml-1">vs. previous period</span>
              </div>
            </div>
          </div>
          <div class="bg-purple-600 h-1 w-full"></div>
        </div>
        
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex flex-col">
              <dt class="text-sm font-medium text-gray-500 truncate mb-1">Avg. Time on Site</dt>
              <dd class="text-2xl font-bold text-gray-900">{{ visitorStats.avgTimeOnSite }}</dd>
              <div class="flex items-center mt-2">
                <span 
                  :class="visitorStats.change.avgTimeOnSite >= 0 ? 'text-green-600' : 'text-red-600'"
                  class="text-sm font-semibold"
                >
                  <span v-if="visitorStats.change.avgTimeOnSite >= 0">+</span>{{ visitorStats.change.avgTimeOnSite }}%
                </span>
                <span class="text-sm text-gray-500 ml-1">vs. previous period</span>
              </div>
            </div>
          </div>
          <div class="bg-yellow-600 h-1 w-full"></div>
        </div>
        
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex flex-col">
              <dt class="text-sm font-medium text-gray-500 truncate mb-1">Bounce Rate</dt>
              <dd class="text-2xl font-bold text-gray-900">{{ visitorStats.bounceRate }}</dd>
              <div class="flex items-center mt-2">
                <span 
                  :class="visitorStats.change.bounceRate <= 0 ? 'text-green-600' : 'text-red-600'"
                  class="text-sm font-semibold"
                >
                  <span v-if="visitorStats.change.bounceRate >= 0">+</span>{{ visitorStats.change.bounceRate }}%
                </span>
                <span class="text-sm text-gray-500 ml-1">vs. previous period</span>
              </div>
            </div>
          </div>
          <div class="bg-red-600 h-1 w-full"></div>
        </div>
      </div>

      <!-- Main Charts Section -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Visitor Chart - 2 columns -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Visitor Traffic</h2>
          </div>
          <div class="p-6">
            <div class="h-80 relative">
              <!-- Simple bar chart for visitors -->
              <div class="absolute inset-0 flex items-end">
                <div class="w-full flex items-end justify-between h-64 px-2">
                  <div
                    v-for="(day, index) in visitorData"
                    :key="index"
                    class="w-1/8 mx-2 flex flex-col items-center"
                  >
                    <div 
                      class="w-full bg-blue-500 rounded-t-md hover:bg-blue-600 transition-all" 
                      :style="{ height: `${(day.visitors / maxVisitors()) * 100}%` }"
                    ></div>
                    <div class="text-xs text-gray-500 mt-2">{{ day.day }}</div>
                    <div class="text-xs font-medium text-gray-700">{{ formatNumber(day.visitors) }}</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-6 flex items-center justify-between">
              <div>
                <span class="text-lg font-bold text-gray-900">{{ formatNumber(visitorStats.totalVisitors) }}</span>
                <span class="ml-2 text-sm text-gray-500">total visitors this period</span>
              </div>
              <button type="button" class="text-sm font-medium text-purple-600 hover:text-purple-500">
                View detailed report
              </button>
            </div>
          </div>
        </div>

        <!-- Traffic Sources - 1 column -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Traffic Sources</h2>
          </div>
          <div class="p-6">
            <div class="space-y-4">
              <div v-for="(source, index) in trafficSources" :key="index" class="flex flex-col">
                <div class="flex justify-between items-center mb-2">
                  <span class="text-sm font-medium text-gray-900">{{ source.name }}</span>
                  <span class="text-sm font-medium text-gray-900">{{ source.value }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                  <div 
                    class="h-2.5 rounded-full" 
                    :class="source.color" 
                    :style="{ width: source.value + '%' }"
                  ></div>
                </div>
              </div>
            </div>
            <div class="mt-6 border-t border-gray-200 pt-4">
              <button type="button" class="text-sm font-medium text-purple-600 hover:text-purple-500">
                View all sources
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Top Pages and Conversion Metrics -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Top Pages - 2 columns -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Top Pages</h2>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Page
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Views
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Avg. Time
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Bounce Rate
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="page in topPages" :key="page.id" class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ page.title }}</div>
                    <div class="text-sm text-gray-500">{{ page.path }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ formatNumber(page.views) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ page.avgTime }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ page.bounceRate }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <button type="button" class="text-sm font-medium text-purple-600 hover:text-purple-500">
              View all pages
            </button>
          </div>
        </div>

        <!-- Conversion Metrics - 1 column -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Conversion Metrics</h2>
          </div>
          <div class="p-6">
            <div class="space-y-6">
              <div v-for="(metric, index) in conversionMetrics" :key="index" class="flex flex-col">
                <div class="flex justify-between items-center mb-1">
                  <span class="text-sm font-medium text-gray-900">{{ metric.name }}</span>
                  <span class="text-sm font-medium text-gray-900">{{ metric.rate }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-1.5 mb-1">
                  <div 
                    class="h-1.5 rounded-full" 
                    :class="metric.color" 
                    :style="{ width: parseFloat(metric.rate) * 10 + '%' }"
                  ></div>
                </div>
                <div class="flex justify-between items-center">
                  <span class="text-xs text-gray-500">{{ formatNumber(metric.value) }} conversions</span>
                  <span 
                    :class="metric.change >= 0 ? 'text-green-600' : 'text-red-600'"
                    class="text-xs font-semibold"
                  >
                    <span v-if="metric.change >= 0">+</span>{{ metric.change }}%
                  </span>
                </div>
              </div>
            </div>
            <div class="mt-6 border-t border-gray-200 pt-4">
              <button type="button" class="text-sm font-medium text-purple-600 hover:text-purple-500">
                View conversion details
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Export Reports Section -->
      <div class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Analytics Reports</h2>
        </div>
        <div class="p-6">
          <p class="text-gray-500 mb-4">
            Export detailed analytics reports for your records or to share with your team.
          </p>
          <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <button
              type="button"
              class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            >
              <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              Traffic Report (PDF)
            </button>
            <button
              type="button"
              class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            >
              <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              Conversion Report (PDF)
            </button>
            <button
              type="button"
              class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            >
              <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              Campaign Performance (PDF)
            </button>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template> 