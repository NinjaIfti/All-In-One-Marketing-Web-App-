<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import { ref, watch, computed } from 'vue';
import debounce from 'lodash/debounce';

const props = defineProps({
  subscribers: Object,
  counts: Object,
  filters: Object
});

// Local filter state
const search = ref(props.filters?.search || '');
const filter = ref(props.filters?.filter || 'all');

// Selection state
const selectedItems = ref([]);
const bulkActionMenuOpen = ref(false);
const confirmingBulkDelete = ref(false);
const confirmingBulkStatusChange = ref(false);
const statusToSet = ref('');
const processing = ref(false);

// Import state
const importModalOpen = ref(false);
const importFile = ref(null);
const importErrors = ref([]);
const importing = ref(false);
const importSuccess = ref(false);
const importStats = ref(null);

// Computed properties for selection
const allSelected = computed(() => {
  return selectedItems.value.length === props.subscribers.data.length && props.subscribers.data.length > 0;
});

const someSelected = computed(() => {
  return selectedItems.value.length > 0 && !allSelected.value;
});

const selectionCount = computed(() => {
  return selectedItems.value.length;
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

// Selection methods
function toggleSelectAll() {
  if (allSelected.value) {
    selectedItems.value = [];
  } else {
    selectedItems.value = props.subscribers.data.map(subscriber => subscriber.id);
  }
}

function toggleSelection(id) {
  const index = selectedItems.value.indexOf(id);
  if (index === -1) {
    selectedItems.value.push(id);
  } else {
    selectedItems.value.splice(index, 1);
  }
}

function isSelected(id) {
  return selectedItems.value.includes(id);
}

// Import functions
function openImportModal() {
  importModalOpen.value = true;
  importFile.value = null;
  importErrors.value = [];
  importSuccess.value = false;
  importStats.value = null;
}

function handleFileChange(e) {
  importFile.value = e.target.files[0] || null;
  importErrors.value = [];
}

function submitImport() {
  if (!importFile.value) {
    importErrors.value = ['Please select a file to import'];
    return;
  }

  const formData = new FormData();
  formData.append('file', importFile.value);
  
  importing.value = true;
  importErrors.value = [];
  
  router.post(route('user.contacts.import'), formData, {
    onSuccess: (page) => {
      importing.value = false;
      importSuccess.value = true;
      importStats.value = page.props.flash.importStats;
    },
    onError: (errors) => {
      importing.value = false;
      importErrors.value = Object.values(errors).flat();
    }
  });
}

function closeImportModal() {
  importModalOpen.value = false;
  // Reset the form if we need to reopen later
  setTimeout(() => {
    importSuccess.value = false;
    importStats.value = null;
    importErrors.value = [];
    importFile.value = null;
  }, 300);
}

// Bulk actions
function openBulkDelete() {
  confirmingBulkDelete.value = true;
  bulkActionMenuOpen.value = false;
}

function openBulkStatusChange(status) {
  statusToSet.value = status;
  confirmingBulkStatusChange.value = true;
  bulkActionMenuOpen.value = false;
}

function performBulkDelete() {
  processing.value = true;
  router.delete(route('user.contacts.bulk-delete'), {
    ids: selectedItems.value,
    onSuccess: () => {
      selectedItems.value = [];
      confirmingBulkDelete.value = false;
      processing.value = false;
    }
  });
}

function performBulkStatusChange() {
  processing.value = true;
  router.patch(route('user.contacts.bulk-status'), {
    ids: selectedItems.value,
    status: statusToSet.value,
    onSuccess: () => {
      selectedItems.value = [];
      confirmingBulkStatusChange.value = false;
      processing.value = false;
    }
  });
}

// Filter data when inputs change
const debouncedSearch = debounce(() => {
  router.get(
    route('user.contacts'),
    { search: search.value, filter: filter.value },
    { preserveState: true, replace: true }
  );
}, 300);

watch(search, debouncedSearch);

watch(filter, () => {
  router.get(
    route('user.contacts'),
    { search: search.value, filter: filter.value },
    { preserveState: true, replace: true }
  );
});
</script>

<template>
  <Head title="Contacts | PB&J Solutions" />

  <UserLayout>
    <div class="py-6 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-purple-900">Contacts</h1>
            <p class="mt-1 text-gray-600">Manage your email subscribers</p>
          </div>
          <div class="flex space-x-3">
            <button @click="openImportModal" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
              </svg>
              Import
            </button>
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

        <!-- Filters -->
        <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
          <div class="flex items-center space-x-4">
            <label class="text-sm text-gray-600">Filter by status:</label>
            <select v-model="filter" class="rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
              <option value="all">All Contacts</option>
              <option value="active">Active</option>
              <option value="unsubscribed">Unsubscribed</option>
              <option value="bounced">Bounced</option>
            </select>
          </div>
          <div class="w-full sm:w-64">
            <input type="text" v-model="search" placeholder="Search contacts..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
          </div>
        </div>

        <!-- Selection info banner -->
        <div v-if="selectionCount > 0" class="mb-4 bg-purple-50 border-l-4 border-purple-500 p-4 rounded-lg">
          <div class="flex justify-between items-center">
            <div class="text-purple-800">
              <span class="font-medium">{{ selectionCount }}</span> contacts selected
            </div>
            <div class="flex items-center space-x-4">
              <div class="relative" @click.away="bulkActionMenuOpen = false">
                <button @click="bulkActionMenuOpen = !bulkActionMenuOpen" type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                  Bulk Actions
                  <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
                <div v-if="bulkActionMenuOpen" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-10">
                  <div class="py-1">
                    <button @click="openBulkStatusChange('active')" class="text-gray-700 group flex items-center px-4 py-2 text-sm w-full text-left hover:bg-gray-100">
                      <span class="text-green-600 mr-3">●</span>
                      Mark as Active
                    </button>
                    <button @click="openBulkStatusChange('unsubscribed')" class="text-gray-700 group flex items-center px-4 py-2 text-sm w-full text-left hover:bg-gray-100">
                      <span class="text-gray-600 mr-3">●</span>
                      Mark as Unsubscribed
                    </button>
                  </div>
                  <div class="py-1">
                    <button @click="openBulkDelete" class="text-red-700 group flex items-center px-4 py-2 text-sm w-full text-left hover:bg-gray-100">
                      Delete Selected
                    </button>
                  </div>
                </div>
              </div>
              <button @click="selectedItems = []" class="text-purple-800 hover:text-purple-600 text-sm font-medium">
                Clear selection
              </button>
            </div>
          </div>
        </div>

        <!-- Simple Contacts Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <div class="overflow-x-auto w-full">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <div class="flex items-center">
                      <input
                        type="checkbox"
                        class="h-4 w-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                        :checked="allSelected"
                        :indeterminate="someSelected"
                        @change="toggleSelectAll"
                      >
                    </div>
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Contact
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date Added
                  </th>
                  <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="subscriber in subscribers.data" :key="subscriber.id" class="hover:bg-gray-50" :class="{ 'bg-purple-50': isSelected(subscriber.id) }">
                  <td class="px-3 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <input
                        type="checkbox"
                        class="h-4 w-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                        :checked="isSelected(subscriber.id)"
                        @change="toggleSelection(subscriber.id)"
                      >
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-purple-800">
                      {{ getFullName(subscriber) }}
                    </div>
                    <div class="text-xs text-gray-500">{{ subscriber.email }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span :class="[getStatusBadgeClass(subscriber.status), 'px-2 py-1 text-xs rounded-full']">
                      {{ formatStatus(subscriber.status) }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ subscriber.created_at }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <Link :href="route('user.contacts.edit', subscriber.id)" class="text-purple-600 hover:text-purple-900">
                      Edit
                    </Link>
                  </td>
                </tr>
                <tr v-if="subscribers.data.length === 0">
                  <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                    No contacts found. Add your first contact to get started.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Pagination -->
        <div v-if="subscribers.data.length > 0" class="mt-4 flex justify-between items-center">
          <div class="text-sm text-gray-500">
            Showing {{ subscribers.from }} to {{ subscribers.to }} of {{ subscribers.total }} contacts
          </div>
          <div class="flex space-x-1">
            <Link v-for="link in subscribers.links" :key="link.label" :href="link.url" v-html="link.label" class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium" :class="[
              link.active ? 'bg-purple-50 text-purple-600 border-purple-500' : 'text-gray-500 hover:bg-gray-50',
              link.url === null ? 'opacity-50 cursor-default' : ''
            ]" />
          </div>
        </div>
      </div>
    </div>

    <!-- Bulk Delete Confirmation Modal -->
    <div v-if="confirmingBulkDelete" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="confirmingBulkDelete = false"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
          <div>
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
              <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Delete {{ selectionCount }} contacts?
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  Are you sure you want to delete these contacts? This action cannot be undone.
                </p>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
            <button @click="performBulkDelete" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:col-start-2 sm:text-sm" :disabled="processing">
              Delete
            </button>
            <button @click="confirmingBulkDelete = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:mt-0 sm:col-start-1 sm:text-sm">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bulk Status Change Confirmation Modal -->
    <div v-if="confirmingBulkStatusChange" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="confirmingBulkStatusChange = false"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
          <div>
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-purple-100">
              <svg class="h-6 w-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Change status of {{ selectionCount }} contacts?
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  Are you sure you want to mark {{ selectionCount }} contacts as {{ formatStatus(statusToSet) }}?
                </p>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
            <button @click="performBulkStatusChange" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-purple-600 text-base font-medium text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:col-start-2 sm:text-sm" :disabled="processing">
              Confirm
            </button>
            <button @click="confirmingBulkStatusChange = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:mt-0 sm:col-start-1 sm:text-sm">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Import Modal -->
    <div v-if="importModalOpen" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="closeImportModal"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
          <!-- Success state -->
          <div v-if="importSuccess" class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
              <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Import Successful!</h3>
            <div class="mt-4 px-4 py-3 bg-gray-50 rounded-lg">
              <dl class="grid grid-cols-2 gap-4">
                <div>
                  <dt class="text-sm font-medium text-gray-500">Imported</dt>
                  <dd class="mt-1 text-lg font-semibold text-green-600">{{ importStats?.imported || 0 }}</dd>
                </div>
                <div>
                  <dt class="text-sm font-medium text-gray-500">Duplicates</dt>
                  <dd class="mt-1 text-lg font-semibold text-yellow-600">{{ importStats?.duplicates || 0 }}</dd>
                </div>
                <div>
                  <dt class="text-sm font-medium text-gray-500">Errors</dt>
                  <dd class="mt-1 text-lg font-semibold text-red-600">{{ importStats?.errors || 0 }}</dd>
                </div>
                <div>
                  <dt class="text-sm font-medium text-gray-500">Total</dt>
                  <dd class="mt-1 text-lg font-semibold text-gray-900">{{ importStats?.total || 0 }}</dd>
                </div>
              </dl>
            </div>
            <div class="mt-5 sm:mt-6">
              <button @click="closeImportModal" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-purple-600 text-base font-medium text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:text-sm">
                Close
              </button>
            </div>
          </div>
          
          <!-- Upload form state -->
          <div v-else>
            <div class="text-center sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Import Contacts
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  Upload a CSV file with your contacts. The file should include at minimum an email column.
                </p>
              </div>
            </div>
            
            <!-- Error messages -->
            <div v-if="importErrors.length > 0" class="mt-3 bg-red-50 border border-red-200 rounded-md p-4">
              <div class="flex">
                <div class="flex-shrink-0">
                  <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="ml-3">
                  <h3 class="text-sm font-medium text-red-800">
                    There were errors with your import
                  </h3>
                  <div class="mt-2 text-sm text-red-700">
                    <ul class="list-disc pl-5 space-y-1">
                      <li v-for="(error, index) in importErrors" :key="index">{{ error }}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="mt-4">
              <label class="block text-sm font-medium text-gray-700">
                CSV File
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none">
                      <span>Upload a file</span>
                      <input id="file-upload" name="file-upload" type="file" accept=".csv" class="sr-only" @change="handleFileChange">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs text-gray-500">
                    CSV up to 10MB
                  </p>
                </div>
              </div>
              <div v-if="importFile" class="mt-2 text-sm text-gray-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                {{ importFile.name }}
              </div>
            </div>
            
            <div class="mt-6 bg-gray-50 rounded-md p-4">
              <h4 class="text-sm font-medium text-gray-900">Expected CSV Format:</h4>
              <p class="mt-1 text-xs text-gray-500">Your CSV should include the following columns:</p>
              <ul class="mt-2 text-xs text-gray-500 list-disc pl-5 space-y-1">
                <li>email (required)</li>
                <li>first_name (optional)</li>
                <li>last_name (optional)</li>
                <li>status (optional, defaults to "active")</li>
              </ul>
            </div>
            
            <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
              <button @click="submitImport" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-purple-600 text-base font-medium text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:col-start-2 sm:text-sm" :disabled="importing">
                <svg v-if="importing" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                {{ importing ? 'Importing...' : 'Import Contacts' }}
              </button>
              <button @click="closeImportModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                Cancel
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template> 