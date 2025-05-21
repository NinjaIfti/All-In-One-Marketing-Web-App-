<script setup>
import { ref, reactive } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';

const form = useForm({
  name: '',
  email: '',
  phone: '',
  password: '',
  password_confirmation: '',
  terms: false,
});

const errors = reactive({
  name: '',
  email: '',
  phone: '',
  password: '',
  password_confirmation: '',
  terms: '',
});

const isSubmitting = ref(false);

const validateForm = () => {
  let valid = true;
  
  // Reset errors
  errors.name = '';
  errors.email = '';
  errors.phone = '';
  errors.password = '';
  errors.password_confirmation = '';
  errors.terms = '';
  
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
  
  // Validate password
  if (!form.password) {
    errors.password = 'Password is required';
    valid = false;
  } else if (form.password.length < 8) {
    errors.password = 'Password must be at least 8 characters';
    valid = false;
  }
  
  // Validate password confirmation
  if (form.password !== form.password_confirmation) {
    errors.password_confirmation = 'Passwords do not match';
    valid = false;
  }
  
  // Validate terms
  if (!form.terms) {
    errors.terms = 'You must agree to the terms and conditions';
    valid = false;
  }
  
  return valid;
};

const submit = () => {
  if (!validateForm()) return;
  
  isSubmitting.value = true;
  
  form.post(route('register'), {
    onFinish: () => {
      isSubmitting.value = false;
    },
  });
};
</script>

<template>
  <Head title="Sign Up" />

  <AuthLayout>
    <div class="w-full max-w-lg mx-auto">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-8">
          <!-- Header -->
          <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-navy-900">Create Your Account</h1>
            <p class="text-gray-600 mt-2">Join thousands of marketers using our platform</p>
          </div>
          
          <!-- Form -->
          <form @submit.prevent="submit">
            <!-- Name Field -->
            <div class="mb-5">
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
              <input 
                id="name"
                type="text" 
                v-model="form.name" 
                autocomplete="name"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                :class="{'border-red-500': form.errors.name || errors.name}"
              />
              <p v-if="form.errors.name || errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name || errors.name }}</p>
            </div>
            
            <!-- Email Field -->
            <div class="mb-5">
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
              <input 
                id="email"
                type="email" 
                v-model="form.email" 
                autocomplete="email"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                :class="{'border-red-500': form.errors.email || errors.email}"
              />
              <p v-if="form.errors.email || errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email || errors.email }}</p>
            </div>
            
            <!-- Phone Field -->
            <div class="mb-5">
              <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number (Optional)</label>
              <div class="flex">
                <div class="w-16 bg-gray-100 flex items-center justify-center rounded-l-lg border border-gray-300 border-r-0">
                  <span class="text-gray-500">🇺🇸</span>
                </div>
                <input 
                  id="phone"
                  type="tel" 
                  v-model="form.phone" 
                  autocomplete="tel"
                  placeholder="(555) 123-4567" 
                  class="flex-1 px-4 py-3 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                  :class="{'border-red-500': form.errors.phone || errors.phone}"
                />
              </div>
              <p v-if="form.errors.phone || errors.phone" class="mt-1 text-sm text-red-600">{{ form.errors.phone || errors.phone }}</p>
            </div>
            
            <!-- Password Field -->
            <div class="mb-5">
              <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
              <input 
                id="password"
                type="password" 
                v-model="form.password" 
                autocomplete="new-password"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                :class="{'border-red-500': form.errors.password || errors.password}"
              />
              <p v-if="form.errors.password || errors.password" class="mt-1 text-sm text-red-600">{{ form.errors.password || errors.password }}</p>
              <p v-else class="mt-1 text-xs text-gray-500">Password must be at least 8 characters</p>
            </div>
            
            <!-- Confirm Password Field -->
            <div class="mb-6">
              <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
              <input 
                id="password_confirmation"
                type="password" 
                v-model="form.password_confirmation" 
                autocomplete="new-password"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                :class="{'border-red-500': form.errors.password_confirmation || errors.password_confirmation}"
              />
              <p v-if="form.errors.password_confirmation || errors.password_confirmation" class="mt-1 text-sm text-red-600">
                {{ form.errors.password_confirmation || errors.password_confirmation }}
              </p>
            </div>
            
            <!-- Terms Checkbox -->
            <div class="mb-6">
              <label class="flex items-start">
                <input 
                  type="checkbox" 
                  v-model="form.terms" 
                  class="rounded border-gray-300 text-orange-500 focus:ring-orange-500 mt-1"
                  :class="{'border-red-500': form.errors.terms || errors.terms}"
                />
                <div class="ml-2">
                  <span class="text-sm text-gray-600">I agree to the</span>
                  <a href="#" class="text-sm text-orange-500 hover:text-orange-600 mx-1">Terms of Service</a>
                  <span class="text-sm text-gray-600">and</span>
                  <a href="#" class="text-sm text-orange-500 hover:text-orange-600 ml-1">Privacy Policy</a>
                  <p v-if="form.errors.terms || errors.terms" class="mt-1 text-sm text-red-600">{{ form.errors.terms || errors.terms }}</p>
                </div>
              </label>
            </div>
            
            <!-- Register Button -->
            <button 
              type="submit" 
              class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center"
              :disabled="isSubmitting"
            >
              <svg v-if="isSubmitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              {{ isSubmitting ? 'Creating Account...' : 'Create Account' }}
            </button>
            
            <!-- Alternate SignUp Methods -->
            <div class="my-6 flex items-center">
              <div class="flex-1 border-t border-gray-300"></div>
              <div class="px-3 text-sm text-gray-500">Or sign up with</div>
              <div class="flex-1 border-t border-gray-300"></div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
              <button type="button" class="flex items-center justify-center py-2.5 px-4 border border-gray-300 rounded-lg hover:bg-gray-50">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                  <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                  <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                  <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                  <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.2 1.66l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                </svg>
                Google
              </button>
              <button type="button" class="flex items-center justify-center py-2.5 px-4 border border-gray-300 rounded-lg hover:bg-gray-50">
                <svg class="w-5 h-5 mr-2" fill="#1877F2" viewBox="0 0 24 24">
                  <path d="M20.9,2H3.1A1.1,1.1,0,0,0,2,3.1V20.9A1.1,1.1,0,0,0,3.1,22h9.58V14.25h-2.6v-3h2.6V9c0-2.57,1.57-3.98,3.87-3.98,1.1,0,2.05.08,2.33.12v2.7h-1.6c-1.25,0-1.5.59-1.5,1.47v1.92h3l-.39,3H15.8V22h5.1A1.1,1.1,0,0,0,22,20.9V3.1A1.1,1.1,0,0,0,20.9,2Z" />
                </svg>
                Facebook
              </button>
            </div>
          </form>
          
          <!-- Login Link -->
          <div class="text-center mt-8">
            <p class="text-gray-600 text-sm">
              Already have an account?
              <Link :href="route('login')" class="text-orange-500 hover:text-orange-600 font-medium">
                Sign in
              </Link>
            </p>
          </div>
        </div>
      </div>
      
      <!-- Security Notice -->
      <div class="text-center mt-6">
        <p class="flex items-center justify-center text-xs text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
          Secure signup. Your information is encrypted and secured
        </p>
      </div>
    </div>
  </AuthLayout>
</template>

<style scoped>
.text-navy-900 {
  color: #0a1933;
}

.text-orange-500 {
  color: #f97316;
}

.text-orange-600 {
  color: #ea580c;
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

.hover\:text-orange-600:hover {
  color: #ea580c;
}

.focus\:ring-orange-500:focus {
  --tw-ring-color: #f97316;
}

.focus\:border-orange-500:focus {
  border-color: #f97316;
}
</style>