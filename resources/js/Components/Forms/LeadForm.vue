<template>
  <div class="bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-navy-900 mb-6 text-center">Get Started Today!</h2>
    
    <form @submit.prevent="submitForm">
      <div class="space-y-4">
        <!-- Name Field -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
          <input 
            type="text" 
            id="name" 
            v-model="form.name" 
            placeholder="Your Name" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
            :class="{'border-red-500': errors.name}"
          >
          <p v-if="errors.name" class="mt-1 text-sm text-red-600">{{ errors.name }}</p>
        </div>
        
        <!-- Email Field -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
          <input 
            type="email" 
            id="email" 
            v-model="form.email" 
            placeholder="your@email.com" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
            :class="{'border-red-500': errors.email}"
          >
          <p v-if="errors.email" class="mt-1 text-sm text-red-600">{{ errors.email }}</p>
        </div>
        
        <!-- Phone Field -->
        <div>
          <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
          <div class="flex">
            <div class="w-16 bg-gray-100 flex items-center justify-center rounded-l-lg border border-gray-300 border-r-0">
              <span class="text-gray-500">🇺🇸</span>
            </div>
            <input 
              type="tel" 
              id="phone" 
              v-model="form.phone" 
              placeholder="(555) 123-4567" 
              class="flex-1 px-4 py-2 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
              :class="{'border-red-500': errors.phone}"
            >
          </div>
          <p v-if="errors.phone" class="mt-1 text-sm text-red-600">{{ errors.phone }}</p>
        </div>
        
        <!-- Business Size Dropdown -->
        <div>
          <label for="businessSize" class="block text-sm font-medium text-gray-700 mb-1">Business Size</label>
          <select 
            id="businessSize" 
            v-model="form.businessSize" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
          >
            <option value="" disabled>Select your business size</option>
            <option value="solo">Solo Entrepreneur</option>
            <option value="small">Small Business (2-10 employees)</option>
            <option value="medium">Medium Business (11-50 employees)</option>
            <option value="large">Large Business (50+ employees)</option>
          </select>
        </div>
        
        <!-- Submit Button -->
        <button 
          type="submit" 
          class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center"
          :disabled="isSubmitting"
        >
          <svg v-if="isSubmitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
          {{ isSubmitting ? 'Processing...' : 'Get Started Now' }}
        </button>
      </div>
      
      <!-- Form Footer -->
      <div class="mt-4 text-center text-xs text-gray-500">
        <p class="flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
          Your information is secure and will never be shared
        </p>
        <p class="mt-2">
          By submitting this form, you agree to our <a href="#" class="text-orange-500 hover:underline">Terms of Service</a> and <a href="#" class="text-orange-500 hover:underline">Privacy Policy</a>
        </p>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';

// Form data
const form = reactive({
  name: '',
  email: '',
  phone: '',
  businessSize: ''
});

// Form validation errors
const errors = reactive({
  name: '',
  email: '',
  phone: ''
});

// Form submission state
const isSubmitting = ref(false);

// Form validation
const validateForm = () => {
  let valid = true;
  
  // Reset errors
  errors.name = '';
  errors.email = '';
  errors.phone = '';
  
  // Validate name
  if (!form.name.trim()) {
    errors.name = 'Name is required';
    valid = false;
  }
  
  // Validate email
  if (!form.email.trim()) {
    errors.email = 'Email is required';
    valid = false;
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) {
    errors.email = 'Please enter a valid email address';
    valid = false;
  }
  
  // Validate phone (optional validation)
  if (form.phone.trim() && !/^[\d\s()+-]+$/.test(form.phone)) {
    errors.phone = 'Please enter a valid phone number';
    valid = false;
  }
  
  return valid;
};

// Form submission
const submitForm = () => {
  if (!validateForm()) return;
  
  isSubmitting.value = true;
  
  // Simulate API call
  setTimeout(() => {
    // Success - would normally redirect or show success message
    console.log('Form submitted:', form);
    isSubmitting.value = false;
    
    // Reset form after submission
    form.name = '';
    form.email = '';
    form.phone = '';
    form.businessSize = '';
    
    // Show success alert
    alert('Thank you for your interest! We will contact you shortly.');
  }, 1500);
};
</script>

<style scoped>
.text-navy-900 {
  color: #0a1933;
}

.text-orange-500 {
  color: #f97316;
}

.bg-orange-500 {
  background-color: #f97316;
}

.bg-orange-600 {
  background-color: #ea580c;
}

.hover\:bg-orange-600:hover {
  background-color: #ea580c;
}

.focus\:ring-orange-500:focus {
  --tw-ring-color: #f97316;
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}

.focus\:border-orange-500:focus {
  border-color: #f97316;
}
</style>