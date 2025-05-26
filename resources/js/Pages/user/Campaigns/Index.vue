<script setup>
import { Head, Link } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import { ref, computed } from 'vue';

const props = defineProps({
  campaigns: Array
});

// Filter options
const statusFilter = ref('all');
const searchQuery = ref('');

// Computed property for filtered campaigns
const filteredCampaigns = computed(() => {
  return props.campaigns.filter(campaign => {
    // Filter by status
    if (statusFilter.value !== 'all' && campaign.status !== statusFilter.value) {
      return false;
    }
    
    // Filter by search query
    if (searchQuery.value && !campaign.name.toLowerCase().includes(searchQuery.value.toLowerCase())) {
      return false;
    }
    
    return true;
  });
});

// Get status badge class
const getStatusBadgeClass = (status) => {
  switch(status) {
    case 'draft':
      return 'bg-gray-100 text-gray-800';
    case 'scheduled':
      return 'bg-blue-100 text-blue-800';
    case 'sent':
      return 'bg-green-100 text-green-800';
    case 'cancelled':
      return 'bg-red-100 text-red-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
};

// Format status text for display
const formatStatus = (status) => {
  return status.charAt(0).toUpperCase() + status.slice(1);
};
</script>

<template>
  <Head title="Campaigns | PB&J Solutions" />

  <UserLayout>
    <div class="py-6 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-purple-900">Email Campaigns</h1>
            <p class="mt-1 text-gray-600">Create and manage your email marketing campaigns</p>
          </div>
          <Link :href="route('user.campaigns.create')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            New Campaign
          </Link>
        </div>

        <!-- Filters -->
        <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
          <div class="flex items-center space-x-4">
            <label class="text-sm text-gray-600">Filter by status:</label>
            <select v-model="statusFilter" class="rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
              <option value="all">All Campaigns</option>
              <option value="draft">Drafts</option>
              <option value="scheduled">Scheduled</option>
              <option value="sent">Sent</option>
            </select>
          </div>
          <div class="w-full sm:w-64">
            <input type="text" v-model="searchQuery" placeholder="Search campaigns..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
          </div>
        </div>

        <!-- Campaigns List -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <div class="overflow-x-auto w-full">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Campaign
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Open Rate
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Click Rate
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
                <tr v-for="campaign in filteredCampaigns" :key="campaign.id" class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-purple-800">{{ campaign.name }}</div>
                    <div class="text-xs text-gray-500">{{ campaign.subject }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span :class="[getStatusBadgeClass(campaign.status), 'px-2 py-1 text-xs rounded-full']">
                      {{ formatStatus(campaign.status) }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div v-if="campaign.status === 'sent'" class="text-sm text-gray-900">{{ campaign.open_rate }}%</div>
                    <div v-else class="text-sm text-gray-400">-</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div v-if="campaign.status === 'sent'" class="text-sm text-gray-900">{{ campaign.click_rate }}%</div>
                    <div v-else class="text-sm text-gray-400">-</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ campaign.status === 'sent' ? campaign.sent_at : campaign.created_at }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <Link v-if="campaign.status === 'draft' || campaign.status === 'scheduled'" 
                          :href="route('user.campaigns.edit', campaign.id)" 
                          class="text-purple-600 hover:text-purple-900 mr-3">
                      Edit
                    </Link>
                    <Link :href="route('user.campaigns.show', campaign.id)" class="text-blue-600 hover:text-blue-900">
                      View
                    </Link>
                  </td>
                </tr>
                <tr v-if="filteredCampaigns.length === 0">
                  <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                    No campaigns found. Create your first campaign to get started.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Tips Section -->
        <div class="mt-8 bg-gradient-to-r from-purple-600 to-purple-800 rounded-lg shadow-md p-6 text-white">
          <h2 class="text-xl font-semibold mb-2">Campaign Tips</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            <div class="bg-white bg-opacity-10 p-4 rounded-lg">
              <h3 class="font-medium text-lg mb-1">Engaging Subject Lines</h3>
              <p class="text-sm text-purple-100">Create compelling subject lines to improve open rates</p>
            </div>
            <div class="bg-white bg-opacity-10 p-4 rounded-lg">
              <h3 class="font-medium text-lg mb-1">Mobile Optimization</h3>
              <p class="text-sm text-purple-100">Ensure your campaigns look great on all devices</p>
            </div>
            <div class="bg-white bg-opacity-10 p-4 rounded-lg">
              <h3 class="font-medium text-lg mb-1">A/B Testing</h3>
              <p class="text-sm text-purple-100">Test different content to see what works best</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template> 