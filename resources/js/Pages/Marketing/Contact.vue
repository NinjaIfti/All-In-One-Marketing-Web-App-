<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';

// Contact form data
const contactForm = ref({
  name: '',
  email: '',
  phone: '',
  company: '',
  message: '',
  contactReason: 'general'
});

const submitting = ref(false);

const submitContactForm = async () => {
  submitting.value = true;
  
  try {
    // Add your form submission logic here
    console.log('Contact form submitted:', contactForm.value);
    
    // Simulate API call
    await new Promise(resolve => setTimeout(resolve, 2000));
    
    // Handle success
    alert('Thank you for contacting us! We will get back to you within 24 hours.');
    
    // Reset form
    contactForm.value = {
      name: '',
      email: '',
      phone: '',
      company: '',
      message: '',
      contactReason: 'general'
    };
  } catch (error) {
    console.error('Contact form submission error:', error);
    alert('Something went wrong. Please try again or use the chat feature.');
  } finally {
    submitting.value = false;
  }
};
</script>

<template>
  <Head title="Get In Touch - All In One Marketing" />
  
  <MarketingLayout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white py-16">
      <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
          <h1 class="text-4xl lg:text-5xl font-bold mb-6">Need some help? Let's Talk</h1>
          <p class="text-xl lg:text-2xl text-gray-300 leading-relaxed">
            We are always here to answer any question you may have about using our platform and growing your business
          </p>
        </div>
      </div>
    </section>

    <!-- Main Contact Options -->
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          
          <!-- Chat With Us -->
          <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 text-center hover:shadow-xl transition-shadow duration-300">
            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
              </svg>
            </div>
            
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Chat With Us</h3>
            
            <div class="space-y-4 mb-8 text-left">
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-blue-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700">Chat with a customer success representative</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-blue-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700">Chat with us to schedule a demo</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-blue-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <a href="/automate" class="text-blue-600 hover:text-blue-800 font-semibold underline">
                  Watch a product demo
                </a>
              </div>
            </div>
            
            <p class="text-sm text-gray-600 mb-6">
              For chat features, click on the icon at the lower right hand side of your screen.
            </p>
            
            <div class="flex items-center justify-center space-x-2 text-green-600">
              <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
              <span class="font-semibold">Online Now</span>
            </div>
          </div>

          <!-- Speak With Sales Team -->
          <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 text-center hover:shadow-xl transition-shadow duration-300">
            <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v2m10-2v2M7 20c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </div>
            
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Speak With The Sales Team</h3>
            
            <div class="space-y-4 mb-8 text-left">
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-orange-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700">Schedule a demo with a sales representative</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-orange-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700">Speak with a Small Business Consultant</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-orange-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700">See how All In One Marketing has served businesses like yours</span>
              </div>
            </div>
            
            <a 
              href="/automate" 
              class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-lg transition-colors duration-200"
            >
              Learn More
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </a>
          </div>

          <!-- Log In To Get Support -->
          <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 text-center hover:shadow-xl transition-shadow duration-300">
            <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
              </svg>
            </div>
            
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Log In To Get Support</h3>
            
            <div class="space-y-4 mb-8 text-left">
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-green-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700">Get answers to any software questions</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-green-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700">Receive technical help</span>
              </div>
              <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-green-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7-293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700">Ask any question about the platform and get the answers you need</span>
              </div>
            </div>
            
            <a 
              href="https://app.allinonemarketing.com" 
              target="_blank"
              class="inline-flex items-center px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition-colors duration-200"
            >
              Log in to chat
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Form Section -->
    <section class="bg-gray-50 py-16">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
          <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
              Send Us A Message
            </h2>
            <p class="text-lg text-gray-600">
              Fill out the form below and we'll get back to you within 24 hours
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-12">
            <form @submit.prevent="submitContactForm" class="space-y-6">
              <!-- Contact Reason -->
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">What can we help you with?</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors duration-200" :class="contactForm.contactReason === 'demo' ? 'border-orange-500 bg-orange-50' : 'border-gray-300'">
                    <input type="radio" v-model="contactForm.contactReason" value="demo" class="sr-only">
                    <div class="w-4 h-4 border-2 rounded-full mr-3" :class="contactForm.contactReason === 'demo' ? 'border-orange-500 bg-orange-500' : 'border-gray-300'">
                      <div v-if="contactForm.contactReason === 'demo'" class="w-full h-full bg-white rounded-full scale-50"></div>
                    </div>
                    <span class="font-medium">Schedule Demo</span>
                  </label>
                  
                  <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors duration-200" :class="contactForm.contactReason === 'support' ? 'border-orange-500 bg-orange-50' : 'border-gray-300'">
                    <input type="radio" v-model="contactForm.contactReason" value="support" class="sr-only">
                    <div class="w-4 h-4 border-2 rounded-full mr-3" :class="contactForm.contactReason === 'support' ? 'border-orange-500 bg-orange-500' : 'border-gray-300'">
                      <div v-if="contactForm.contactReason === 'support'" class="w-full h-full bg-white rounded-full scale-50"></div>
                    </div>
                    <span class="font-medium">Get Support</span>
                  </label>
                  
                  <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors duration-200" :class="contactForm.contactReason === 'general' ? 'border-orange-500 bg-orange-50' : 'border-gray-300'">
                    <input type="radio" v-model="contactForm.contactReason" value="general" class="sr-only">
                    <div class="w-4 h-4 border-2 rounded-full mr-3" :class="contactForm.contactReason === 'general' ? 'border-orange-500 bg-orange-500' : 'border-gray-300'">
                      <div v-if="contactForm.contactReason === 'general'" class="w-full h-full bg-white rounded-full scale-50"></div>
                    </div>
                    <span class="font-medium">General Inquiry</span>
                  </label>
                </div>
              </div>

              <!-- Name and Email -->
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                  <input 
                    id="name"
                    v-model="contactForm.name"
                    type="text" 
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                    placeholder="Your full name"
                  >
                </div>
                
                <div>
                  <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                  <input 
                    id="email"
                    v-model="contactForm.email"
                    type="email" 
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                    placeholder="your@email.com"
                  >
                </div>
              </div>

              <!-- Phone and Company -->
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                  <input 
                    id="phone"
                    v-model="contactForm.phone"
                    type="tel" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                    placeholder="(555) 123-4567"
                  >
                </div>
                
                <div>
                  <label for="company" class="block text-sm font-semibold text-gray-700 mb-2">Company Name</label>
                  <input 
                    id="company"
                    v-model="contactForm.company"
                    type="text" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                    placeholder="Your company name"
                  >
                </div>
              </div>

              <!-- Message -->
              <div>
                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message *</label>
                <textarea 
                  id="message"
                  v-model="contactForm.message"
                  rows="5"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent resize-vertical"
                  placeholder="Tell us how we can help you..."
                ></textarea>
              </div>

              <!-- Submit Button -->
              <div class="text-center">
                <button 
                  type="submit"
                  class="inline-flex items-center px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold text-lg rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
                  :disabled="submitting"
                >
                  <span v-if="!submitting">Send Message</span>
                  <span v-else class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Sending...
                  </span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Integration Info Section -->
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
          <div class="mb-8">
            <img 
              src="/images/all-in-one-marketing-integrations.png" 
              alt="All In One Marketing Integrations" 
              class="w-full max-w-md mx-auto h-auto"
            >
          </div>
          
          <h2 class="text-3xl font-bold text-gray-900 mb-6">Integration Info</h2>
          <p class="text-lg text-gray-600 mb-8">
            Our platform integrates with hundreds of popular business tools and services to streamline your workflow and maximize efficiency.
          </p>
          
          <a 
            href="/features" 
            class="inline-flex items-center px-8 py-4 bg-slate-800 hover:bg-slate-900 text-white font-semibold rounded-lg transition-colors duration-200"
          >
            See More
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>
        </div>
      </div>
    </section>

    <!-- Value Proposition -->
    <section class="bg-gradient-to-br from-slate-800 to-slate-900 text-white py-16">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold mb-8">
          Close more sales when combining our marketing automations tool with our powerful CRM
        </h2>
        <a 
          href="/automate" 
          class="inline-flex items-center px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold text-lg rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
        >
          Learn More
        </a>
      </div>
    </section>

    <!-- Always Here Section -->
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
            We're Always Here To Help
          </h2>
        </div>

        <!-- Growth Section -->
        <div class="text-center mb-16">
          <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
            We've Helped Thousands of Business Owners <span class="text-orange-500 font-black">Grow Their Revenue</span>
          </h3>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            With over 100 years of combined experience working with thousands of business owners, All In One Marketing was specifically developed to help increase business revenue.
          </p>
        </div>

        <!-- Support Features -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-4xl mx-auto">
          <div class="text-center">
            <div class="w-20 h-20 mx-auto mb-6 bg-blue-100 rounded-full flex items-center justify-center">
              <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
              </svg>
            </div>
            <h4 class="text-xl font-bold text-gray-900 mb-4">Support Network</h4>
            <p class="text-gray-600">
              Get access to our professional support network. Our team will help answer any questions you have about using the software.
            </p>
          </div>

          <div class="text-center">
            <div class="w-20 h-20 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center">
              <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v2m10-2v2M7 20c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </div>
            <h4 class="text-xl font-bold text-gray-900 mb-4">Community of Business Owners</h4>
            <p class="text-gray-600">
              Join thousands of business owners just like you. Make new connections at our in-person masterminds and ask any questions you have about the software.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Final CTA -->
    <section class="bg-gradient-to-r from-orange-500 to-orange-600 py-16">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
          
          <!-- Left Content -->
          <div class="text-white">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">
              Try <span class="font-black">ALL IN ONE Marketing Software</span> for yourself
            </h2>
            <p class="text-xl text-orange-100 mb-8">
              Join thousands of successful business owners who have transformed their operations with our all-in-one platform.
            </p>
            
            <!-- Features List -->
            <div class="space-y-3">
              <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-orange-200" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-orange-100">Replace dozens of expensive tools</span>
              </div>
              <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-orange-200" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-orange-100">Save thousands per year</span>
              </div>
              <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-orange-200" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-orange-100">24/7 support included</span>
              </div>
              <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-orange-200" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-orange-100">Unlimited usage - no monthly fees</span>
              </div>
            </div>
          </div>
          
          <!-- Right CTA -->
          <div class="text-center lg:text-right">
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-8">
              <h3 class="text-2xl font-bold text-white mb-6">Ready to Get Started?</h3>
              
              <!-- Contact Methods -->
              <div class="space-y-4 mb-8">
                <div class="flex items-center justify-center lg:justify-start space-x-3 text-orange-100">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                  </svg>
                  <span>Live chat support available</span>
                </div>
                <div class="flex items-center justify-center lg:justify-start space-x-3 text-orange-100">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                  </svg>
                  <span>sales@allinonemarketing.com</span>
                </div>
              </div>
              
              <a 
                href="/automate" 
                class="inline-flex items-center px-8 py-4 bg-white text-orange-500 font-bold text-lg rounded-lg hover:bg-gray-100 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
              >
                Learn More
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
              <p class="text-orange-100 text-sm mt-4">One-time fee of $97 • No monthly subscriptions</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MarketingLayout>
</template>

<style scoped>
/* Custom styles for radio buttons */
input[type="radio"]:checked + .w-4 {
  @apply border-orange-500 bg-orange-500;
}

input[type="radio"]:checked + .w-4 > div {
  @apply bg-white;
}
</style>