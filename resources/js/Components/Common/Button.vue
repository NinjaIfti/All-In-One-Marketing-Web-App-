<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  type: {
    type: String,
    default: 'button'
  },
  variant: {
    type: String,
    default: 'primary', // primary, secondary, outline, danger
    validator: (value) => ['primary', 'secondary', 'outline', 'danger'].includes(value)
  },
  size: {
    type: String,
    default: 'md', // sm, md, lg
    validator: (value) => ['sm', 'md', 'lg'].includes(value)
  },
  disabled: {
    type: Boolean,
    default: false
  },
  fullWidth: {
    type: Boolean,
    default: false
  },
  loading: {
    type: Boolean,
    default: false
  }
});

const getButtonClasses = () => {
  const baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg focus:outline-none transition duration-200';
  const widthClass = props.fullWidth ? 'w-full' : '';
  
  // Size classes
  let sizeClasses = '';
  if (props.size === 'sm') {
    sizeClasses = 'px-3 py-1.5 text-sm';
  } else if (props.size === 'lg') {
    sizeClasses = 'px-6 py-3 text-base';
  } else {
    sizeClasses = 'px-4 py-2 text-sm';
  }
  
  // Variant classes
  let variantClasses = '';
  if (props.variant === 'primary') {
    variantClasses = 'bg-orange-500 hover:bg-orange-600 text-white shadow-sm';
  } else if (props.variant === 'secondary') {
    variantClasses = 'bg-gray-100 hover:bg-gray-200 text-gray-800';
  } else if (props.variant === 'outline') {
    variantClasses = 'bg-white border border-gray-300 hover:bg-gray-50 text-gray-700';
  } else if (props.variant === 'danger') {
    variantClasses = 'bg-red-500 hover:bg-red-600 text-white';
  }
  
  // Disabled state
  if (props.disabled || props.loading) {
    variantClasses = 'bg-gray-300 text-gray-500 cursor-not-allowed';
  }
  
  return `${baseClasses} ${sizeClasses} ${variantClasses} ${widthClass}`;
};
</script>

<template>
  <button
    :type="type"
    :disabled="disabled || loading"
    :class="getButtonClasses()"
  >
    <svg v-if="loading" class="animate-spin -ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
    </svg>
    <slot></slot>
  </button>
</template> 