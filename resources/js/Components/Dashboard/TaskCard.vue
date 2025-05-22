<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  title: {
    type: String,
    required: true
  },
  priority: {
    type: String,
    required: true
  },
  dueDate: {
    type: String,
    required: true
  },
  color: {
    type: String,
    default: 'bg-blue-500'
  }
});

const getPriorityColor = (priority) => {
  switch(priority.toLowerCase()) {
    case 'high': return 'bg-red-100 text-red-800';
    case 'medium': return 'bg-yellow-100 text-yellow-800';
    case 'low': return 'bg-green-100 text-green-800';
    default: return 'bg-gray-100 text-gray-800';
  }
};
</script>

<template>
  <div class="flex items-center p-3 rounded-lg bg-white shadow mb-2">
    <div class="w-1 self-stretch rounded-full mr-3" :class="color"></div>
    <div class="flex-1">
      <h4 class="text-sm font-medium text-gray-900">{{ title }}</h4>
      <div class="flex items-center mt-1">
        <span class="px-2 py-0.5 text-xs rounded-full" :class="getPriorityColor(priority)">
          {{ priority }}
        </span>
        <span class="text-xs text-gray-500 ml-2">
          <span class="sr-only">Due </span>{{ dueDate }}
        </span>
      </div>
    </div>
    <button class="p-1 rounded-full hover:bg-gray-100">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
      </svg>
    </button>
  </div>
</template> 