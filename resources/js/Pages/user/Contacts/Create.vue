<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import UserLayout from '@/Layouts/User/UserLayout.vue';
import { ref } from 'vue';

const form = useForm({
  email: '',
  first_name: '',
  last_name: '',
});

const saving = ref(false);

const saveContact = () => {
  saving.value = true;
  
  form.post(route('user.contacts.store'), {
    onSuccess: () => {
      saving.value = false;
    },
    onError: () => {
      saving.value = false;
    }
  });
};
</script>

<template>
  <Head title="Add Contact | PB&J Solutions" />

  <UserLayout>
    <div class="py-6 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-purple-900">Add Contact</h1>
            <p class="mt-1 text-gray-600">Add a new subscriber to your contact list</p>
          </div>
          <div class="flex space-x-4">
            <Link :href="route('user.contacts')" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              Cancel
            </Link>
            <button @click="saveContact" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" :disabled="saving">
              <span v-if="saving">Saving...</span>
              <span v-else>Save Contact</span>
            </button>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
          <div class="grid grid-cols-1 gap-6">
            <!-- Email -->
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">Email Address <span class="text-red-500">*</span></label>
              <input type="email" id="email" v-model="form.email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="email@example.com" />
              <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
            </div>

            <!-- First Name -->
            <div>
              <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
              <input type="text" id="first_name" v-model="form.first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="John" />
              <p v-if="form.errors.first_name" class="mt-1 text-sm text-red-600">{{ form.errors.first_name }}</p>
            </div>

            <!-- Last Name -->
            <div>
              <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
              <input type="text" id="last_name" v-model="form.last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="Doe" />
              <p v-if="form.errors.last_name" class="mt-1 text-sm text-red-600">{{ form.errors.last_name }}</p>
            </div>
          </div>
        </div>

        <!-- Information Box -->
        <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
          <h2 class="text-lg font-medium text-purple-800 mb-2">Important Notes</h2>
          <ul class="list-disc list-inside text-sm text-purple-700 space-y-1">
            <li>Always ensure you have permission to add someone to your contact list.</li>
            <li>Contacts will be automatically set to "Active" status.</li>
            <li>You can import multiple contacts at once from the contacts page.</li>
          </ul>
        </div>
      </div>
    </div>
  </UserLayout>
</template> 