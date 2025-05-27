<template>
  <UserLayout title="Account Settings">
    <div class="container mx-auto px-4 py-6">
      <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Account Settings</h1>
        <p class="text-gray-600">Manage your account preferences and settings</p>
      </div>

      <!-- Tabs -->
      <div class="mb-6">
        <div class="border-b border-gray-200">
          <nav class="-mb-px flex space-x-8">
            <button 
              @click="activeTab = 'general'"
              :class="[
                activeTab === 'general'
                  ? 'border-blue-500 text-blue-600'
                  : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium'
              ]"
            >
              General
            </button>
            <button 
              @click="activeTab = 'email'"
              :class="[
                activeTab === 'email'
                  ? 'border-blue-500 text-blue-600'
                  : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium'
              ]"
            >
              Email
            </button>
            <button 
              @click="activeTab = 'campaigns'"
              :class="[
                activeTab === 'campaigns'
                  ? 'border-blue-500 text-blue-600'
                  : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium'
              ]"
            >
              Campaigns
            </button>
            <button 
              @click="activeTab = 'subscription'"
              :class="[
                activeTab === 'subscription'
                  ? 'border-blue-500 text-blue-600'
                  : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium'
              ]"
            >
              Subscription
            </button>
          </nav>
        </div>
      </div>

      <!-- Settings Content -->
      <div class="overflow-hidden rounded-lg bg-white shadow">
        <!-- General Settings -->
        <div v-if="activeTab === 'general'" class="p-6">
          <h2 class="mb-4 text-lg font-medium text-gray-900">General Settings</h2>
          <form @submit.prevent="updateGeneralSettings">
            <!-- Timezone Setting -->
            <div class="mb-4">
              <label for="timezone" class="mb-1 block text-sm font-medium text-gray-700">Timezone</label>
              <select 
                id="timezone" 
                v-model="generalForm.timezone" 
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              >
                <option value="UTC">UTC</option>
                <option value="America/New_York">Eastern Time (US & Canada)</option>
                <option value="America/Chicago">Central Time (US & Canada)</option>
                <option value="America/Denver">Mountain Time (US & Canada)</option>
                <option value="America/Los_Angeles">Pacific Time (US & Canada)</option>
                <option value="Europe/London">London</option>
                <option value="Europe/Paris">Paris</option>
                <option value="Asia/Tokyo">Tokyo</option>
                <option value="Australia/Sydney">Sydney</option>
              </select>
            </div>

            <!-- Date Format Setting -->
            <div class="mb-4">
              <label for="date_format" class="mb-1 block text-sm font-medium text-gray-700">Date Format</label>
              <select 
                id="date_format" 
                v-model="generalForm.date_format" 
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              >
                <option value="Y-m-d">2023-05-27</option>
                <option value="m/d/Y">05/27/2023</option>
                <option value="d/m/Y">27/05/2023</option>
                <option value="M j, Y">May 27, 2023</option>
              </select>
            </div>

            <!-- Language Setting -->
            <div class="mb-4">
              <label for="language" class="mb-1 block text-sm font-medium text-gray-700">Language</label>
              <select 
                id="language" 
                v-model="generalForm.language" 
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              >
                <option value="en">English</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
                <option value="de">German</option>
                <option value="zh">Chinese (Simplified)</option>
              </select>
            </div>

            <!-- Notifications -->
            <div class="mb-4">
              <label class="flex items-center">
                <input 
                  type="checkbox" 
                  v-model="generalForm.notifications_enabled" 
                  class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                />
                <span class="ml-2 text-sm text-gray-700">Enable Notifications</span>
              </label>
              <p class="mt-1 text-sm text-gray-500">Receive notifications about important updates and events.</p>
            </div>

            <div class="mt-6 flex justify-between">
              <button 
                type="button"
                @click="resetSettings('general')"
                class="inline-flex items-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
              >
                Reset to Defaults
              </button>
              <button 
                type="submit"
                class="inline-flex items-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                :disabled="generalFormSubmitting"
              >
                <span v-if="generalFormSubmitting">Saving...</span>
                <span v-else>Save Changes</span>
              </button>
            </div>
          </form>
        </div>

        <!-- Email Settings -->
        <div v-if="activeTab === 'email'" class="p-6">
          <h2 class="mb-4 text-lg font-medium text-gray-900">Email Settings</h2>
          <form @submit.prevent="updateEmailSettings">
            <!-- Email Signature -->
            <div class="mb-4">
              <label for="email_signature" class="mb-1 block text-sm font-medium text-gray-700">Email Signature</label>
              <textarea 
                id="email_signature" 
                v-model="emailForm.email_signature" 
                rows="4" 
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                placeholder="Enter your email signature"
              ></textarea>
              <p class="mt-1 text-sm text-gray-500">This signature will be automatically added to your emails.</p>
            </div>

            <!-- Reply-To -->
            <div class="mb-4">
              <label for="reply_to" class="mb-1 block text-sm font-medium text-gray-700">Reply-To Email</label>
              <input 
                id="reply_to" 
                type="email" 
                v-model="emailForm.reply_to" 
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                placeholder="Enter reply-to email address"
              />
              <p class="mt-1 text-sm text-gray-500">If left empty, replies will go to your account email.</p>
            </div>

            <!-- Email Notifications -->
            <div class="mb-4">
              <label class="flex items-center">
                <input 
                  type="checkbox" 
                  v-model="emailForm.email_notifications" 
                  class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                />
                <span class="ml-2 text-sm text-gray-700">Enable Email Notifications</span>
              </label>
              <p class="mt-1 text-sm text-gray-500">Receive email notifications for campaign results, contacts, etc.</p>
            </div>

            <div class="mt-6 flex justify-between">
              <button 
                type="button"
                @click="resetSettings('email')"
                class="inline-flex items-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
              >
                Reset to Defaults
              </button>
              <button 
                type="submit"
                class="inline-flex items-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                :disabled="emailFormSubmitting"
              >
                <span v-if="emailFormSubmitting">Saving...</span>
                <span v-else>Save Changes</span>
              </button>
            </div>
          </form>
        </div>

        <!-- Campaign Settings -->
        <div v-if="activeTab === 'campaigns'" class="p-6">
          <h2 class="mb-4 text-lg font-medium text-gray-900">Campaign Settings</h2>
          <form @submit.prevent="updateCampaignSettings">
            <!-- Default From Name -->
            <div class="mb-4">
              <label for="default_from_name" class="mb-1 block text-sm font-medium text-gray-700">Default From Name</label>
              <input 
                id="default_from_name" 
                type="text" 
                v-model="campaignForm.default_from_name" 
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                placeholder="Enter default from name"
              />
              <p class="mt-1 text-sm text-gray-500">This name will be used as the default sender for new campaigns.</p>
            </div>

            <!-- Default From Email -->
            <div class="mb-4">
              <label for="default_from_email" class="mb-1 block text-sm font-medium text-gray-700">Default From Email</label>
              <input 
                id="default_from_email" 
                type="email" 
                v-model="campaignForm.default_from_email" 
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                placeholder="Enter default from email"
              />
              <p class="mt-1 text-sm text-gray-500">This email will be used as the default sender for new campaigns.</p>
            </div>

            <!-- Tracking Options -->
            <div class="mb-4">
              <h3 class="text-sm font-medium text-gray-700">Tracking Options</h3>
              <div class="mt-2 space-y-2">
                <label class="flex items-center">
                  <input 
                    type="checkbox" 
                    v-model="campaignForm.track_opens" 
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                  />
                  <span class="ml-2 text-sm text-gray-700">Track Email Opens</span>
                </label>
                <label class="flex items-center">
                  <input 
                    type="checkbox" 
                    v-model="campaignForm.track_clicks" 
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                  />
                  <span class="ml-2 text-sm text-gray-700">Track Link Clicks</span>
                </label>
              </div>
              <p class="mt-1 text-sm text-gray-500">Enable tracking to see how your campaigns perform.</p>
            </div>

            <div class="mt-6 flex justify-between">
              <button 
                type="button"
                @click="resetSettings('campaign')"
                class="inline-flex items-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
              >
                Reset to Defaults
              </button>
              <button 
                type="submit"
                class="inline-flex items-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                :disabled="campaignFormSubmitting"
              >
                <span v-if="campaignFormSubmitting">Saving...</span>
                <span v-else>Save Changes</span>
              </button>
            </div>
          </form>
        </div>

        <!-- Subscription Settings -->
        <div v-if="activeTab === 'subscription'" class="p-6">
          <h2 class="mb-4 text-lg font-medium text-gray-900">Subscription Settings</h2>
          
          <!-- Current Plan -->
          <div class="mb-8 rounded-lg bg-gray-50 p-6">
            <h3 class="text-lg font-medium text-gray-900">Current Plan</h3>
            <div class="mt-4 flex items-center">
              <div class="flex h-12 w-12 items-center justify-center rounded-md bg-blue-100">
                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
              </div>
              <div class="ml-4">
                <h4 class="text-xl font-medium text-gray-900">{{ capitalize(subscriptionSettings.current_plan) }}</h4>
                <p class="text-gray-500">
                  <span v-if="subscriptionSettings.current_plan === 'free'">Up to {{ subscriptionSettings.max_subscribers }} subscribers and {{ subscriptionSettings.max_campaigns }} campaigns.</span>
                  <span v-else-if="subscriptionSettings.current_plan === 'starter'">Up to 2,500 subscribers and unlimited campaigns.</span>
                  <span v-else-if="subscriptionSettings.current_plan === 'professional'">Up to 10,000 subscribers and unlimited campaigns.</span>
                  <span v-else-if="subscriptionSettings.current_plan === 'enterprise'">Unlimited subscribers and campaigns.</span>
                </p>
              </div>
            </div>
            
            <!-- Plan Upgrade Button -->
            <div class="mt-6">
              <button 
                type="button"
                class="inline-flex items-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
              >
                Upgrade Plan
              </button>
            </div>
          </div>
          
          <!-- Plan Features -->
          <div class="mb-8">
            <h3 class="mb-4 text-lg font-medium text-gray-900">Plan Features</h3>
            <ul class="space-y-2">
              <li class="flex items-center">
                <svg class="mr-2 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ subscriptionSettings.max_subscribers }} subscribers</span>
              </li>
              <li class="flex items-center">
                <svg class="mr-2 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ subscriptionSettings.max_campaigns }} campaigns</span>
              </li>
              <li class="flex items-center">
                <svg class="mr-2 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Email support</span>
              </li>
              <li v-if="subscriptionSettings.current_plan !== 'free'" class="flex items-center">
                <svg class="mr-2 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Advanced analytics</span>
              </li>
              <li v-if="['professional', 'enterprise'].includes(subscriptionSettings.current_plan)" class="flex items-center">
                <svg class="mr-2 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Priority support</span>
              </li>
              <li v-if="subscriptionSettings.current_plan === 'enterprise'" class="flex items-center">
                <svg class="mr-2 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Dedicated account manager</span>
              </li>
            </ul>
          </div>
          
          <!-- Billing History -->
          <div>
            <h3 class="mb-4 text-lg font-medium text-gray-900">Billing History</h3>
            <div class="overflow-hidden rounded-lg border border-gray-200">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Amount</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Invoice</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                  <tr v-if="subscriptionSettings.current_plan === 'free'">
                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No billing history available for free plan.</td>
                  </tr>
                  <tr v-else>
                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">May 1, 2023</td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">$29.99</td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                      <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Paid</span>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                      <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template>

<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';

const props = defineProps({
  generalSettings: Object,
  emailSettings: Object,
  campaignSettings: Object,
  subscriptionSettings: Object,
});

// Active tab state
const activeTab = ref('general');

// Form states
const generalForm = ref({
  timezone: props.generalSettings.timezone,
  date_format: props.generalSettings.date_format,
  language: props.generalSettings.language,
  notifications_enabled: props.generalSettings.notifications_enabled,
});

const emailForm = ref({
  email_signature: props.emailSettings.email_signature,
  reply_to: props.emailSettings.reply_to,
  email_notifications: props.emailSettings.email_notifications,
});

const campaignForm = ref({
  default_from_name: props.campaignSettings.default_from_name,
  default_from_email: props.campaignSettings.default_from_email,
  track_opens: props.campaignSettings.track_opens,
  track_clicks: props.campaignSettings.track_clicks,
});

// Form submission states
const generalFormSubmitting = ref(false);
const emailFormSubmitting = ref(false);
const campaignFormSubmitting = ref(false);

// Update general settings
const updateGeneralSettings = () => {
  generalFormSubmitting.value = true;
  router.put(route('user.settings.general'), generalForm.value, {
    onFinish: () => {
      generalFormSubmitting.value = false;
    }
  });
};

// Update email settings
const updateEmailSettings = () => {
  emailFormSubmitting.value = true;
  router.put(route('user.settings.email'), emailForm.value, {
    onFinish: () => {
      emailFormSubmitting.value = false;
    }
  });
};

// Update campaign settings
const updateCampaignSettings = () => {
  campaignFormSubmitting.value = true;
  router.put(route('user.settings.campaign'), campaignForm.value, {
    onFinish: () => {
      campaignFormSubmitting.value = false;
    }
  });
};

// Reset settings to defaults
const resetSettings = (group) => {
  if (confirm(`Are you sure you want to reset ${group} settings to default values?`)) {
    router.post(route('user.settings.reset'), { group });
  }
};

// Helper function to capitalize first letter
const capitalize = (string) => {
  return string.charAt(0).toUpperCase() + string.slice(1);
};
</script> 