<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { ref, computed } from 'vue';

const props = defineProps({
  assignedConversations: Array,
  unassignedConversations: Array,
  counts: Object,
});

const activeTab = ref('open');

const filteredConversations = computed(() => {
  if (activeTab.value === 'open') {
    return props.assignedConversations.filter(conv => conv.status === 'open');
  } else if (activeTab.value === 'closed') {
    return props.assignedConversations.filter(conv => conv.status === 'closed');
  } else if (activeTab.value === 'unassigned') {
    return props.unassignedConversations;
  } else if (activeTab.value === 'all') {
    return props.assignedConversations;
  } else {
    return [];
  }
});

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

const searchQuery = ref('');
const searchResults = computed(() => {
  if (!searchQuery.value) return [];
  
  const query = searchQuery.value.toLowerCase();
  const allConversations = [...props.assignedConversations, ...props.unassignedConversations];
  
  return allConversations.filter(conv => {
    return (
      (conv.subject && conv.subject.toLowerCase().includes(query)) ||
      (conv.user && conv.user.name && conv.user.name.toLowerCase().includes(query)) ||
      (conv.user && conv.user.email && conv.user.email.toLowerCase().includes(query)) ||
      (conv.latest_message && conv.latest_message.content && conv.latest_message.content.toLowerCase().includes(query))
    );
  });
});
</script>

<template>
  <Head title="Admin - Support Chat" />
  
  <AdminLayout>
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Support Chat</h1>
            <p class="mt-1 text-gray-500">Manage customer conversations</p>
          </div>
        </div>
        
        <!-- Main Content -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
          <div class="border-b border-gray-200">
            <div class="px-6 py-4 flex flex-col md:flex-row justify-between items-start md:items-center">
              <h2 class="text-lg font-medium text-gray-900 mb-4 md:mb-0">Inbox</h2>
              <div class="w-full md:w-64">
                <div class="relative">
                  <input
                    type="text"
                    v-model="searchQuery"
                    placeholder="Search conversations..."
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50"
                  />
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-4">
            <!-- Sidebar -->
            <div class="md:col-span-1 border-r border-gray-200 bg-gray-50">
              <nav class="flex flex-col">
                <button
                  @click="activeTab = 'open'"
                  :class="[
                    'px-6 py-3 text-sm font-medium text-left flex justify-between items-center',
                    activeTab === 'open' ? 'bg-orange-50 text-orange-700 border-l-4 border-orange-500' : 'text-gray-600 hover:bg-gray-100'
                  ]"
                >
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    Open
                  </div>
                  <span 
                    v-if="counts.open > 0" 
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800"
                  >
                    {{ counts.open }}
                  </span>
                </button>
                
                <button
                  @click="activeTab = 'unassigned'"
                  :class="[
                    'px-6 py-3 text-sm font-medium text-left flex justify-between items-center',
                    activeTab === 'unassigned' ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-100'
                  ]"
                >
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Unassigned
                  </div>
                  <span 
                    v-if="counts.unassigned > 0" 
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800"
                  >
                    {{ counts.unassigned }}
                  </span>
                </button>
                
                <button
                  @click="activeTab = 'closed'"
                  :class="[
                    'px-6 py-3 text-sm font-medium text-left flex justify-between items-center',
                    activeTab === 'closed' ? 'bg-gray-200 text-gray-800 border-l-4 border-gray-500' : 'text-gray-600 hover:bg-gray-100'
                  ]"
                >
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Closed
                  </div>
                  <span 
                    v-if="counts.closed > 0" 
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800"
                  >
                    {{ counts.closed }}
                  </span>
                </button>
                
                <button
                  @click="activeTab = 'all'"
                  :class="[
                    'px-6 py-3 text-sm font-medium text-left flex justify-between items-center',
                    activeTab === 'all' ? 'bg-purple-50 text-purple-700 border-l-4 border-purple-500' : 'text-gray-600 hover:bg-gray-100'
                  ]"
                >
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    All Assigned
                  </div>
                  <span 
                    v-if="assignedConversations.length > 0" 
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800"
                  >
                    {{ assignedConversations.length }}
                  </span>
                </button>
                
                <div class="px-6 py-4 border-t border-gray-200 mt-4">
                  <div class="flex items-center justify-between">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Statistics</h3>
                  </div>
                  <div class="mt-2 space-y-2">
                    <div class="flex justify-between text-sm">
                      <span class="text-gray-600">Unread Messages</span>
                      <span 
                        class="font-medium"
                        :class="counts.unread > 0 ? 'text-orange-600' : 'text-gray-600'"
                      >
                        {{ counts.unread }}
                      </span>
                    </div>
                    <div class="flex justify-between text-sm">
                      <span class="text-gray-600">Open Conversations</span>
                      <span class="font-medium text-gray-900">{{ counts.open }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                      <span class="text-gray-600">Closed Conversations</span>
                      <span class="font-medium text-gray-900">{{ counts.closed }}</span>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
            
            <!-- Conversation List -->
            <div class="md:col-span-3">
              <div v-if="searchQuery && searchResults.length > 0" class="divide-y divide-gray-200">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                  <h3 class="text-sm font-medium text-gray-700">Search Results</h3>
                </div>
                <ul class="divide-y divide-gray-200 max-h-[calc(100vh-18rem)] overflow-y-auto">
                  <li v-for="conversation in searchResults" :key="conversation.id" class="hover:bg-gray-50">
                    <Link :href="route('admin.chat.show', conversation.id)" class="block">
                      <div class="px-6 py-4 flex items-start">
                        <div class="flex-shrink-0">
                          <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-medium">
                            {{ getInitials(conversation.user?.name || 'User') }}
                          </div>
                        </div>
                        <div class="ml-4 flex-1">
                          <div class="flex justify-between items-baseline">
                            <div class="text-sm font-medium text-gray-900 flex items-center">
                              {{ conversation.subject || 'No Subject' }}
                              <span v-if="conversation.unread_count > 0" class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
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
                            <span class="ml-2 text-xs text-gray-500">
                              {{ conversation.user?.name || 'Unknown User' }}
                            </span>
                          </div>
                        </div>
                      </div>
                    </Link>
                  </li>
                </ul>
              </div>
              
              <div v-else-if="searchQuery && searchResults.length === 0" class="px-6 py-10 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No results found</h3>
                <p class="mt-1 text-sm text-gray-500">Try adjusting your search terms.</p>
              </div>
              
              <div v-else-if="filteredConversations.length > 0" class="divide-y divide-gray-200">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                  <h3 class="text-sm font-medium text-gray-700">
                    {{ activeTab === 'open' ? 'Open Conversations' : 
                       activeTab === 'closed' ? 'Closed Conversations' : 
                       activeTab === 'unassigned' ? 'Unassigned Conversations' : 'All Conversations' }}
                  </h3>
                </div>
                <ul class="divide-y divide-gray-200 max-h-[calc(100vh-18rem)] overflow-y-auto">
                  <li v-for="conversation in filteredConversations" :key="conversation.id" class="hover:bg-gray-50">
                    <Link :href="route('admin.chat.show', conversation.id)" class="block">
                      <div class="px-6 py-4 flex items-start">
                        <div class="flex-shrink-0">
                          <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-medium">
                            {{ getInitials(conversation.user?.name || 'User') }}
                          </div>
                        </div>
                        <div class="ml-4 flex-1">
                          <div class="flex justify-between items-baseline">
                            <div class="text-sm font-medium text-gray-900 flex items-center">
                              {{ conversation.subject || 'No Subject' }}
                              <span v-if="conversation.unread_count > 0" class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
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
                            <span class="ml-2 text-xs text-gray-500">
                              {{ conversation.user?.name || 'Unknown User' }} ({{ conversation.user?.email || 'No email' }})
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
                <h3 class="mt-2 text-sm font-medium text-gray-900">No conversations</h3>
                <p class="mt-1 text-sm text-gray-500">
                  {{ activeTab === 'open' ? 'There are no open conversations at the moment.' : 
                     activeTab === 'closed' ? 'There are no closed conversations.' : 
                     activeTab === 'unassigned' ? 'There are no unassigned conversations.' : 'There are no conversations assigned to you.' }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<style scoped>
.line-clamp-1 {
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style> 