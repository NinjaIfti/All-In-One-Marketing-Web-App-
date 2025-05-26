<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import { ref } from 'vue';

const props = defineProps({
  subscriberCount: Number
});

const form = useForm({
  name: '',
  subject: '',
  content: '<p>Write your email content here...</p>'
});

const saving = ref(false);
const error = ref('');

const saveCampaign = () => {
  saving.value = true;
  error.value = '';
  
  form.post(route('user.campaigns.store'), {
    onSuccess: () => {
      saving.value = false;
    },
    onError: (errors) => {
      saving.value = false;
      if (errors.name) {
        error.value = errors.name;
      } else if (errors.subject) {
        error.value = errors.subject;
      } else if (errors.content) {
        error.value = errors.content;
      } else {
        error.value = 'An error occurred while saving the campaign.';
      }
    }
  });
};

const previewEmail = () => {
  // In a real app, this would open a preview modal
  // For now, we'll just show a browser alert
  alert('Email Preview Feature Coming Soon!');
};
</script>

<template>
  <Head title="Create Campaign | PB&J Solutions" />

  <UserLayout>
    <div class="py-6 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-purple-900">Create Campaign</h1>
            <p class="mt-1 text-gray-600">Create a new email marketing campaign</p>
          </div>
          <div class="flex space-x-4">
            <Link :href="route('user.campaigns')" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              Cancel
            </Link>
            <button @click="saveCampaign" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" :disabled="saving">
              <span v-if="saving">Saving...</span>
              <span v-else>Save Campaign</span>
            </button>
          </div>
        </div>

        <!-- Subscriber Count Alert -->
        <div v-if="subscriberCount === 0" class="mb-6 bg-yellow-50 border-l-4 border-yellow-400 p-4">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm text-yellow-700">
                You don't have any subscribers yet. <Link :href="route('user.contacts')" class="font-medium underline text-yellow-700 hover:text-yellow-600">Add contacts</Link> before sending your campaign.
              </p>
            </div>
          </div>
        </div>

        <!-- Error Alert -->
        <div v-if="error" class="mb-6 bg-red-50 border-l-4 border-red-400 p-4">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm text-red-700">{{ error }}</p>
            </div>
          </div>
        </div>

        <!-- Campaign Form -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
          <div class="grid grid-cols-1 gap-6">
            <!-- Campaign Name -->
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700">Campaign Name</label>
              <input type="text" id="name" v-model="form.name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="e.g. Weekly Newsletter" />
              <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
            </div>

            <!-- Email Subject -->
            <div>
              <label for="subject" class="block text-sm font-medium text-gray-700">Email Subject</label>
              <input type="text" id="subject" v-model="form.subject" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="e.g. Your Weekly Update from PB&J Solutions" />
              <p v-if="form.errors.subject" class="mt-1 text-sm text-red-600">{{ form.errors.subject }}</p>
            </div>

            <!-- Email Content -->
            <div>
              <label for="content" class="block text-sm font-medium text-gray-700">Email Content</label>
              <div class="mt-1">
                <textarea id="content" v-model="form.content" rows="15" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"></textarea>
                <p class="mt-1 text-xs text-gray-500">HTML is supported. In a production app, this would be a rich text editor.</p>
                <p v-if="form.errors.content" class="mt-1 text-sm text-red-600">{{ form.errors.content }}</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-between">
          <button @click="previewEmail" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            Preview Email
          </button>
          <div class="flex space-x-4">
            <Link :href="route('user.campaigns')" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              Cancel
            </Link>
            <button @click="saveCampaign" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" :disabled="saving">
              <span v-if="saving">Saving...</span>
              <span v-else>Save Campaign</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template> 