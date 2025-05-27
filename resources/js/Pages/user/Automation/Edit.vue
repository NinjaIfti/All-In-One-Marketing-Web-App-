<template>
  <UserLayout :title="`Edit Automation: ${form.name}`">
    <div class="container mx-auto px-4 py-6">
      <div class="mb-6 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Edit Automation</h1>
          <p class="text-gray-600">Update your automation workflow</p>
        </div>
        <div class="flex space-x-3">
          <button 
            v-if="form.status === 'draft'"
            @click="changeStatus('active')"
            class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
          >
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
            </svg>
            Activate
          </button>
          <button 
            v-if="form.status === 'active'"
            @click="changeStatus('paused')"
            class="inline-flex items-center rounded-md bg-yellow-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
          >
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Pause
          </button>
          <button 
            v-if="form.status === 'paused'"
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
      
      <div class="overflow-hidden rounded-lg bg-white shadow">
        <form @submit.prevent="updateAutomation">
          <div class="p-6">
            <!-- Basic Information -->
            <div class="mb-6">
              <h2 class="mb-4 text-lg font-medium text-gray-900">Basic Information</h2>
              
              <div class="mb-4">
                <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Name</label>
                <input 
                  id="name" 
                  v-model="form.name" 
                  type="text" 
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                />
                <p v-if="errors.name" class="mt-1 text-sm text-red-600">{{ errors.name }}</p>
              </div>
              
              <div class="mb-4">
                <label for="description" class="mb-1 block text-sm font-medium text-gray-700">Description</label>
                <textarea 
                  id="description" 
                  v-model="form.description" 
                  rows="3" 
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                ></textarea>
                <p v-if="errors.description" class="mt-1 text-sm text-red-600">{{ errors.description }}</p>
              </div>
              
              <div class="mb-4">
                <label for="type" class="mb-1 block text-sm font-medium text-gray-700">Automation Type</label>
                <select 
                  id="type" 
                  v-model="form.type" 
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                >
                  <option value="email">Email</option>
                  <option value="sms">SMS</option>
                  <option value="mixed">Email & SMS</option>
                  <option value="custom">Custom</option>
                </select>
                <p v-if="errors.type" class="mt-1 text-sm text-red-600">{{ errors.type }}</p>
              </div>
              
              <div class="mb-4">
                <label class="mb-1 block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1 flex items-center">
                  <span 
                    class="inline-flex items-center rounded-full px-3 py-0.5 text-sm font-medium" 
                    :class="getStatusClass(form.status)"
                  >
                    {{ formatStatus(form.status) }}
                  </span>
                </div>
              </div>
            </div>
            
            <!-- Triggers -->
            <div class="mb-6">
              <h2 class="mb-4 text-lg font-medium text-gray-900">Triggers</h2>
              <p class="mb-4 text-sm text-gray-500">Define when this automation should start.</p>
              
              <div class="mb-4">
                <div v-for="(trigger, index) in form.triggers" :key="index" class="mb-4 rounded-md border border-gray-200 p-4">
                  <div class="mb-3 flex items-center justify-between">
                    <h4 class="text-sm font-medium text-gray-700">Trigger {{ index + 1 }}</h4>
                    <button 
                      type="button"
                      class="text-red-600 hover:text-red-900"
                      @click="removeTrigger(index)"
                    >
                      Remove
                    </button>
                  </div>
                  
                  <div class="mb-3">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Trigger Type</label>
                    <select 
                      v-model="trigger.type" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    >
                      <option value="tag">Contact Tag</option>
                      <option value="event">Event</option>
                      <option value="form">Form Submission</option>
                      <option value="segment">Segment Membership</option>
                    </select>
                  </div>
                  
                  <div v-if="trigger.type === 'tag'">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Tag Name</label>
                    <input 
                      v-model="trigger.value" 
                      type="text" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                    />
                  </div>
                  
                  <div v-if="trigger.type === 'event'">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Event Name</label>
                    <input 
                      v-model="trigger.value" 
                      type="text" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                    />
                  </div>
                  
                  <div v-if="trigger.type === 'form'">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Form ID</label>
                    <input 
                      v-model="trigger.value" 
                      type="text" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                    />
                  </div>
                  
                  <div v-if="trigger.type === 'segment'">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Segment ID</label>
                    <input 
                      v-model="trigger.value" 
                      type="text" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                    />
                  </div>
                </div>
                
                <button 
                  type="button"
                  class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                  @click="addTrigger"
                >
                  <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  Add Trigger
                </button>
              </div>
            </div>
            
            <!-- Steps -->
            <div class="mb-6">
              <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900">Workflow Steps</h2>
                <button 
                  type="button"
                  @click="addStep"
                  class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                  <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  Add Step
                </button>
              </div>
              
              <p class="mb-4 text-sm text-gray-500">Define the steps in your automation workflow.</p>
              
              <div v-if="form.steps.length === 0" class="mb-4 rounded-md border-2 border-dashed border-gray-300 p-6 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No steps</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by adding your first step.</p>
                <div class="mt-6">
                  <button
                    type="button"
                    @click="addStep"
                    class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                  >
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Step
                  </button>
                </div>
              </div>
              
              <div v-else class="space-y-4">
                <div 
                  v-for="(step, index) in form.steps" 
                  :key="index" 
                  class="rounded-md border border-gray-200 bg-white p-4 shadow-sm"
                >
                  <div class="mb-3 flex items-center justify-between">
                    <div class="flex items-center">
                      <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-sm font-medium text-blue-800">
                        {{ index + 1 }}
                      </div>
                      <h4 class="ml-3 text-sm font-medium text-gray-900">{{ step.name }}</h4>
                    </div>
                    <div class="flex items-center">
                      <button 
                        type="button" 
                        class="mr-2 text-gray-400 hover:text-gray-500"
                        @click="moveStepUp(index)"
                        :disabled="index === 0"
                      >
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                      </button>
                      <button 
                        type="button" 
                        class="mr-2 text-gray-400 hover:text-gray-500"
                        @click="moveStepDown(index)"
                        :disabled="index === form.steps.length - 1"
                      >
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </button>
                      <button 
                        type="button"
                        class="text-red-600 hover:text-red-900"
                        @click="removeStep(index)"
                      >
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </div>
                  </div>
                  
                  <div class="mb-3">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Step Name</label>
                    <input 
                      v-model="step.name" 
                      type="text" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                    />
                  </div>
                  
                  <div class="mb-3">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Step Type</label>
                    <select 
                      v-model="step.type" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    >
                      <option value="send_email">Send Email</option>
                      <option value="send_sms">Send SMS</option>
                      <option value="delay">Delay</option>
                      <option value="condition">Condition</option>
                      <option value="update_contact">Update Contact</option>
                      <option value="webhook">Webhook</option>
                      <option value="notification">Notification</option>
                      <option value="custom_action">Custom Action</option>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label class="flex items-center">
                      <input 
                        type="checkbox" 
                        v-model="step.is_active" 
                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                      />
                      <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end">
              <Link 
                :href="route('user.automations.index')"
                class="mr-3 rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
              >
                Cancel
              </Link>
              <button 
                type="submit"
                class="inline-flex items-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                :disabled="isSubmitting"
              >
                <span v-if="isSubmitting">Saving...</span>
                <span v-else>Save Changes</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </UserLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';

const props = defineProps({
  automation: Object,
  errors: Object
});

const isSubmitting = ref(false);

const form = useForm({
  name: props.automation.name,
  description: props.automation.description || '',
  type: props.automation.type,
  status: props.automation.status,
  triggers: props.automation.triggers || [],
  steps: props.automation.steps || []
});

const addTrigger = () => {
  form.triggers.push({
    type: 'tag',
    value: ''
  });
};

const removeTrigger = (index) => {
  form.triggers.splice(index, 1);
};

const addStep = () => {
  form.steps.push({
    name: 'New Step',
    type: 'send_email',
    position: form.steps.length,
    config: {},
    conditions: null,
    is_active: true
  });
};

const removeStep = (index) => {
  form.steps.splice(index, 1);
  
  // Update positions
  form.steps.forEach((step, i) => {
    step.position = i;
  });
};

const moveStepUp = (index) => {
  if (index === 0) return;
  
  const temp = form.steps[index];
  form.steps[index] = form.steps[index - 1];
  form.steps[index - 1] = temp;
  
  // Update positions
  form.steps.forEach((step, i) => {
    step.position = i;
  });
};

const moveStepDown = (index) => {
  if (index === form.steps.length - 1) return;
  
  const temp = form.steps[index];
  form.steps[index] = form.steps[index + 1];
  form.steps[index + 1] = temp;
  
  // Update positions
  form.steps.forEach((step, i) => {
    step.position = i;
  });
};

const updateAutomation = () => {
  isSubmitting.value = true;
  form.put(route('user.automations.update', props.automation.id), {
    onSuccess: () => {
      isSubmitting.value = false;
    },
    onError: () => {
      isSubmitting.value = false;
    }
  });
};

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
</script> 