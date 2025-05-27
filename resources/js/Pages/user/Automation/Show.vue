<template>
  <UserLayout :title="`Automation: ${automation.name}`">
    <div class="container mx-auto px-4 py-6">
      <div class="mb-6 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">{{ automation.name }}</h1>
          <p class="text-gray-600">{{ automation.description }}</p>
        </div>
        <div class="flex space-x-3">
          <Link 
            :href="route('user.automations.edit', automation.id)"
            class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
          >
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
          </Link>
          <button 
            v-if="automation.status === 'draft'"
            @click="changeStatus('active')"
            class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
          >
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
            </svg>
            Activate
          </button>
          <button 
            v-if="automation.status === 'active'"
            @click="changeStatus('paused')"
            class="inline-flex items-center rounded-md bg-yellow-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
          >
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Pause
          </button>
          <button 
            v-if="automation.status === 'paused'"
            @click="changeStatus('active')"
            class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
          >
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
            </svg>
            Resume
          </button>
        </div>
      </div>

      <!-- Overview Card -->
      <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="col-span-2 overflow-hidden rounded-lg bg-white shadow">
          <div class="px-4 py-5 sm:px-6">
            <h2 class="text-lg font-medium text-gray-900">Automation Overview</h2>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Details and status of your automation.</p>
          </div>
          <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
              <div>
                <dt class="text-sm font-medium text-gray-500">Status</dt>
                <dd class="mt-1">
                  <span 
                    class="inline-flex items-center rounded-full px-3 py-0.5 text-sm font-medium" 
                    :class="getStatusClass(automation.status)"
                  >
                    {{ formatStatus(automation.status) }}
                  </span>
                </dd>
              </div>
              <div>
                <dt class="text-sm font-medium text-gray-500">Type</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ formatType(automation.type) }}</dd>
              </div>
              <div>
                <dt class="text-sm font-medium text-gray-500">Created</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ automation.created_at }}</dd>
              </div>
              <div>
                <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ automation.updated_at }}</dd>
              </div>
              <div>
                <dt class="text-sm font-medium text-gray-500">Last Execution</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ automation.last_execution || 'Never' }}</dd>
              </div>
              <div>
                <dt class="text-sm font-medium text-gray-500">Next Execution</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ automation.next_scheduled_execution || 'Not scheduled' }}</dd>
              </div>
            </dl>
          </div>
        </div>

        <!-- Stats Cards -->
        <div class="space-y-6">
          <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="p-5">
              <div class="flex items-center">
                <div class="flex-shrink-0 rounded-md bg-green-500 p-3">
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                  <dl>
                    <dt class="truncate text-sm font-medium text-gray-500">Active Contacts</dt>
                    <dd>
                      <div class="text-lg font-medium text-gray-900">{{ automation.active_contacts }}</div>
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="p-5">
              <div class="flex items-center">
                <div class="flex-shrink-0 rounded-md bg-blue-500 p-3">
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                  <dl>
                    <dt class="truncate text-sm font-medium text-gray-500">Completed Contacts</dt>
                    <dd>
                      <div class="text-lg font-medium text-gray-900">{{ automation.completed_contacts }}</div>
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Triggers -->
      <div class="mb-6 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
          <h2 class="text-lg font-medium text-gray-900">Triggers</h2>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">Conditions that start this automation.</p>
        </div>
        <div class="border-t border-gray-200">
          <div v-if="automation.triggers && automation.triggers.length > 0" class="divide-y divide-gray-200">
            <div v-for="(trigger, index) in automation.triggers" :key="index" class="px-4 py-4 sm:px-6">
              <div class="flex items-center">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-sm font-medium text-blue-800">
                  {{ index + 1 }}
                </div>
                <div class="ml-4">
                  <h4 class="text-sm font-medium text-gray-900">{{ formatTriggerType(trigger.type) }}</h4>
                  <p class="text-sm text-gray-500">{{ trigger.value }}</p>
                </div>
              </div>
            </div>
          </div>
          <div v-else class="px-4 py-5 text-center sm:px-6">
            <p class="text-sm text-gray-500">No triggers defined.</p>
          </div>
        </div>
      </div>

      <!-- Steps -->
      <div class="overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
          <h2 class="text-lg font-medium text-gray-900">Workflow Steps</h2>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">The sequence of actions in this automation.</p>
        </div>
        <div class="border-t border-gray-200">
          <div v-if="automation.steps && automation.steps.length > 0" class="divide-y divide-gray-200">
            <div v-for="(step, index) in automation.steps" :key="index" class="px-4 py-4 sm:px-6">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-sm font-medium text-blue-800">
                    {{ index + 1 }}
                  </div>
                  <div class="ml-4">
                    <h4 class="text-sm font-medium text-gray-900">{{ step.name }}</h4>
                    <p class="text-sm text-gray-500">{{ formatStepType(step.type) }}</p>
                  </div>
                </div>
                <div>
                  <span 
                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium" 
                    :class="step.is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                  >
                    {{ step.is_active ? 'Active' : 'Inactive' }}
                  </span>
                </div>
              </div>
              
              <div class="mt-3 flex justify-between text-sm">
                <div class="flex space-x-4">
                  <div>
                    <span class="text-gray-500">Succeeded:</span>
                    <span class="font-medium text-green-600">{{ step.succeeded_count }}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Failed:</span>
                    <span class="font-medium text-red-600">{{ step.failed_count }}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Skipped:</span>
                    <span class="font-medium text-yellow-600">{{ step.skipped_count }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div v-else class="px-4 py-5 text-center sm:px-6">
            <p class="text-sm text-gray-500">No steps defined.</p>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';

const props = defineProps({
  automation: Object
});

const changeStatus = (status) => {
  router.put(route('user.automations.status', props.automation.id), {
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

const formatTriggerType = (type) => {
  switch (type) {
    case 'tag':
      return 'Contact Tag';
    case 'event':
      return 'Event';
    case 'form':
      return 'Form Submission';
    case 'segment':
      return 'Segment Membership';
    default:
      return type;
  }
};

const formatStepType = (type) => {
  switch (type) {
    case 'send_email':
      return 'Send Email';
    case 'send_sms':
      return 'Send SMS';
    case 'delay':
      return 'Delay';
    case 'condition':
      return 'Condition';
    case 'update_contact':
      return 'Update Contact';
    case 'webhook':
      return 'Webhook';
    case 'notification':
      return 'Notification';
    case 'custom_action':
      return 'Custom Action';
    default:
      return type;
  }
};
</script> 