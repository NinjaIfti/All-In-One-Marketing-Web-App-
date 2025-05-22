<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  campaign: {
    type: Object,
    required: true
  }
});

const getStatusColor = (status) => {
  switch(status.toLowerCase()) {
    case 'active': return 'text-green-600';
    case 'completed': return 'text-blue-600';
    case 'scheduled': return 'text-orange-600';
    case 'paused': return 'text-yellow-600';
    case 'draft': return 'text-gray-600';
    default: return 'text-gray-600';
  }
};

const getProgressColor = (progress) => {
  if (progress >= 100) return 'bg-green-500';
  if (progress >= 75) return 'bg-blue-500';
  if (progress >= 50) return 'bg-orange-500';
  if (progress >= 25) return 'bg-yellow-500';
  return 'bg-red-500';
};

const getTypeIcon = (type) => {
  if (type.toLowerCase() === 'email') {
    return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>`;
  }
  return `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
          </svg>`;
};
</script>

<template>
  <div class="bg-white shadow rounded-lg overflow-hidden">
    <div class="p-4">
      <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
          <div class="p-2 rounded-lg" :class="campaign.color === 'orange' ? 'bg-orange-100' : campaign.color === 'green' ? 'bg-green-100' : 'bg-blue-100'">
            <div v-html="getTypeIcon(campaign.type)" class="text-gray-700"></div>
          </div>
          <div class="ml-3">
            <h3 class="text-base font-medium text-gray-900">{{ campaign.name }}</h3>
            <p class="text-sm text-gray-500">{{ campaign.date }}</p>
          </div>
        </div>
        <span :class="getStatusColor(campaign.status)" class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium">
          {{ campaign.status }}
        </span>
      </div>
      
      <div v-if="campaign.status !== 'Scheduled'" class="mt-2">
        <div class="flex justify-between text-xs text-gray-500 mb-1">
          <span>Progress</span>
          <span>{{ campaign.progress }}%</span>
        </div>
        <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
          <div class="h-full rounded-full" :class="getProgressColor(campaign.progress)" :style="{ width: campaign.progress + '%' }"></div>
        </div>
      </div>
      
      <div class="mt-4 grid grid-cols-2 gap-2">
        <div class="text-center p-2 bg-gray-50 rounded">
          <p class="text-xs text-gray-500">Opens</p>
          <p class="font-semibold">{{ campaign.opens.toLocaleString() }}</p>
        </div>
        <div class="text-center p-2 bg-gray-50 rounded">
          <p class="text-xs text-gray-500">Clicks</p>
          <p class="font-semibold">{{ campaign.clicks.toLocaleString() }}</p>
        </div>
      </div>
    </div>
    <div class="border-t border-gray-200 px-4 py-3">
      <button class="text-sm text-orange-500 hover:text-orange-600 font-medium">View Details</button>
    </div>
  </div>
</template> 