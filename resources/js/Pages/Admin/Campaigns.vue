<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { ref, onMounted } from 'vue';

// Mock data for campaigns
const campaigns = ref([
  {
    id: 1,
    name: 'Summer Collection Launch',
    type: 'Email',
    status: 'Active',
    sent: 3450,
    opens: 1450,
    clicks: 385,
    dateCreated: 'May 22, 2023',
    dateSent: 'May 22, 2023',
    progress: 68
  },
  {
    id: 2,
    name: 'Flash Sale Notification',
    type: 'SMS',
    status: 'Completed',
    sent: 5200,
    opens: 3245,
    clicks: 1106,
    dateCreated: 'May 15, 2023',
    dateSent: 'May 18, 2023',
    progress: 100
  },
  {
    id: 3,
    name: 'Customer Feedback Survey',
    type: 'Email',
    status: 'Draft',
    sent: 0,
    opens: 0,
    clicks: 0,
    dateCreated: 'May 20, 2023',
    dateSent: null,
    progress: 0
  },
  {
    id: 4,
    name: 'New Product Announcement',
    type: 'Email',
    status: 'Scheduled',
    sent: 0,
    opens: 0,
    clicks: 0,
    dateCreated: 'May 19, 2023',
    dateSent: 'May 25, 2023',
    progress: 0
  },
  {
    id: 5,
    name: 'Abandoned Cart Reminder',
    type: 'SMS',
    status: 'Active',
    sent: 1250,
    opens: 875,
    clicks: 320,
    dateCreated: 'May 21, 2023',
    dateSent: 'May 23, 2023',
    progress: 45
  }
]);

// Filters
const filters = ref({
  status: 'all',
  type: 'all',
  search: '',
  dateRange: 'all'
});

// Pagination
const pagination = ref({
  currentPage: 1,
  perPage: 10,
  total: 5
});

// Selected campaigns for bulk actions
const selectedCampaigns = ref([]);

// Toggle all selection
const toggleSelectAll = () => {
  if (selectedCampaigns.value.length === campaigns.value.length) {
    selectedCampaigns.value = [];
  } else {
    selectedCampaigns.value = campaigns.value.map(campaign => campaign.id);
  }
};

// Check if all campaigns are selected
const allSelected = () => selectedCampaigns.value.length === campaigns.value.length;

// Filter campaigns based on current filters
const filteredCampaigns = () => {
  return campaigns.value.filter(campaign => {
    // Status filter
    if (filters.value.status !== 'all' && campaign.status !== filters.value.status) {
      return false;
    }
    
    // Type filter
    if (filters.value.type !== 'all' && campaign.type !== filters.value.type) {
      return false;
    }
    
    // Search filter
    if (filters.value.search && !campaign.name.toLowerCase().includes(filters.value.search.toLowerCase())) {
      return false;
    }
    
    return true;
  });
};

// Get status color class
const getStatusClass = (status) => {
  switch(status) {
    case 'Active':
      return 'bg-green-100 text-green-800';
    case 'Completed':
      return 'bg-blue-100 text-blue-800';
    case 'Draft':
      return 'bg-gray-100 text-gray-800';
    case 'Scheduled':
      return 'bg-yellow-100 text-yellow-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
};

// Get progress color class
const getProgressClass = (status) => {
  switch(status) {
    case 'Active':
      return 'bg-green-500';
    case 'Completed':
      return 'bg-blue-500';
    case 'Draft':
      return 'bg-gray-500';
    case 'Scheduled':
      return 'bg-yellow-500';
    default:
      return 'bg-gray-500';
  }
};

// Clear all filters
const clearFilters = () => {
  filters.value = {
    status: 'all',
    type: 'all',
    search: '',
    dateRange: 'all'
  };
};

onMounted(() => {
  // This would normally fetch data from an API
});
</script>

<template>
  <Head title="Campaigns" />

  <AdminLayout>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Campaigns</h1>
          <p class="mt-1 text-gray-500">Create and manage your email and SMS campaigns</p>
        </div>
        <div class="mt-4 md:mt-0">
          <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Create Campaign
          </button>
        </div>
      </div>

      <!-- Filters and Search -->
      <div class="bg-white shadow rounded-lg mb-6">
        <div class="p-4 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Filters</h2>
        </div>
        <div class="p-4">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Search -->
            <div>
              <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
              <div class="mt-1 flex rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                  </div>
                  <input
                    type="text"
                    id="search"
                    v-model="filters.search"
                    class="focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md"
                    placeholder="Search campaigns"
                  />
                </div>
              </div>
            </div>
            
            <!-- Status Filter -->
            <div>
              <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
              <select
                id="status"
                v-model="filters.status"
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
              >
                <option value="all">All Statuses</option>
                <option value="Active">Active</option>
                <option value="Completed">Completed</option>
                <option value="Draft">Draft</option>
                <option value="Scheduled">Scheduled</option>
              </select>
            </div>
            
            <!-- Type Filter -->
            <div>
              <label for="type" class="block text-sm font-medium text-gray-700">Campaign Type</label>
              <select
                id="type"
                v-model="filters.type"
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
              >
                <option value="all">All Types</option>
                <option value="Email">Email</option>
                <option value="SMS">SMS</option>
              </select>
            </div>
            
            <!-- Date Range Filter -->
            <div>
              <label for="dateRange" class="block text-sm font-medium text-gray-700">Date Range</label>
              <select
                id="dateRange"
                v-model="filters.dateRange"
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
              >
                <option value="all">All Time</option>
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
                <option value="quarter">This Quarter</option>
              </select>
            </div>
          </div>
          
          <div class="mt-4 flex justify-end">
            <button
              type="button"
              @click="clearFilters"
              class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            >
              Clear Filters
            </button>
          </div>
        </div>
      </div>

      <!-- Campaigns Table -->
      <div class="bg-white shadow overflow-hidden rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Campaign List</h2>
          <div class="flex space-x-2">
            <button
              type="button"
              class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
              :disabled="selectedCampaigns.length === 0"
            >
              <svg class="-ml-1 mr-1 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
              </svg>
              Duplicate
            </button>
            <button
              type="button"
              class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
              :disabled="selectedCampaigns.length === 0"
            >
              <svg class="-ml-1 mr-1 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              Delete
            </button>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  <div class="flex items-center">
                    <input
                      type="checkbox"
                      :checked="allSelected()"
                      @change="toggleSelectAll"
                      class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded"
                    />
                  </div>
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Campaign
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Type
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Performance
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Date
                </th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="campaign in filteredCampaigns()" :key="campaign.id" class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <input
                      type="checkbox"
                      :value="campaign.id"
                      v-model="selectedCampaigns"
                      class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded"
                    />
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ campaign.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-md"
                    :class="campaign.type === 'Email' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800'"
                  >
                    {{ campaign.type }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-md"
                    :class="getStatusClass(campaign.status)"
                  >
                    {{ campaign.status }}
                  </span>
                </td>
                <td class="px-6 py-4">
                  <div class="space-y-2">
                    <div class="flex justify-between">
                      <span class="text-xs font-medium text-gray-500">Progress</span>
                      <span class="text-xs font-medium text-gray-900">{{ campaign.progress }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-1.5">
                      <div
                        class="h-1.5 rounded-full"
                        :class="getProgressClass(campaign.status)"
                        :style="{ width: campaign.progress + '%' }"
                      ></div>
                    </div>
                    <div class="flex items-center space-x-4 text-xs">
                      <span class="flex items-center text-gray-500">
                        <span class="font-medium text-gray-900 mr-1">{{ campaign.sent }}</span> Sent
                      </span>
                      <span class="flex items-center text-gray-500">
                        <span class="font-medium text-gray-900 mr-1">{{ campaign.opens }}</span> Opens
                      </span>
                      <span class="flex items-center text-gray-500">
                        <span class="font-medium text-gray-900 mr-1">{{ campaign.clicks }}</span> Clicks
                      </span>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div>Created: {{ campaign.dateCreated }}</div>
                  <div v-if="campaign.dateSent">Sent: {{ campaign.dateSent }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button type="button" class="text-purple-600 hover:text-purple-900 mr-3">Edit</button>
                  <button type="button" class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                  <button type="button" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
              </tr>
              
              <!-- Empty state -->
              <tr v-if="filteredCampaigns().length === 0">
                <td colspan="7" class="px-6 py-10 text-center">
                  <p class="text-gray-500">No campaigns found matching your filters</p>
                  <button
                    @click="clearFilters"
                    class="mt-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                  >
                    Clear filters
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
          <div class="flex justify-between items-center">
            <div class="text-sm text-gray-700">
              Showing {{ filteredCampaigns().length }} campaigns
            </div>
            <div class="flex-1 flex justify-end">
              <button
                type="button"
                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="pagination.currentPage === 1"
              >
                Previous
              </button>
              <button
                type="button"
                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="filteredCampaigns().length < pagination.perPage"
              >
                Next
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Campaign Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Total Campaigns</dt>
                  <dd class="text-2xl font-bold text-gray-900">{{ campaigns.length }}</dd>
                </dl>
              </div>
            </div>
          </div>
          <div class="bg-blue-600 h-1 w-full"></div>
        </div>
        
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Active Campaigns</dt>
                  <dd class="text-2xl font-bold text-gray-900">{{ campaigns.filter(c => c.status === 'Active').length }}</dd>
                </dl>
              </div>
            </div>
          </div>
          <div class="bg-green-600 h-1 w-full"></div>
        </div>
        
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Scheduled</dt>
                  <dd class="text-2xl font-bold text-gray-900">{{ campaigns.filter(c => c.status === 'Scheduled').length }}</dd>
                </dl>
              </div>
            </div>
          </div>
          <div class="bg-yellow-600 h-1 w-full"></div>
        </div>
        
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                <svg class="h-6 w-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Avg. Open Rate</dt>
                  <dd class="text-2xl font-bold text-gray-900">42.8%</dd>
                </dl>
              </div>
            </div>
          </div>
          <div class="bg-purple-600 h-1 w-full"></div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template> 