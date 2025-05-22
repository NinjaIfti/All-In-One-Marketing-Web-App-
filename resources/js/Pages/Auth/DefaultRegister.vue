<script setup>
import { ref, onMounted } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
    terms: true,
});

onMounted(() => {
    // Try to get lead data from localStorage
    const leadData = localStorage.getItem('pbj_lead');
    if (leadData) {
        try {
            const parsed = JSON.parse(leadData);
            form.name = parsed.name || '';
            form.email = parsed.email || '';
            form.phone = parsed.phone || '';
            // Clear the stored data after using it
            localStorage.removeItem('pbj_lead');
        } catch (e) {
            console.error('Error parsing lead data:', e);
        }
    }
});

const submit = () => {
    form.post(route('register'));
};
</script>

<template>
    <Head title="Register | PB&J Solutions" />

    <AuthLayout>
        <div class="w-full max-w-md mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-8">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <img class="h-12 mx-auto mb-4" src="/images/logo.png" alt="PB&J Solutions">
                        <h1 class="text-2xl font-bold text-purple-900">Complete Your Registration</h1>
                        <p class="text-gray-600 mt-2">Create your account to access PB&J Solutions</p>
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
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                :class="{'border-red-500': form.errors.name}"
                            />
                            <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
                        </div>
                        
                        <!-- Email Field -->
                        <div class="mb-5">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input 
                                id="email"
                                type="email" 
                                v-model="form.email" 
                                autocomplete="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                :class="{'border-red-500': form.errors.email}"
                            />
                            <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
                        </div>
                        
                        <!-- Phone Field -->
                        <div class="mb-5">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input 
                                id="phone"
                                type="tel" 
                                v-model="form.phone" 
                                autocomplete="tel"
                                placeholder="(555) 123-4567" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                :class="{'border-red-500': form.errors.phone}"
                            />
                            <p v-if="form.errors.phone" class="mt-1 text-sm text-red-600">{{ form.errors.phone }}</p>
                        </div>
                        
                        <!-- Password Field -->
                        <div class="mb-5">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input 
                                id="password"
                                type="password" 
                                v-model="form.password" 
                                autocomplete="new-password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                :class="{'border-red-500': form.errors.password}"
                            />
                            <p v-if="form.errors.password" class="mt-1 text-sm text-red-600">{{ form.errors.password }}</p>
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
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                :class="{'border-red-500': form.errors.password_confirmation}"
                            />
                            <p v-if="form.errors.password_confirmation" class="mt-1 text-sm text-red-600">
                                {{ form.errors.password_confirmation }}
                            </p>
                        </div>
                        
                        <!-- Terms Checkbox -->
                        <div class="mb-6">
                            <label class="flex items-start">
                                <input 
                                    type="checkbox" 
                                    v-model="form.terms" 
                                    class="rounded border-gray-300 text-purple-500 focus:ring-purple-500 mt-1"
                                    :class="{'border-red-500': form.errors.terms}"
                                />
                                <div class="ml-2">
                                    <span class="text-sm text-gray-600">I agree to the</span>
                                    <a href="#" class="text-sm text-purple-500 hover:text-purple-600 mx-1">Terms of Service</a>
                                    <span class="text-sm text-gray-600">and</span>
                                    <a href="#" class="text-sm text-purple-500 hover:text-purple-600 mx-1">Privacy Policy</a>
                                </div>
                            </label>
                            <p v-if="form.errors.terms" class="mt-1 text-sm text-red-600">{{ form.errors.terms }}</p>
                        </div>
                        
                        <!-- Submit Button -->
                        <button 
                            type="submit"
                            class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200"
                            :disabled="form.processing"
                        >
                            <span v-if="form.processing">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                Processing...
                            </span>
                            <span v-else>Complete Registration</span>
                        </button>
                    </form>
                    
                    <!-- Sign In Link -->
                    <div class="text-center mt-8">
                        <p class="text-gray-600 text-sm">
                            Already have an account?
                            <Link :href="route('login')" class="text-purple-500 hover:text-purple-600 font-medium">
                                Sign in
                            </Link>
                        </p>
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