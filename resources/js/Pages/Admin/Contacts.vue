<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { ref, onMounted } from 'vue';

// Mock data for contacts
const contacts = ref([
  {
    id: 1,
    name: 'Sarah Johnson',
    email: 'sarah.j@example.com',
    phone: '+1 (555) 123-4567',
    status: 'Active',
    lastActive: '3 days ago',
    tags: ['Customer', 'Newsletter'],
    avatar: '/images/avatars/avatar-1.jpg'
  },
  {
    id: 2,
    name: 'Michael Chen',
    email: 'michael.c@example.com',
    phone: '+1 (555) 987-6543',
    status: 'Active',
    lastActive: '1 day ago',
    tags: ['Lead', 'Webinar'],
    avatar: '/images/avatars/avatar-2.jpg'
  },
  {
    id: 3,
    name: 'Olivia Rodriguez',
    email: 'olivia.r@example.com',
    phone: '+1 (555) 234-5678',
    status: 'Inactive',
    lastActive: '2 weeks ago',
    tags: ['Customer', 'Premium'],
    avatar: '/images/avatars/avatar-3.jpg'
  },
  {
    id: 4,
    name: 'Daniel Kim',
    email: 'daniel.k@example.com',
    phone: '+1 (555) 876-5432',
    status: 'Active',
    lastActive: '5 hours ago',
    tags: ['Lead'],
    avatar: '/images/avatars/avatar-4.jpg'
  },
  {
    id: 5,
    name: 'Emily Wilson',
    email: 'emily.w@example.com',
    phone: '+1 (555) 345-6789',
    status: 'Active',
    lastActive: '1 hour ago',
    tags: ['Customer', 'Event'],
    avatar: '/images/avatars/avatar-5.jpg'
  }
]);

// Filters
const filters = ref({
  status: 'all',
  tags: [],
  search: ''
});

// Available tags for filter
const availableTags = ['Customer', 'Lead', 'Newsletter', 'Webinar', 'Premium', 'Event'];

// Pagination
const pagination = ref({
  currentPage: 1,
  perPage: 10,
  total: 5
});

// Selected contacts for bulk actions
const selectedContacts = ref([]);

// Toggle all selection
const toggleSelectAll = () => {
  if (selectedContacts.value.length === contacts.value.length) {
    selectedContacts.value = [];
  } else {
    selectedContacts.value = contacts.value.map(contact => contact.id);
  }
};

// Check if all contacts are selected
const allSelected = () => selectedContacts.value.length === contacts.value.length;

// Filter contacts based on current filters
const filteredContacts = () => {
  return contacts.value.filter(contact => {
    // Status filter
    if (filters.value.status !== 'all' && contact.status.toLowerCase() !== filters.value.status.toLowerCase()) {
      return false;
    }
    
    // Tags filter
    if (filters.value.tags.length > 0) {
      const hasMatchingTag = contact.tags.some(tag => filters.value.tags.includes(tag));
      if (!hasMatchingTag) return false;
    }
    
    // Search filter
    if (filters.value.search && !contact.name.toLowerCase().includes(filters.value.search.toLowerCase()) &&
        !contact.email.toLowerCase().includes(filters.value.search.toLowerCase())) {
      return false;
    }
    
    return true;
  });
};

// Generate the placeholder avatar URL if no avatar exists
const getAvatarUrl = (contact) => {
  return contact.avatar || `https://ui-avatars.com/api/?name=${encodeURIComponent(contact.name)}&background=0D8ABC&color=fff`;
};

// Toggle tag selection in filter
const toggleTagFilter = (tag) => {
  const index = filters.value.tags.indexOf(tag);
  if (index === -1) {
    filters.value.tags.push(tag);
  } else {
    filters.value.tags.splice(index, 1);
  }
};

// Clear all filters
const clearFilters = () => {
  filters.value = {
    status: 'all',
    tags: [],
    search: ''
  };
};

onMounted(() => {
  // This would normally fetch data from an API
});
</script>

<template>
  <Head title="Contacts" />

  <AdminLayout>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Contacts</h1>
          <p class="mt-1 text-gray-500">Manage your contacts and subscribers</p>
        </div>
        <div class="mt-4 md:mt-0">
          <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Add Contact
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
                    placeholder="Search by name or email"
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
                <option value="all">All</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
            
            <!-- Tags Filter -->
            <div>
              <span class="block text-sm font-medium text-gray-700">Tags</span>
              <div class="mt-1 flex flex-wrap gap-2">
                <button
                  v-for="tag in availableTags"
                  :key="tag"
                  @click="toggleTagFilter(tag)"
                  class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                  :class="filters.tags.includes(tag) ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800 hover:bg-gray-200'"
                >
                  {{ tag }}
                </button>
              </div>
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

      <!-- Contacts Table -->
      <div class="bg-white shadow overflow-hidden rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
          <h2 class="text-lg font-medium text-gray-900">Contact List</h2>
          <div class="flex space-x-2">
            <button
              type="button"
              class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            >
              <svg class="-ml-1 mr-1 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
              </svg>
              Export
            </button>
            <button
              type="button"
              class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            >
              <svg class="-ml-1 mr-1 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
              </svg>
              Import
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
                  Contact
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Tags
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
              <tr v-for="contact in filteredContacts()" :key="contact.id" class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <input
                      type="checkbox"
                      :value="contact.id"
                      v-model="selectedContacts"
                      class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded"
                    />
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full" :src="getAvatarUrl(contact)" alt="" />
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">{{ contact.name }}</div>
                      <div class="text-sm text-gray-500">{{ contact.email }}</div>
                      <div class="text-sm text-gray-500">{{ contact.phone }}</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                    :class="contact.status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                  >
                    {{ contact.status }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex flex-wrap gap-1">
                    <span
                      v-for="tag in contact.tags"
                      :key="tag"
                      class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-800"
                    >
                      {{ tag }}
                    </span>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ contact.lastActive }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button type="button" class="text-purple-600 hover:text-purple-900 mr-3">Edit</button>
                  <button type="button" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
              </tr>
              
              <!-- Empty state -->
              <tr v-if="filteredContacts().length === 0">
                <td colspan="6" class="px-6 py-10 text-center">
                  <p class="text-gray-500">No contacts found matching your filters</p>
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
              Showing {{ filteredContacts().length }} contacts
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
                :disabled="filteredContacts().length < pagination.perPage"
              >
                Next
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template> 