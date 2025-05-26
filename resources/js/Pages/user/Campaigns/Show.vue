<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import { ref } from 'vue';

const props = defineProps({
  campaign: Object
});

// Format status text for display
const formatStatus = (status) => {
  return status.charAt(0).toUpperCase() + status.slice(1);
};

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

// Cancel scheduled campaign
const cancelSchedule = () => {
  if (confirm('Are you sure you want to cancel this scheduled campaign?')) {
    router.post(route('user.campaigns.cancel', props.campaign.id), {}, {
      onSuccess: () => {
        // Reload the page
        router.reload();
      }
    });
  }
};
</script>

<template>
  <Head :title="`${campaign.name} | PB&J Solutions`" />

  <UserLayout>
    <div class="py-6 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-purple-900">{{ campaign.name }}</h1>
            <p class="mt-1 text-gray-600">Campaign Details</p>
          </div>
          <div class="flex space-x-4">
            <Link :href="route('user.campaigns')" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              Back to Campaigns
            </Link>
            <Link v-if="campaign.status === 'draft' || campaign.status === 'scheduled'" :href="route('user.campaigns.edit', campaign.id)" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              Edit Campaign
            </Link>
          </div>
        </div>

        <!-- Campaign Info Card -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
          <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Campaign Information</h2>
          </div>
          <div class="px-6 py-5">
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
              <div>
                <dt class="text-sm font-medium text-gray-500">Status</dt>
                <dd class="mt-1">
                  <span :class="[getStatusBadgeClass(campaign.status), 'px-2 py-1 text-xs rounded-full']">
                    {{ formatStatus(campaign.status) }}
                  </span>
                </dd>
              </div>

              <div v-if="campaign.status === 'scheduled'">
                <dt class="text-sm font-medium text-gray-500">Scheduled For</dt>
                <dd class="mt-1 text-sm text-gray-900">
                  {{ campaign.scheduled_at }}
                  <button @click="cancelSchedule" class="ml-2 text-xs text-red-600 hover:text-red-800">Cancel</button>
                </dd>
              </div>

              <div v-if="campaign.status === 'sent'">
                <dt class="text-sm font-medium text-gray-500">Sent Date</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ campaign.sent_at }}</dd>
              </div>

              <div v-if="campaign.status === 'sent'">
                <dt class="text-sm font-medium text-gray-500">Recipients</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ campaign.sent_count }}</dd>
              </div>

              <div v-if="campaign.status === 'sent'">
                <dt class="text-sm font-medium text-gray-500">Opens</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ campaign.open_count }} ({{ campaign.open_rate }}%)</dd>
              </div>

              <div v-if="campaign.status === 'sent'">
                <dt class="text-sm font-medium text-gray-500">Clicks</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ campaign.click_count }} ({{ campaign.click_rate }}%)</dd>
              </div>

              <div class="md:col-span-2">
                <dt class="text-sm font-medium text-gray-500">Subject Line</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ campaign.subject }}</dd>
              </div>
            </dl>
          </div>
        </div>

        <!-- Performance Card (if sent) -->
        <div v-if="campaign.status === 'sent'" class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
          <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Campaign Performance</h2>
          </div>
          <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <!-- Open Rate -->
              <div class="bg-gray-50 rounded-lg p-4 text-center">
                <div class="text-3xl font-bold text-purple-600">{{ campaign.open_rate }}%</div>
                <div class="text-sm text-gray-500 mt-1">Open Rate</div>
                <div class="text-xs text-gray-400 mt-1">{{ campaign.open_count }} opens</div>
              </div>
              
              <!-- Click Rate -->
              <div class="bg-gray-50 rounded-lg p-4 text-center">
                <div class="text-3xl font-bold text-blue-600">{{ campaign.click_rate }}%</div>
                <div class="text-sm text-gray-500 mt-1">Click Rate</div>
                <div class="text-xs text-gray-400 mt-1">{{ campaign.click_count }} clicks</div>
              </div>
              
              <!-- Overall Performance -->
              <div class="bg-gray-50 rounded-lg p-4 text-center">
                <div class="text-3xl font-bold text-green-600">
                  <span v-if="campaign.open_rate > 25">Good</span>
                  <span v-else-if="campaign.open_rate > 15">Average</span>
                  <span v-else>Needs Improvement</span>
                </div>
                <div class="text-sm text-gray-500 mt-1">Overall Performance</div>
                <div class="text-xs text-gray-400 mt-1">Based on industry standards</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Email Content Preview -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Email Content</h2>
          </div>
          <div class="p-6">
            <div class="border rounded-lg p-6 max-w-4xl mx-auto bg-gray-50">
              <div class="border-b pb-4 mb-4">
                <div class="text-sm text-gray-500">From: PB&J Solutions &lt;marketing@pbj-solutions.com&gt;</div>
                <div class="text-sm text-gray-500">To: [Subscriber]</div>
                <div class="text-sm text-gray-500">Subject: {{ campaign.subject }}</div>
              </div>
              
              <div class="prose max-w-none" v-html="campaign.content"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template> 