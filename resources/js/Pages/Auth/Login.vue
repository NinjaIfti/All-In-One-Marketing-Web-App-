<script setup>
import { ref, reactive } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const errors = reactive({
  email: '',
  password: '',
});

const isSubmitting = ref(false);

const validateForm = () => {
  let valid = true;
  
  // Reset errors
  errors.email = '';
  errors.password = '';
  
  // Validate email
  if (!form.email.trim()) {
    errors.email = 'Email is required';
    valid = false;
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) {
    errors.email = 'Please enter a valid email address';
    valid = false;
  }
  
  // Validate password
  if (!form.password) {
    errors.password = 'Password is required';
    valid = false;
  }
  
  return valid;
};

const submit = () => {
  if (!validateForm()) return;
  
  isSubmitting.value = true;
  
  form.post(route('login'), {
    onFinish: () => {
      isSubmitting.value = false;
    },
  });
};
</script>

<template>
  <Head title="Login | PB&J Solutions" />

  <AuthLayout>
    <div class="w-full max-w-md mx-auto">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-8">
          <!-- Header -->
          <div class="text-center mb-8">
            <img class="h-12 mx-auto mb-4" src="/images/logo.png" alt="PB&J Solutions">
            <h1 class="text-2xl font-bold text-purple-900">Welcome Back</h1>
            <p class="text-gray-600 mt-2">Sign in to your account to continue</p>
          </div>
          
          <!-- Form -->
          <form @submit.prevent="submit">
            <!-- Email Field -->
            <div class="mb-6">
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
              <input 
                id="email"
                type="email" 
                v-model="form.email" 
                autocomplete="email"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                :class="{'border-red-500': form.errors.email || errors.email}"
              />
              <p v-if="form.errors.email || errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email || errors.email }}</p>
            </div>
            
            <!-- Password Field -->
            <div class="mb-6">
              <div class="flex justify-between items-center mb-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <Link :href="route('password.request')" class="text-sm text-purple-600 hover:text-purple-700">
                  Forgot Password?
                </Link>
              </div>
              <input 
                id="password"
                type="password" 
                v-model="form.password" 
                autocomplete="current-password"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                :class="{'border-red-500': form.errors.password || errors.password}"
              />
              <p v-if="form.errors.password || errors.password" class="mt-1 text-sm text-red-600">{{ form.errors.password || errors.password }}</p>
            </div>
            
            <!-- Remember Me -->
            <div class="mb-6">
              <label class="flex items-center">
                <input 
                  type="checkbox" 
                  v-model="form.remember" 
                  class="rounded border-gray-300 text-purple-600 focus:ring-purple-500"
                />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
              </label>
            </div>
            
            <!-- Login Button -->
            <button 
              type="submit"
              class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center"
              :disabled="isSubmitting"
            >
              <span v-if="isSubmitting">
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Processing...
              </span>
              <span v-else>Sign In</span>
            </button>
            
            <!-- Alternate SignIn Methods -->
            <div class="my-6 flex items-center">
              <div class="flex-1 border-t border-gray-300"></div>
              <div class="px-3 text-sm text-gray-500">Or continue with</div>
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
          
          <!-- Sign Up Link -->
          <div class="text-center mt-8">
            <p class="text-gray-600 text-sm">
              Don't have an account?
              <Link :href="route('pbj.solutions')" class="text-purple-600 hover:text-purple-700 font-medium">
                Sign up
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
          Secure login. Your information is encrypted and secured
        </p>
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

.hover\:text-purple-700:hover {
  color: #6d28d9;
}

.hover\:bg-purple-700:hover {
  background-color: #6d28d9;
}
</style>