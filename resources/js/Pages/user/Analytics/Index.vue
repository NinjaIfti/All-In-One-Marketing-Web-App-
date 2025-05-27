<template>
  <UserLayout title="Analytics Dashboard">
    <div class="container mx-auto px-4 py-6">
      <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Analytics Dashboard</h1>
        <p class="text-gray-600">Monitor your marketing activities and performance.</p>
        
        <!-- Timeframe Selector -->
        <div class="mt-4 flex items-center">
          <label class="mr-3 text-sm font-medium text-gray-700">Time period:</label>
          <select 
            v-model="selectedTimeframe"
            @change="changeTimeframe"
            class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
          >
            <option :value="7">Last 7 days</option>
            <option :value="30">Last 30 days</option>
            <option :value="90">Last 90 days</option>
          </select>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <StatCard 
          title="Total Activities" 
          :value="activityData.total" 
          icon="chart-bar"
          color="bg-blue-600"
        />
        <StatCard 
          title="Login Count" 
          :value="loginData.total" 
          icon="lock-open"
          color="bg-green-600"
        />
        <StatCard 
          title="Campaign Opens" 
          :value="calculateTotalCampaignEvents('open')" 
          icon="mail-open"
          color="bg-purple-600"
        />
        <StatCard 
          title="Campaign Clicks" 
          :value="calculateTotalCampaignEvents('click')" 
          icon="cursor-click" 
          color="bg-orange-600"
        />
      </div>

      <!-- Activity Charts -->
      <div class="mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2">
        <div class="rounded-lg bg-white p-6 shadow">
          <h2 class="mb-4 text-lg font-medium text-gray-900">User Activity</h2>
          <LineChart 
            :chart-data="activityChartData" 
            :options="activityChartOptions"
          />
        </div>
        <div class="rounded-lg bg-white p-6 shadow">
          <h2 class="mb-4 text-lg font-medium text-gray-900">Activity by Type</h2>
          <DoughnutChart 
            :chart-data="activityTypeChartData"
            :options="activityTypeChartOptions" 
          />
        </div>
      </div>

      <!-- Recent Activity Table -->
      <div class="mt-8 rounded-lg bg-white p-6 shadow">
        <h2 class="mb-4 text-lg font-medium text-gray-900">Recent Activity</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Action</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Date</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr v-for="activity in activityData.recent" :key="activity.id">
                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">{{ formatActionName(activity.action) }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ activity.description }}</td>
                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ formatDate(activity.created_at) }}</td>
              </tr>
              <tr v-if="!activityData.recent || activityData.recent.length === 0">
                <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">No recent activity found</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </UserLayout>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import StatCard from '@/Components/StatCard.vue';
import LineChart from '@/Components/Charts/LineChart.vue';
import DoughnutChart from '@/Components/Charts/DoughnutChart.vue';
import dayjs from 'dayjs';

const props = defineProps({
  activityData: Object,
  loginData: Object,
  timeframe: {
    type: Number,
    default: 30
  }
});

const selectedTimeframe = ref(props.timeframe);

// Function to change timeframe
const changeTimeframe = () => {
  router.get(route('user.analytics'), { 
    timeframe: selectedTimeframe.value 
  }, {
    preserveState: true,
    preserveScroll: true
  });
};

// Chart data
const activityChartData = computed(() => {
  if (!props.activityData || !props.activityData.byDay) return { labels: [], datasets: [] };
  
  const dates = Object.keys(props.activityData.byDay);
  const values = Object.values(props.activityData.byDay);
  
  return {
    labels: dates.map(date => dayjs(date).format('MMM D')),
    datasets: [
      {
        label: 'User Activity',
        data: values,
        borderColor: '#3b82f6',
        backgroundColor: 'rgba(59, 130, 246, 0.1)',
        tension: 0.3,
        fill: true
      }
    ]
  };
});

const activityChartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    y: {
      beginAtZero: true,
      ticks: {
        precision: 0
      }
    }
  }
};

const activityTypeChartData = computed(() => {
  if (!props.activityData || !props.activityData.byType) return { labels: [], datasets: [] };
  
  const types = Object.keys(props.activityData.byType).map(type => formatActionName(type));
  const values = Object.values(props.activityData.byType);
  
  return {
    labels: types,
    datasets: [
      {
        data: values,
        backgroundColor: [
          '#3b82f6', // blue
          '#10b981', // green
          '#8b5cf6', // purple
          '#f59e0b', // amber
          '#ef4444', // red
          '#6366f1', // indigo
          '#ec4899'  // pink
        ]
      }
    ]
  };
});

const activityTypeChartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      position: 'right'
    }
  }
};

// Helper functions
const formatActionName = (action) => {
  return action
    .replace(/_/g, ' ')
    .split(' ')
    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
    .join(' ');
};

const formatDate = (dateString) => {
  return dayjs(dateString).format('MMM D, YYYY h:mm A');
};

const calculateTotalCampaignEvents = (type) => {
  if (!props.activityData || !props.activityData.byType) return 0;
  
  return props.activityData.byType[`campaign_${type}`] || 0;
};
</script> 