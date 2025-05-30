<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { ref, watch, onMounted, nextTick } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  conversation: Object,
  messages: Array,
});

const messageInput = ref('');
const messageContainer = ref(null);
const errors = ref({});
const messageFile = ref(null);
const selectedFile = ref(null);
const sending = ref(false);
const showActionsDropdown = ref(false);
const showReassignModal = ref(false);
const adminsList = ref([]);
const selectedAdminId = ref(null);
const loadingAdmins = ref(false);

const scrollToBottom = () => {
  nextTick(() => {
    if (messageContainer.value) {
      messageContainer.value.scrollTop = messageContainer.value.scrollHeight;
    }
  });
};

onMounted(() => {
  scrollToBottom();
});

watch(() => props.messages, () => {
  scrollToBottom();
}, { deep: true });

const formatTime = (dateString) => {
  if (!dateString) return '';
  const date = new Date(dateString);
  return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
};

const formatDate = (dateString) => {
  if (!dateString) return '';
  const date = new Date(dateString);
  return date.toLocaleDateString([], { year: 'numeric', month: 'long', day: 'numeric' });
};

const sendMessage = () => {
  if (!messageInput.value.trim() && !selectedFile.value) return;
  
  sending.value = true;
  
  const form = new FormData();
  form.append('content', messageInput.value);
  
  if (selectedFile.value) {
    form.append('attachment', selectedFile.value);
  }
  
  router.post(route('admin.chat.message', props.conversation.id), form, {
    onSuccess: () => {
      messageInput.value = '';
      selectedFile.value = null;
      if (messageFile.value) {
        messageFile.value.value = '';
      }
      sending.value = false;
    },
    onError: (e) => {
      errors.value = e;
      sending.value = false;
    }
  });
};

const handleFileChange = (event) => {
  if (event.target.files.length > 0) {
    selectedFile.value = event.target.files[0];
  }
};

const removeSelectedFile = () => {
  selectedFile.value = null;
  if (messageFile.value) {
    messageFile.value.value = '';
  }
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

const displayMessages = () => {
  if (!props.messages || props.messages.length === 0) return [];
  
  const result = [];
  let currentDate = null;
  
  props.messages.forEach((message, index) => {
    const messageDate = new Date(message.created_at).toDateString();
    
    // Insert date divider if date changes
    if (currentDate !== messageDate) {
      result.push({
        type: 'date',
        date: message.created_at,
        id: `date-${index}`
      });
      currentDate = messageDate;
    }
    
    // Add the actual message
    result.push({
      type: 'message',
      data: message,
      id: message.id
    });
  });
  
  return result;
};

const changeConversationStatus = (status) => {
  router.patch(route('admin.chat.status', props.conversation.id), {
    status: status
  });
  showActionsDropdown.value = false;
};

const openReassignModal = async () => {
  loadingAdmins.value = true;
  showReassignModal.value = true;
  showActionsDropdown.value = false;
  
  try {
    const response = await fetch(route('admin.chat.admins'));
    adminsList.value = await response.json();
    // Set the current admin as selected by default
    selectedAdminId.value = props.conversation.admin_id || '';
  } catch (error) {
    console.error('Error loading admins:', error);
  } finally {
    loadingAdmins.value = false;
  }
};

const reassignConversation = () => {
  if (!selectedAdminId.value) return;
  
  router.patch(route('admin.chat.reassign', props.conversation.id), {
    admin_id: selectedAdminId.value
  }, {
    onSuccess: () => {
      showReassignModal.value = false;
    }
  });
};
</script>

<template>
  <Head title="Admin - Support Chat" />
  
  <AdminLayout>
    <div class="py-6 w-full h-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-[calc(100vh-14rem)]">
          <!-- Chat Header -->
          <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <div class="flex items-center">
              <Link :href="route('admin.chat.index')" class="mr-3 text-gray-400 hover:text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
              </Link>
              <h2 class="text-lg font-medium text-gray-900 mr-2">{{ conversation.subject || 'No Subject' }}</h2>
              <span 
                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium" 
                :class="conversation.status === 'open' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
              >
                {{ conversation.status === 'open' ? 'Open' : 'Closed' }}
              </span>
            </div>
            
            <div class="flex items-center space-x-4">
              <div class="flex items-center text-sm text-gray-500">
                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-medium mr-2">
                  {{ getInitials(conversation.user?.name || 'User') }}
                </div>
                <div>
                  <div class="font-medium">{{ conversation.user?.name || 'Unknown User' }}</div>
                  <div class="text-xs">{{ conversation.user?.email || 'No email' }}</div>
                </div>
              </div>
              
              <div class="relative">
                <button 
                  @click="showActionsDropdown = !showActionsDropdown"
                  class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
                >
                  Actions
                  <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
                
                <div 
                  v-if="showActionsDropdown" 
                  class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-10"
                >
                  <button 
                    v-if="conversation.status === 'open'"
                    @click="changeConversationStatus('closed')"
                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  >
                    Mark as Closed
                  </button>
                  <button 
                    v-else
                    @click="changeConversationStatus('open')"
                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  >
                    Reopen Conversation
                  </button>
                  <button 
                    @click="openReassignModal"
                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  >
                    Reassign Conversation
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Messages Container -->
          <div ref="messageContainer" class="flex-1 overflow-y-auto p-4 space-y-4">
            <template v-if="messages && messages.length > 0">
              <div v-for="item in displayMessages()" :key="item.id" class="space-y-4">
                <!-- Date Divider -->
                <div v-if="item.type === 'date'" class="flex justify-center">
                  <div class="bg-gray-100 text-gray-600 text-xs rounded-full px-3 py-1">
                    {{ formatDate(item.date) }}
                  </div>
                </div>
                
                <!-- Message -->
                <div 
                  v-else
                  class="flex"
                  :class="item.data.sender_id === $page.props.auth.user.id ? 'justify-end' : 'justify-start'"
                >
                  <div 
                    class="max-w-[75%] rounded-lg px-4 py-2 shadow-sm"
                    :class="item.data.sender_id === $page.props.auth.user.id ? 
                      'bg-orange-600 text-white' : 
                      item.data.sender.is_admin ? 'bg-purple-100 text-gray-800' : 'bg-blue-100 text-gray-800'"
                  >
                    <div class="flex justify-between items-baseline mb-1">
                      <span class="font-medium text-sm">
                        {{ item.data.sender_id === $page.props.auth.user.id ? 'You' : item.data.sender.name }}
                      </span>
                      <span 
                        class="text-xs ml-2"
                        :class="item.data.sender_id === $page.props.auth.user.id ? 'text-orange-200' : 'text-gray-500'"
                      >
                        {{ formatTime(item.data.created_at) }}
                      </span>
                    </div>
                    <div class="text-sm whitespace-pre-wrap">{{ item.data.content }}</div>
                    
                    <!-- Attachment if exists -->
                    <div v-if="item.data.attachment" class="mt-2">
                      <a 
                        :href="`/storage/${item.data.attachment}`" 
                        target="_blank" 
                        class="flex items-center text-xs font-medium"
                        :class="item.data.sender_id === $page.props.auth.user.id ? 'text-orange-200 hover:text-white' : 'text-blue-600 hover:text-blue-800'"
                      >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        Attachment
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </template>
            
            <div v-else class="flex items-center justify-center h-full">
              <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No messages yet</h3>
                <p class="mt-1 text-sm text-gray-500">Start the conversation by sending a message.</p>
              </div>
            </div>
          </div>
          
          <!-- Message Input -->
          <div class="border-t border-gray-200 p-4 bg-gray-50">
            <div v-if="conversation.status === 'closed'" class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
              <div class="flex">
                <div class="flex-shrink-0">
                  <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="ml-3">
                  <p class="text-sm text-yellow-700">
                    This conversation is closed. You can reopen it from the Actions menu.
                  </p>
                </div>
              </div>
            </div>
            
            <div v-if="selectedFile" class="mb-3 bg-blue-50 rounded-md p-2 flex justify-between items-center">
              <div class="flex items-center text-sm text-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
                {{ selectedFile.name }}
              </div>
              <button 
                @click="removeSelectedFile"
                class="text-gray-400 hover:text-gray-500"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
            
            <div class="flex">
              <div class="flex-grow">
                <textarea 
                  v-model="messageInput"
                  placeholder="Type your message here..."
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                  rows="1"
                  @keydown.enter.prevent="sendMessage"
                  :disabled="conversation.status === 'closed'"
                ></textarea>
                <p v-if="errors.content" class="mt-1 text-sm text-red-600">{{ errors.content }}</p>
              </div>
              <div class="flex items-center ml-3 space-x-2">
                <input 
                  ref="messageFile"
                  type="file" 
                  class="hidden"
                  @change="handleFileChange"
                />
                <button
                  type="button"
                  @click="$refs.messageFile.click()"
                  class="inline-flex items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
                  :disabled="conversation.status === 'closed'"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                </button>
                <button
                  type="button"
                  @click="sendMessage"
                  :disabled="sending || (!messageInput.trim() && !selectedFile) || conversation.status === 'closed'"
                  class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                  <svg v-if="sending" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  <span>Send</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Reassign Modal -->
    <div v-if="showReassignModal" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showReassignModal = false"></div>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                  Reassign Conversation
                </h3>
                <div class="mt-4 space-y-4">
                  <div v-if="loadingAdmins" class="flex justify-center">
                    <svg class="animate-spin h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                  </div>
                  <div v-else>
                    <label for="admin" class="block text-sm font-medium text-gray-700">Select Admin</label>
                    <select 
                      id="admin" 
                      v-model="selectedAdminId"
                      class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm rounded-md"
                    >
                      <option v-for="admin in adminsList" :key="admin.id" :value="admin.id">
                        {{ admin.name }} ({{ admin.email }})
                      </option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button 
              type="button" 
              @click="reassignConversation"
              class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-600 text-base font-medium text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:ml-3 sm:w-auto sm:text-sm"
            >
              Reassign
            </button>
            <button 
              type="button" 
              @click="showReassignModal = false"
              class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
            >
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<style scoped>
.whitespace-pre-wrap {
  white-space: pre-wrap;
}
</style>