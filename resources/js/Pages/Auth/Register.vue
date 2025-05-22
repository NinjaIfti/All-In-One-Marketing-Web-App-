<script setup>
import { ref, reactive } from 'vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';

const form = useForm({
  name: '',
  email: '',
  phone: '',
  terms: true,
});

const errors = reactive({
  name: '',
  email: '',
  phone: '',
});

const isSubmitting = ref(false);
const submissionSuccess = ref(false);

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
  
  // Validate phone
  if (!form.phone.trim()) {
    errors.phone = 'Phone number is required';
    valid = false;
  } else if (!/^[\d\s()+-]+$/.test(form.phone)) {
    errors.phone = 'Please enter a valid phone number';
    valid = false;
  }
  
  return valid;
};

const submit = () => {
  if (!validateForm()) return;
  
  isSubmitting.value = true;
  
  // Store user info in localStorage for the registration page to use
  localStorage.setItem('pbj_lead', JSON.stringify({
    name: form.name,
    email: form.email,
    phone: form.phone
  }));
  
  // After a brief delay, redirect to the registration page
  setTimeout(() => {
    window.location.href = '/register';
  }, 800);
};
</script>

<template>
  <Head title="Sign Up | PB&J Solutions" />

  <AuthLayout>
    <div class="w-full max-w-5xl mx-auto">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-8 md:p-12">
          <div class="text-center">
            <img class="h-16 mx-auto mb-6" src="/images/logo.png" alt="PB&J Solutions">
            <h1 class="text-2xl md:text-3xl font-bold text-purple-900">Even Elite Marketers Can't Believe It...</h1>
            <h2 class="text-3xl md:text-4xl font-bold text-purple-900 mt-4 mb-8">"This One Tool Is Making All Other Business Tools & Software Obsolete—Find Out Why..."</h2>
          </div>
          
          <!-- Success Message -->
          <div v-if="submissionSuccess" class="max-w-2xl mx-auto bg-green-50 border border-green-200 rounded-lg p-6 text-center">
            <svg class="h-12 w-12 text-green-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="text-2xl font-bold text-green-800 mb-2">Thank You!</h3>
            <p class="text-green-700 mb-4">Your information has been submitted successfully. We'll be in touch soon!</p>
            <button 
              @click="submissionSuccess = false" 
              class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg"
            >
              Submit Another
            </button>
          </div>
          
          <!-- Form -->
          <form v-else @submit.prevent="submit" class="max-w-2xl mx-auto">
            <!-- Name Field -->
            <div class="mb-4">
              <input 
                id="name"
                type="text" 
                v-model="form.name" 
                autocomplete="name"
                placeholder="Your Name*"
                class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                :class="{'border-red-500': errors.name}"
              />
              <p v-if="errors.name" class="mt-1 text-sm text-red-600">{{ errors.name }}</p>
            </div>
            
            <!-- Email Field -->
            <div class="mb-4">
              <input 
                id="email"
                type="email" 
                v-model="form.email" 
                autocomplete="email"
                placeholder="Your Email Address*"
                class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                :class="{'border-red-500': errors.email}"
              />
              <p v-if="errors.email" class="mt-1 text-sm text-red-600">{{ errors.email }}</p>
            </div>
            
            <!-- Phone Field -->
            <div class="mb-4">
              <div class="flex">
                <div class="w-16 bg-gray-100 flex items-center justify-center rounded-l-lg border border-gray-300 border-r-0">
                  <span class="text-gray-500">🇺🇸</span>
                </div>
                <input 
                  id="phone"
                  type="tel" 
                  v-model="form.phone" 
                  autocomplete="tel"
                  placeholder="Your Phone*"
                  class="flex-1 px-4 py-4 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                  :class="{'border-red-500': errors.phone}"
                />
              </div>
              <p v-if="errors.phone" class="mt-1 text-sm text-red-600">{{ errors.phone }}</p>
            </div>
            
            <!-- Submit Button -->
            <button 
              type="submit"
              class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 px-6 rounded-lg text-xl transition duration-200 mt-4"
              :disabled="isSubmitting"
            >
              <span v-if="isSubmitting">
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Processing...
              </span>
              <span v-else>Unlock Now</span>
            </button>
            
            <!-- Testimonials -->
            <div class="mt-10 grid md:grid-cols-2 gap-6">
              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/42.jpg" alt="Chris Allen">
                </div>
                <div>
                  <p class="text-sm text-gray-700">"Over 80% open rate in the email blast I sent using this tool!" – Chris Allen</p>
                </div>
              </div>
              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/24.jpg" alt="Lauren McClean">
                </div>
                <div>
                  <p class="text-sm text-gray-700">"Generated 5X more sales in just a week after using this tool!" – Lauren McClean</p>
                </div>
              </div>
              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/56.jpg" alt="Kristen Destefino">
                </div>
                <div>
                  <p class="text-sm text-gray-700">"Landed my biggest client yet thanks to these qualified leads" – Kristen Destefino</p>
                </div>
              </div>
              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Smith">
                </div>
                <div>
                  <p class="text-sm text-gray-700">"Improved my lookalike ad targeting on Facebook ads" – Michael Smith</p>
                </div>
              </div>
            </div>
          </form>
          
          <!-- Footer -->
          <div class="text-center text-xs text-gray-500 mt-12">
            <p>PB&J Solutions</p>
            <div class="mt-2 flex justify-center space-x-4">
              <a href="#" class="text-gray-500 hover:text-purple-500">Privacy Policy</a>
              <span>|</span>
              <a href="#" class="text-gray-500 hover:text-purple-500">Terms & Conditions</a>
              <span>|</span>
              <a href="#" class="text-gray-500 hover:text-purple-500">Refund Policy</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthLayout>
</template>

<style scoped>
.text-purple-500 {
  color: #8b5cf6;
}

.text-purple-600 {
  color: #7c3aed;
}

.text-purple-700 {
  color: #6d28d9;
}

.text-purple-900 {
  color: #4c1d95;
}

.bg-purple-500 {
  background-color: #8b5cf6;
}

.bg-purple-600 {
  background-color: #7c3aed;
}

.bg-purple-700 {
  background-color: #6d28d9;
}

.focus\:ring-purple-500:focus {
  --tw-ring-color: #8b5cf6;
}

.focus\:border-purple-500:focus {
  border-color: #8b5cf6;
}

.hover\:text-purple-500:hover {
  color: #8b5cf6;
}

.hover\:bg-purple-700:hover {
  background-color: #6d28d9;
}
</style> 