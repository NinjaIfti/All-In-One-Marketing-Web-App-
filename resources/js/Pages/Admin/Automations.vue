<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { ref, onMounted } from 'vue';

// Mock data for automations
const automations = ref([
  {
    id: 1,
    name: 'Welcome Series',
    status: 'Active',
    type: 'Email Sequence',
    triggers: ['New Subscriber'],
    steps: 4,
    contacts: 342,
    performance: 87,
    lastModified: 'May 15, 2023'
  },
  {
    id: 2,
    name: 'Abandoned Cart Recovery',
    status: 'Active',
    type: 'Email + SMS',
    triggers: ['Cart Abandoned'],
    steps: 3,
    contacts: 128,
    performance: 64,
    lastModified: 'May 18, 2023'
  },
  {
    id: 3,
    name: 'Re-engagement Campaign',
    status: 'Inactive',
    type: 'Email Sequence',
    triggers: ['Inactivity (30 days)'],
    steps: 2,
    contacts: 0,
    performance: 0,
    lastModified: 'May 10, 2023'
  },
  {
    id: 4,
    name: 'Post-Purchase Follow-up',
    status: 'Active',
    type: 'Email Sequence',
    triggers: ['Order Completed'],
    steps: 5,
    contacts: 215,
    performance: 92,
    lastModified: 'May 22, 2023'
  },
  {
    id: 5,
    name: 'Birthday Rewards',
    status: 'Draft',
    type: 'Email + SMS',
    triggers: ['Birthday'],
    steps: 2,
    contacts: 0,
    performance: 0,
    lastModified: 'May 24, 2023'
  }
]);

// Filters
const filters = ref({
  status: 'all',
  type: 'all',
  search: ''
});

// Selected automations for bulk actions
const selectedAutomations = ref([]);

// Toggle all selection
const toggleSelectAll = () => {
  if (selectedAutomations.value.length === automations.value.length) {
    selectedAutomations.value = [];
  } else {
    selectedAutomations.value = automations.value.map(automation => automation.id);
  }
};

// Check if all automations are selected
const allSelected = () => selectedAutomations.value.length === automations.value.length;

// Filter automations based on current filters
const filteredAutomations = () => {
  return automations.value.filter(automation => {
    // Status filter
    if (filters.value.status !== 'all' && automation.status !== filters.value.status) {
      return false;
    }
    
    // Type filter
    if (filters.value.type !== 'all' && automation.type !== filters.value.type) {
      return false;
    }
    
    // Search filter
    if (filters.value.search && !automation.name.toLowerCase().includes(filters.value.search.toLowerCase())) {
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
    case 'Inactive':
      return 'bg-gray-100 text-gray-800';
    case 'Draft':
      return 'bg-yellow-100 text-yellow-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
};

// Clear all filters
const clearFilters = () => {
  filters.value = {
    status: 'all',
    type: 'all',
    search: ''
  };
};

onMounted(() => {
  // This would normally fetch data from an API
});
</script>

<template>
  <Head title="Automations" />

  <AdminLayout>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Automations</h1>
          <p class="mt-1 text-gray-500">Create and manage marketing automations</p>
        </div>
        <div class="mt-4 md:mt-0">
          <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Create Automation
          </button>
        </div>
      </div>

      <!-- Filters and Search -->
      <div class="bg-white shadow rounded-lg mb-6">
        <div class="p-4 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Filters</h2>
        </div>
        <div class="p-4">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
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
                    placeholder="Search automations"
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
                <option value="Inactive">Inactive</option>
                <option value="Draft">Draft</option>
              </select>
            </div>
            
            <!-- Type Filter -->
            <div>
              <label for="type" class="block text-sm font-medium text-gray-700">Automation Type</label>
              <select
                id="type"
                v-model="filters.type"
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
              >
                <option value="all">All Types</option>
                <option value="Email Sequence">Email Sequence</option>
                <option value="Email + SMS">Email + SMS</option>
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

      <!-- Automations Table -->
      <div class="bg-white shadow overflow-hidden rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Automation List</h2>
          <div class="flex space-x-2">
            <button
              type="button"
              class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
              :disabled="selectedAutomations.length === 0"
            >
              <svg class="-ml-1 mr-1 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
              </svg>
              Duplicate
            </button>
            <button
              type="button"
              class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
              :disabled="selectedAutomations.length === 0"
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
                  Automation
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Type
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Triggers
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Performance
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Last Modified
                </th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="automation in filteredAutomations()" :key="automation.id" class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <input
                      type="checkbox"
                      :value="automation.id"
                      v-model="selectedAutomations"
                      class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded"
                    />
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ automation.name }}</div>
                  <div class="text-sm text-gray-500">{{ automation.steps }} steps</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ automation.type }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-md"
                    :class="getStatusClass(automation.status)"
                  >
                    {{ automation.status }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex flex-wrap gap-1">
                    <span
                      v-for="trigger in automation.triggers"
                      :key="trigger"
                      class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800"
                    >
                      {{ trigger }}
                    </span>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div v-if="automation.status === 'Active'" class="flex items-center">
                    <div class="mr-2 flex-shrink-0">
                      <div class="w-16 bg-gray-200 rounded-full h-1.5">
                        <div
                          class="bg-green-500 h-1.5 rounded-full"
                          :style="{ width: `${automation.performance}%` }"
                        ></div>
                      </div>
                    </div>
                    <span class="text-sm text-gray-900">{{ automation.performance }}%</span>
                  </div>
                  <div v-else class="text-sm text-gray-500">-</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ automation.lastModified }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button type="button" class="text-purple-600 hover:text-purple-900 mr-3">Edit</button>
                  <button type="button" class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                  <button type="button" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
              </tr>
              
              <!-- Empty state -->
              <tr v-if="filteredAutomations().length === 0">
                <td colspan="8" class="px-6 py-10 text-center">
                  <p class="text-gray-500">No automations found matching your filters</p>
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
      </div>

      <!-- Automation Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Total Automations</dt>
                  <dd class="text-2xl font-bold text-gray-900">{{ automations.length }}</dd>
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
                  <dt class="text-sm font-medium text-gray-500 truncate">Active Automations</dt>
                  <dd class="text-2xl font-bold text-gray-900">{{ automations.filter(a => a.status === 'Active').length }}</dd>
                </dl>
              </div>
            </div>
          </div>
          <div class="bg-green-600 h-1 w-full"></div>
        </div>
        
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                <svg class="h-6 w-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Contacts in Automations</dt>
                  <dd class="text-2xl font-bold text-gray-900">{{ automations.reduce((sum, a) => sum + a.contacts, 0) }}</dd>
                </dl>
              </div>
            </div>
          </div>
          <div class="bg-purple-600 h-1 w-full"></div>
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
                  <dt class="text-sm font-medium text-gray-500 truncate">Avg. Performance</dt>
                  <dd class="text-2xl font-bold text-gray-900">
                    {{ Math.round(automations.filter(a => a.status === 'Active').reduce((sum, a) => sum + a.performance, 0) / automations.filter(a => a.status === 'Active').length) }}%
                  </dd>
                </dl>
              </div>
            </div>
          </div>
          <div class="bg-yellow-600 h-1 w-full"></div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template> 