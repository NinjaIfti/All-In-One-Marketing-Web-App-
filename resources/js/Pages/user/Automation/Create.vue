<template>
  <UserLayout title="Create Automation">
    <div class="container mx-auto px-4 py-6">
      <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Create Automation</h1>
        <p class="text-gray-600">Set up an automated marketing workflow</p>
      </div>
      
      <div class="overflow-hidden rounded-lg bg-white shadow">
        <form @submit.prevent="createAutomation">
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
                  placeholder="e.g., Welcome Sequence, Abandoned Cart, etc."
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
                  placeholder="Describe what this automation does"
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
                      placeholder="Enter tag name"
                    />
                  </div>
                  
                  <div v-if="trigger.type === 'event'">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Event Name</label>
                    <input 
                      v-model="trigger.value" 
                      type="text" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                      placeholder="Enter event name"
                    />
                  </div>
                  
                  <div v-if="trigger.type === 'form'">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Form ID</label>
                    <input 
                      v-model="trigger.value" 
                      type="text" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                      placeholder="Enter form ID"
                    />
                  </div>
                  
                  <div v-if="trigger.type === 'segment'">
                    <label class="mb-1 block text-sm font-medium text-gray-700">Segment ID</label>
                    <input 
                      v-model="trigger.value" 
                      type="text" 
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                      placeholder="Enter segment ID"
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
                <span v-if="isSubmitting">Creating...</span>
                <span v-else>Create & Continue</span>
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
  errors: Object
});

const isSubmitting = ref(false);

const form = useForm({
  name: '',
  description: '',
  type: 'email',
  triggers: [],
  steps: []
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

const createAutomation = () => {
  isSubmitting.value = true;
  form.post(route('user.automations.store'), {
    onSuccess: () => {
      isSubmitting.value = false;
    },
    onError: () => {
      isSubmitting.value = false;
    }
  });
};
</script> 