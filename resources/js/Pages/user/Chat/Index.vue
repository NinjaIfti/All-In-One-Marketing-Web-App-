<script setup>
import { Head, Link } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  conversations: Array,
});

const showNewChatModal = ref(false);
const form = ref({
  subject: '',
  message: '',
});
const errors = ref({});

const formatDate = (dateString) => {
  if (!dateString) return '';
  const date = new Date(dateString);
  const now = new Date();
  
  // If today, show time only
  if (date.toDateString() === now.toDateString()) {
    return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
  }
  
  // If this year, show month and day
  if (date.getFullYear() === now.getFullYear()) {
    return date.toLocaleDateString([], { month: 'short', day: 'numeric' });
  }
  
  // Otherwise show full date
  return date.toLocaleDateString([], { year: 'numeric', month: 'short', day: 'numeric' });
};

const getInitials = (name) => {
  if (!name) return '';
  return name
    .split(' ')
    .map(word => word[0])
    .join('')
    .toUpperCase()
    .substring(0, 2);
};

const submitForm = () => {
  router.post(route('user.chat.store'), form.value, {
    onSuccess: () => {
      showNewChatModal.value = false;
      form.value = {
        subject: '',
        message: '',
      };
    },
    onError: (e) => {
      errors.value = e;
    }
  });
};
</script>

<template>
  <Head title="Chat" />
  
  <UserLayout>
    <div class="py-6 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-purple-900">Support Chat</h1>
            <p class="mt-1 text-gray-600">Contact our support team</p>
          </div>
          <button 
            @click="showNewChatModal = true"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
          >
            New Conversation
          </button>
        </div>

        <!-- Conversations List -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <div class="border-b border-gray-200">
            <div class="px-6 py-4">
              <h2 class="text-lg font-medium text-gray-900">Your Conversations</h2>
            </div>
          </div>
          
          <div v-if="conversations && conversations.length > 0">
            <ul class="divide-y divide-gray-200">
              <li v-for="conversation in conversations" :key="conversation.id" class="hover:bg-gray-50">
                <Link :href="route('user.chat.show', conversation.id)" class="block">
                  <div class="px-6 py-4 flex items-start">
                    <div class="flex-shrink-0">
                      <div v-if="conversation.admin" class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-medium">
                        {{ getInitials(conversation.admin.name) }}
                      </div>
                      <div v-else class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                      </div>
                    </div>
                    <div class="ml-4 flex-1">
                      <div class="flex justify-between items-baseline">
                        <div class="text-sm font-medium text-purple-900 flex items-center">
                          {{ conversation.subject }}
                          <span v-if="conversation.unread_count > 0" class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            {{ conversation.unread_count }}
                          </span>
                        </div>
                        <div class="text-xs text-gray-500">
                          {{ formatDate(conversation.last_message_at) }}
                        </div>
                      </div>
                      <div class="mt-1 text-sm text-gray-600 line-clamp-1">
                        {{ conversation.latest_message ? conversation.latest_message.content : 'No messages yet' }}
                      </div>
                      <div class="mt-1 flex items-center">
                        <span 
                          class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium" 
                          :class="conversation.status === 'open' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                        >
                          {{ conversation.status === 'open' ? 'Open' : 'Closed' }}
                        </span>
                        <span v-if="conversation.admin" class="ml-2 text-xs text-gray-500">
                          Support: {{ conversation.admin.name }}
                        </span>
                        <span v-else class="ml-2 text-xs text-gray-500">
                          Waiting for assignment
                        </span>
                      </div>
                    </div>
                  </div>
                </Link>
              </li>
            </ul>
          </div>
          
          <div v-else class="px-6 py-10 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No conversations yet</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new conversation with support.</p>
            <div class="mt-6">
              <button
                type="button"
                @click="showNewChatModal = true"
                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
              >
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                New Conversation
              </button>
            </div>
          </div>
        </div>
        
        <!-- Help Section -->
        <div class="mt-8 bg-gradient-to-r from-purple-600 to-purple-800 rounded-lg shadow-md p-6 text-white">
          <h2 class="text-xl font-semibold mb-2">Need Help?</h2>
          <p class="mb-4">Our support team is available to assist you with any questions or issues.</p>
          <div class="space-y-3">
            <div class="flex items-start">
              <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div class="ml-3">
                <h3 class="text-sm font-medium">Fast Response Times</h3>
                <p class="text-xs text-purple-100">We aim to respond to all inquiries within 24 hours</p>
              </div>
            </div>
            <div class="flex items-start">
              <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
              </div>
              <div class="ml-3">
                <h3 class="text-sm font-medium">Knowledge Base</h3>
                <p class="text-xs text-purple-100">Check our documentation for quick answers to common questions</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- New Conversation Modal -->
    <div v-if="showNewChatModal" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showNewChatModal = false"></div>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                  New Conversation
                </h3>
                <div class="mt-4 space-y-4">
                  <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                    <input 
                      type="text" 
                      name="subject" 
                      id="subject" 
                      v-model="form.subject"
                      class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                      placeholder="What do you need help with?"
                    />
                    <p v-if="errors.subject" class="mt-1 text-sm text-red-600">{{ errors.subject }}</p>
                  </div>
                  <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea 
                      id="message" 
                      name="message" 
                      rows="4" 
                      v-model="form.message"
                      class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                      placeholder="Describe your issue in detail"
                    ></textarea>
                    <p v-if="errors.message" class="mt-1 text-sm text-red-600">{{ errors.message }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button 
              type="button" 
              @click="submitForm"
              class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-purple-600 text-base font-medium text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:ml-3 sm:w-auto sm:text-sm"
            >
              Start Conversation
            </button>
            <button 
              type="button" 
              @click="showNewChatModal = false"
              class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
            >
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template>

<style scoped>
.line-clamp-1 {
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style> 