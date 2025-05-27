<template>
  <UserLayout title="Marketing Automation">
    <div class="container mx-auto px-4 py-6">
      <div class="mb-6 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Marketing Automation</h1>
          <p class="text-gray-600">Create and manage automated marketing workflows</p>
        </div>
        <div>
          <Link 
            :href="route('user.automations.create')" 
            class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
          >
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Create Automation
          </Link>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <StatCard 
          title="Total Automations" 
          :value="stats.total" 
          icon="chart-bar"
          color="bg-blue-600"
        />
        <StatCard 
          title="Active Automations" 
          :value="stats.active" 
          icon="play"
          color="bg-green-600"
        />
        <StatCard 
          title="Draft Automations" 
          :value="stats.draft" 
          icon="document"
          color="bg-yellow-600"
        />
        <StatCard 
          title="Paused Automations" 
          :value="stats.paused" 
          icon="pause"
          color="bg-orange-600"
        />
      </div>

      <!-- Automations Table -->
      <div class="overflow-hidden rounded-lg bg-white shadow">
        <div class="p-6">
          <h2 class="mb-4 text-lg font-medium text-gray-900">Your Automations</h2>
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Type</th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Steps</th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Contacts</th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Last Run</th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="automation in automations" :key="automation.id" class="hover:bg-gray-50">
                  <td class="px-6 py-4 text-sm">
                    <div class="text-sm font-medium text-gray-900">{{ automation.name }}</div>
                    <div class="text-sm text-gray-500">{{ truncate(automation.description, 50) }}</div>
                  </td>
                  <td class="px-6 py-4 text-sm">
                    <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800">
                      {{ formatType(automation.type) }}
                    </span>
                  </td>
                  <td class="px-6 py-4 text-sm">
                    <span 
                      class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium" 
                      :class="getStatusClass(automation.status)"
                    >
                      {{ formatStatus(automation.status) }}
                    </span>
                  </td>
                  <td class="px-6 py-4 text-sm">{{ automation.steps_count }}</td>
                  <td class="px-6 py-4 text-sm">
                    <div>Active: {{ automation.active_contacts }}</div>
                    <div>Completed: {{ automation.completed_contacts }}</div>
                  </td>
                  <td class="px-6 py-4 text-sm">{{ automation.last_execution || 'Never' }}</td>
                  <td class="px-6 py-4 text-sm">
                    <div class="flex space-x-2">
                      <Link 
                        :href="route('user.automations.edit', automation.id)"
                        class="text-blue-600 hover:text-blue-900"
                      >
                        Edit
                      </Link>
                      <button 
                        v-if="automation.status === 'draft'"
                        @click="changeStatus(automation.id, 'active')"
                        class="text-green-600 hover:text-green-900"
                      >
                        Activate
                      </button>
                      <button 
                        v-if="automation.status === 'active'"
                        @click="changeStatus(automation.id, 'paused')"
                        class="text-orange-600 hover:text-orange-900"
                      >
                        Pause
                      </button>
                      <button 
                        v-if="automation.status === 'paused'"
                        @click="changeStatus(automation.id, 'active')"
                        class="text-green-600 hover:text-green-900"
                      >
                        Resume
                      </button>
                      <button 
                        @click="confirmDelete(automation)"
                        class="text-red-600 hover:text-red-900"
                      >
                        Delete
                      </button>
                    </div>
                  </td>
                </tr>
                <tr v-if="automations.length === 0">
                  <td colspan="7" class="py-8 text-center">
                    <p class="text-gray-500">You haven't created any automations yet.</p>
                    <Link 
                      :href="route('user.automations.create')"
                      class="mt-2 inline-flex items-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                      Create your first automation
                    </Link>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Empty State -->
      <div v-if="automations.length === 0" class="mt-12 flex flex-col items-center">
        <div class="rounded-full bg-blue-100 p-6">
          <svg class="h-12 w-12 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
          </svg>
        </div>
        <h3 class="mt-4 text-lg font-medium text-gray-900">Start automating your marketing</h3>
        <p class="mt-2 max-w-md text-center text-gray-500">Create email sequences, follow-ups, and nurture campaigns that run on autopilot.</p>
      </div>
    </div>
  </UserLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import StatCard from '@/Components/StatCard.vue';

const props = defineProps({
  automations: Array,
  stats: Object
});

const confirmDelete = (automation) => {
  if (confirm(`Are you sure you want to delete the automation "${automation.name}"?`)) {
    router.delete(route('user.automations.destroy', automation.id));
  }
};

const changeStatus = (id, status) => {
  router.put(route('user.automations.status', id), {
    status: status
  });
};

const getStatusClass = (status) => {
  switch (status) {
    case 'active':
      return 'bg-green-100 text-green-800';
    case 'paused':
      return 'bg-yellow-100 text-yellow-800';
    case 'draft':
      return 'bg-gray-100 text-gray-800';
    case 'completed':
      return 'bg-blue-100 text-blue-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
};

const formatStatus = (status) => {
  return status.charAt(0).toUpperCase() + status.slice(1);
};

const formatType = (type) => {
  switch (type) {
    case 'email':
      return 'Email';
    case 'sms':
      return 'SMS';
    case 'mixed':
      return 'Email + SMS';
    case 'custom':
      return 'Custom';
    default:
      return type;
  }
};

const truncate = (text, length) => {
  if (!text) return '';
  return text.length > length ? text.substring(0, length) + '...' : text;
};
</script> 