<script setup>
import { Head, Link } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import { ref } from 'vue';

const props = defineProps({
  subscribers: Object,
  counts: Object,
  filters: Object
});

// Helper functions
function getFullName(subscriber) {
  if (subscriber.first_name && subscriber.last_name) {
    return `${subscriber.first_name} ${subscriber.last_name}`;
  } else if (subscriber.first_name) {
    return subscriber.first_name;
  } else if (subscriber.last_name) {
    return subscriber.last_name;
  } else {
    return '(No name)';
  }
}

function formatStatus(status) {
  return status.charAt(0).toUpperCase() + status.slice(1);
}

function getStatusBadgeClass(status) {
  switch(status) {
    case 'active':
      return 'bg-green-100 text-green-800';
    case 'unsubscribed':
      return 'bg-gray-100 text-gray-800';
    case 'bounced':
      return 'bg-red-100 text-red-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
}
</script>

<template>
  <Head title="Contacts | Marketing App" />

  <UserLayout>
    <div class="py-6 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-purple-900">Contacts</h1>
            <p class="mt-1 text-gray-600">Manage your email subscribers</p>
          </div>
          <div>
            <Link :href="route('user.contacts.create')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              Add Contact
            </Link>
          </div>
        </div>

        <!-- Stats -->
        <div class="mb-6 grid grid-cols-2 md:grid-cols-4 gap-4">
          <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="text-sm font-medium text-gray-500">All Contacts</div>
            <div class="mt-1 text-2xl font-semibold">{{ counts.all }}</div>
          </div>
          <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="text-sm font-medium text-gray-500">Active</div>
            <div class="mt-1 text-2xl font-semibold text-green-600">{{ counts.active }}</div>
          </div>
          <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="text-sm font-medium text-gray-500">Unsubscribed</div>
            <div class="mt-1 text-2xl font-semibold text-gray-600">{{ counts.unsubscribed }}</div>
          </div>
          <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="text-sm font-medium text-gray-500">Bounced</div>
            <div class="mt-1 text-2xl font-semibold text-red-600">{{ counts.bounced }}</div>
          </div>
        </div>

        <!-- Contact List -->
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
          <ul class="divide-y divide-gray-200">
            <li v-for="subscriber in subscribers.data" :key="subscriber.id" class="px-6 py-4 flex items-center justify-between">
              <div>
                <div class="text-sm font-medium text-gray-900">{{ getFullName(subscriber) }}</div>
                <div class="text-sm text-gray-500">{{ subscriber.email }}</div>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" :class="getStatusBadgeClass(subscriber.status)">
                  {{ formatStatus(subscriber.status) }}
                </span>
              </div>
              <div class="flex space-x-2">
                <Link :href="route('user.contacts.edit', subscriber.id)" class="text-indigo-600 hover:text-indigo-900">
                  Edit
                </Link>
              </div>
            </li>
            <li v-if="subscribers.data.length === 0" class="px-6 py-4 text-center text-gray-500">
              No contacts found.
            </li>
          </ul>
          
          <!-- Pagination -->
          <div class="px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
              <a v-if="subscribers.prev_page_url" :href="subscribers.prev_page_url" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Previous
              </a>
              <a v-if="subscribers.next_page_url" :href="subscribers.next_page_url" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Next
              </a>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
              <div>
                <p class="text-sm text-gray-700">
                  Showing
                  <span class="font-medium">{{ subscribers.from || 0 }}</span>
                  to
                  <span class="font-medium">{{ subscribers.to || 0 }}</span>
                  of
                  <span class="font-medium">{{ subscribers.total }}</span>
                  results
                </p>
              </div>
              <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                  <a v-if="subscribers.prev_page_url" :href="subscribers.prev_page_url" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <!-- Heroicon name: solid/chevron-left -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                  </a>
                  <a v-if="subscribers.next_page_url" :href="subscribers.next_page_url" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template>