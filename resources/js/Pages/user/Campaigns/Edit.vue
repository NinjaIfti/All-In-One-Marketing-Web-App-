<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import { ref } from 'vue';

const props = defineProps({
  campaign: Object,
  subscriberCount: Number
});

const form = useForm({
  name: props.campaign.name,
  subject: props.campaign.subject,
  content: props.campaign.content
});

const scheduledDate = ref('');
const saving = ref(false);
const error = ref('');
const successMessage = ref('');
const showDeleteConfirm = ref(false);

// Update campaign
const updateCampaign = () => {
  saving.value = true;
  error.value = '';
  
  form.put(route('user.campaigns.update', props.campaign.id), {
    onSuccess: () => {
      saving.value = false;
      successMessage.value = 'Campaign updated successfully!';
      
      // Clear success message after 3 seconds
      setTimeout(() => {
        successMessage.value = '';
      }, 3000);
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
        error.value = 'An error occurred while updating the campaign.';
      }
    }
  });
};

// Send campaign now
const sendCampaign = () => {
  if (props.subscriberCount === 0) {
    error.value = 'You have no subscribers to send to.';
    return;
  }
  
  if (confirm('Are you sure you want to send this campaign now?')) {
    router.post(route('user.campaigns.send', props.campaign.id), {}, {
      onSuccess: () => {
        // Redirect to the show view
        router.visit(route('user.campaigns.show', props.campaign.id));
      },
      onError: () => {
        error.value = 'Failed to send campaign.';
      }
    });
  }
};

// Schedule campaign
const scheduleCampaign = () => {
  if (props.subscriberCount === 0) {
    error.value = 'You have no subscribers to schedule for.';
    return;
  }
  
  if (!scheduledDate.value) {
    error.value = 'Please select a date and time to schedule.';
    return;
  }
  
  router.post(route('user.campaigns.schedule', props.campaign.id), {
    scheduled_at: scheduledDate.value
  }, {
    onSuccess: () => {
      // Redirect to the show view
      router.visit(route('user.campaigns.show', props.campaign.id));
    },
    onError: () => {
      error.value = 'Failed to schedule campaign.';
    }
  });
};

// Delete campaign
const deleteCampaign = () => {
  router.delete(route('user.campaigns.destroy', props.campaign.id), {
    onSuccess: () => {
      // Redirect to campaigns list
      router.visit(route('user.campaigns'));
    },
    onError: () => {
      error.value = 'Failed to delete campaign.';
      showDeleteConfirm.value = false;
    }
  });
};

// Preview email
const previewEmail = () => {
  // In a real app, this would open a preview modal
  // For now, we'll just show a browser alert
  alert('Email Preview Feature Coming Soon!');
};
</script>

<template>
  <Head title="Edit Campaign | PB&J Solutions" />

  <UserLayout>
    <div class="py-6 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-purple-900">Edit Campaign</h1>
            <p class="mt-1 text-gray-600">Update your campaign before sending</p>
          </div>
          <div class="flex space-x-4">
            <Link :href="route('user.campaigns')" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              Back to Campaigns
            </Link>
            <button @click="updateCampaign" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" :disabled="saving">
              <span v-if="saving">Saving...</span>
              <span v-else>Save Changes</span>
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

        <!-- Success Alert -->
        <div v-if="successMessage" class="mb-6 bg-green-50 border-l-4 border-green-400 p-4">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm text-green-700">{{ successMessage }}</p>
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

        <!-- Send/Schedule Options -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
          <h2 class="text-lg font-medium text-gray-900 mb-4">Send Options</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Send Now -->
            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="text-md font-medium text-gray-900 mb-2">Send Immediately</h3>
              <p class="text-sm text-gray-600 mb-4">Your campaign will be sent to all {{ subscriberCount }} active subscribers right away.</p>
              <button 
                @click="sendCampaign" 
                class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                :disabled="subscriberCount === 0"
              >
                Send Now
              </button>
            </div>
            
            <!-- Schedule for Later -->
            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="text-md font-medium text-gray-900 mb-2">Schedule for Later</h3>
              <div class="mb-4">
                <label for="scheduled_date" class="block text-sm font-medium text-gray-700 mb-1">Select Date and Time</label>
                <input 
                  type="datetime-local" 
                  id="scheduled_date" 
                  v-model="scheduledDate" 
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                />
              </div>
              <button 
                @click="scheduleCampaign" 
                class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                :disabled="!scheduledDate || subscriberCount === 0"
              >
                Schedule Campaign
              </button>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-between">
          <div class="flex space-x-4">
            <button @click="previewEmail" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              Preview Email
            </button>
            <button @click="showDeleteConfirm = true" type="button" class="inline-flex items-center px-4 py-2 border border-red-300 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              Delete Campaign
            </button>
          </div>
          <div class="flex space-x-4">
            <Link :href="route('user.campaigns')" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              Cancel
            </Link>
            <button @click="updateCampaign" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" :disabled="saving">
              <span v-if="saving">Saving...</span>
              <span v-else>Save Changes</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div v-if="showDeleteConfirm" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showDeleteConfirm = false"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
              </div>
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Delete Campaign</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">
                    Are you sure you want to delete this campaign? This action cannot be undone.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" @click="deleteCampaign" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
              Delete
            </button>
            <button type="button" @click="showDeleteConfirm = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template> 