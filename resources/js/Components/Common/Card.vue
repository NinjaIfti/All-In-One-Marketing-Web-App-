<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  title: {
    type: String,
    default: ''
  },
  subtitle: {
    type: String,
    default: ''
  },
  noPadding: {
    type: Boolean,
    default: false
  },
  footer: {
    type: Boolean,
    default: false
  }
});
</script>

<template>
  <div class="bg-white rounded-lg shadow overflow-hidden">
    <div v-if="title || subtitle" class="px-6 py-4 border-b border-gray-200">
      <h3 v-if="title" class="text-lg font-medium text-gray-900">{{ title }}</h3>
      <p v-if="subtitle" class="mt-1 text-sm text-gray-500">{{ subtitle }}</p>
    </div>
    
    <div :class="{ 'p-6': !noPadding }">
      <slot></slot>
    </div>
    
    <div v-if="footer" class="px-6 py-4 bg-gray-50 border-t border-gray-200">
      <slot name="footer"></slot>
    </div>
  </div>
</template> 