<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

// These would normally come from the backend via props
const stats = [
  { name: 'Total Contacts', value: '3,254' },
  { name: 'Active Campaigns', value: '12' },
  { name: 'Emails Sent', value: '24,521' },
  { name: 'SMS Sent', value: '8,742' },
];

const recentLeads = [
  { id: 1, name: 'John Doe', email: 'john@example.com', phone: '(555) 123-4567', date: '2023-06-15', status: 'New' },
  { id: 2, name: 'Jane Smith', email: 'jane@example.com', phone: '(555) 234-5678', date: '2023-06-14', status: 'Contacted' },
  { id: 3, name: 'Bob Johnson', email: 'bob@example.com', phone: '(555) 345-6789', date: '2023-06-13', status: 'Qualified' },
  { id: 4, name: 'Sarah Williams', email: 'sarah@example.com', phone: '(555) 456-7890', date: '2023-06-12', status: 'New' },
  { id: 5, name: 'Mike Brown', email: 'mike@example.com', phone: '(555) 567-8901', date: '2023-06-11', status: 'Contacted' },
];
</script>

<template>
  <Head title="Admin Dashboard" />
  
  <AdminLayout>
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Stats Overview -->
        <div class="mt-6">
          <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div 
              v-for="stat in stats" 
              :key="stat.name" 
              class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6"
            >
              <dt class="text-sm font-medium text-gray-500 truncate">{{ stat.name }}</dt>
              <dd class="mt-1 text-3xl font-semibold text-blue-600">{{ stat.value }}</dd>
            </div>
          </dl>
        </div>
        
        <!-- Recent Leads -->
        <div class="mt-8">
          <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
              <h3 class="text-lg font-medium text-gray-900">Recent Leads</h3>
            </div>
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Actions</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="lead in recentLeads" :key="lead.id">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ lead.name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ lead.email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ lead.phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ lead.date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span 
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                        :class="{
                          'bg-green-100 text-green-800': lead.status === 'Qualified',
                          'bg-blue-100 text-blue-800': lead.status === 'Contacted',
                          'bg-yellow-100 text-yellow-800': lead.status === 'New'
                        }"
                      >
                        {{ lead.status }}
                      </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
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
  </AdminLayout>
</template> 