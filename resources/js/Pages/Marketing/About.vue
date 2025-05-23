<script setup>
import { Head } from '@inertiajs/vue3';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
</script>

<template>
  <Head title="About - All In One Marketing" />
  
  <MarketingLayout>
    <!-- Hero Section - Redesigned -->
    <section class="relative bg-[#1e0933] text-white py-24 overflow-hidden">
      <!-- Background Pattern -->
      <div class="absolute inset-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
          <defs>
            <pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse">
              <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#5b4b8a" stroke-width="1"/>
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
      </div>

      <!-- Accent Circle -->
      <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#5b4b8a] opacity-20 blur-3xl"></div>
      <div class="absolute -bottom-32 -left-32 w-96 h-96 rounded-full bg-[#a67c5b] opacity-10 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative">
        <div class="max-w-4xl mx-auto">
          <div class="flex flex-col md:flex-row items-center gap-8">
            <!-- Left Content -->
            <div class="md:w-3/5 space-y-6">
              <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#5b4b8a] bg-opacity-20 text-[#c9b3e3] text-sm font-medium mb-2">
                <span class="w-2 h-2 rounded-full bg-[#a67c5b] mr-2"></span>
                Strategic Business Development
              </div>
              <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                Transforming Businesses with <span class="text-[#c9b3e3]">Laquinda Johnson</span>
              </h1>
              <p class="text-lg text-[#c9b3e3] leading-relaxed">
                As a pioneering entrepreneur, inventor of the infomercial, and As Seen On TV maven, Laquinda has driven <span class="text-[#a67c5b] font-bold">$6B+ in global sales</span> and helped scale Celsius to a <span class="text-[#a67c5b] font-bold">$15B market cap</span>.
              </p>
              <div class="flex flex-wrap items-center gap-4 pt-2">
                <a href="#expertise" class="inline-flex items-center px-6 py-3 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-medium rounded-lg transition-colors duration-200">
                  Our Expertise
                </a>
                <a href="#success-stories" class="inline-flex items-center px-6 py-3 border border-[#5b4b8a] text-[#c9b3e3] hover:bg-[#5b4b8a] hover:bg-opacity-10 font-medium rounded-lg transition-colors duration-200">
                  Success Stories
                </a>
              </div>
            </div>
            
            <!-- Right Circle Element -->
            <div class="md:w-2/5">
              <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-br from-[#5b4b8a] to-[#1e0933] rounded-full opacity-20 blur-md"></div>
                <img 
                  src="/images/me.jpg" 
                  alt="Laquinda Johnson" 
                  class="relative w-64 h-64 mx-auto object-cover rounded-full border-4 border-[#c9b3e3] shadow-xl"
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Expert Profile Section - Replacing Image Section -->
    <section id="expertise" class="bg-white py-16">
      <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
          <!-- Section Header -->
          <div class="text-center mb-16">
            <div class="inline-block mb-4">
              <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
              <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Leadership & Expertise</span>
              <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">Strategic Vision & Proven Results</h2>
            <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
              With decades of experience leading successful business ventures, our approach combines innovation, strategic planning, and market expertise.
            </p>
          </div>
          
          <!-- Expert Profile Cards -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-[#f8f5fc] rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 relative overflow-hidden group">
              <div class="absolute -right-16 -top-16 w-32 h-32 bg-[#c9b3e3] opacity-20 rounded-full group-hover:bg-[#5b4b8a] group-hover:opacity-30 transition-all duration-300"></div>
              <div class="relative">
                <div class="flex items-center justify-center mb-6 w-16 h-16 bg-[#e2d2f4] rounded-lg text-[#5b4b8a]">
                  <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                  </svg>
                </div>
                <h3 class="text-xl font-bold text-[#1e0933] mb-3">Strategic Growth</h3>
                <p class="text-[#2f1652] mb-5">Implementing data-driven strategies to scale businesses effectively and sustainably in competitive markets.</p>
                <div class="text-[#a67c5b] font-medium group-hover:translate-x-2 transition-transform duration-300 flex items-center">
                  <span>Learn our approach</span>
                  <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </div>
              </div>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-[#f8f5fc] rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 relative overflow-hidden group">
              <div class="absolute -right-16 -top-16 w-32 h-32 bg-[#c9b3e3] opacity-20 rounded-full group-hover:bg-[#5b4b8a] group-hover:opacity-30 transition-all duration-300"></div>
              <div class="relative">
                <div class="flex items-center justify-center mb-6 w-16 h-16 bg-[#e2d2f4] rounded-lg text-[#5b4b8a]">
                  <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                  </svg>
                </div>
                <h3 class="text-xl font-bold text-[#1e0933] mb-3">Process Integration</h3>
                <p class="text-[#2f1652] mb-5">Streamlining operations by connecting marketing, sales, and customer service into one cohesive system.</p>
                <div class="text-[#a67c5b] font-medium group-hover:translate-x-2 transition-transform duration-300 flex items-center">
                  <span>View our solutions</span>
                  <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </div>
              </div>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-[#f8f5fc] rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 relative overflow-hidden group">
              <div class="absolute -right-16 -top-16 w-32 h-32 bg-[#c9b3e3] opacity-20 rounded-full group-hover:bg-[#5b4b8a] group-hover:opacity-30 transition-all duration-300"></div>
              <div class="relative">
                <div class="flex items-center justify-center mb-6 w-16 h-16 bg-[#e2d2f4] rounded-lg text-[#5b4b8a]">
                  <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v2m10-2v2M7 20c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <h3 class="text-xl font-bold text-[#1e0933] mb-3">Business Networking</h3>
                <p class="text-[#2f1652] mb-5">Building valuable connections through our exclusive mastermind groups and industry partnerships.</p>
                <div class="text-[#a67c5b] font-medium group-hover:translate-x-2 transition-transform duration-300 flex items-center">
                  <span>Join our community</span>
                  <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Success Stories Section - Redesigned -->
    <section id="success-stories" class="bg-[#f8f5fc] py-20 relative overflow-hidden">
      <!-- Background elements -->
      <div class="absolute top-0 left-0 w-full h-20 bg-gradient-to-b from-white to-transparent"></div>
      <div class="absolute right-0 top-1/4 w-64 h-64 rounded-full bg-[#c9b3e3] opacity-10 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Case Studies</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">Transformational Success Stories</h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            Discover how our strategic approach has helped businesses achieve extraordinary growth and market dominance.
          </p>
        </div>
        
        <!-- Celsius Case Study -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
          <div class="grid grid-cols-1 lg:grid-cols-2">
            <!-- Left Image Side -->
            <div class="relative h-full min-h-[400px]">
              <div class="absolute inset-0 bg-[#1e0933] bg-opacity-40 z-10 flex items-center justify-center">
                <div class="text-center text-white p-8">
                  <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-white bg-opacity-20 backdrop-blur-sm mb-4">
                    <svg class="w-10 h-10 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.5 17.1132H10.0722C9.76695 17.1132 9.4733 16.9867 9.25906 16.7725C9.04483 16.5583 8.91833 16.2646 8.91833 15.9594V8.04064C8.91833 7.73536 9.04483 7.44171 9.25906 7.22748C9.4733 7.01324 9.76695 6.88674 10.0722 6.88674H13.9278C14.233 6.88674 14.5267 7.01324 14.7409 7.22748C14.9552 7.44171 15.0817 7.73536 15.0817 8.04064V15.9594C15.0817 16.2646 14.9552 16.5583 14.7409 16.7725C14.5267 16.9867 14.233 17.1132 13.9278 17.1132H12.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M14.5 10.5H9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M14.5 13.5H9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </div>
                  <h3 class="text-2xl font-bold mb-2">Celsius</h3>
                  <p class="text-white text-opacity-80">Beverage Industry Transformation</p>
                </div>
              </div>
              <img 
                src="/images/celsius-success-story.jpg" 
                alt="Celsius Success Story" 
                class="absolute inset-0 w-full h-full object-cover"
              >
            </div>
            
            <!-- Right Content Side -->
            <div class="p-8 lg:p-12 flex flex-col justify-center">
              <div class="mb-6">
                <div class="flex items-center mb-4">
                  <div class="text-4xl font-bold text-[#a67c5b]">$15B</div>
                  <div class="text-xl ml-3 text-[#1e0933]">Market Cap</div>
                </div>
                <div class="h-1 w-20 bg-[#c9b3e3]"></div>
              </div>
              
              <h3 class="text-2xl font-bold text-[#1e0933] mb-4">
                From Startup to Industry Leader
              </h3>
              
              <p class="text-[#2f1652] mb-6 leading-relaxed">
                Over a transformative 10-year partnership, we helped Celsius evolve from a market newcomer to a dominant force in the beverage industry. By securing strategic distribution through Pepsi and implementing innovative marketing approaches, we catalyzed exponential growth.
              </p>
              
              <!-- Key Results -->
              <div class="grid grid-cols-2 gap-4 mb-8">
                <div class="border border-[#e2d2f4] rounded-lg p-4">
                  <div class="text-2xl font-bold text-[#5b4b8a] mb-1">10</div>
                  <div class="text-sm text-[#2f1652]">Year Strategic Partnership</div>
                </div>
                <div class="border border-[#e2d2f4] rounded-lg p-4">
                  <div class="text-2xl font-bold text-[#5b4b8a] mb-1">Pepsi</div>
                  <div class="text-sm text-[#2f1652]">Distribution Network</div>
                </div>
              </div>
              
              <a href="#" class="inline-flex items-center text-[#a67c5b] font-medium hover:text-[#8e6849] transition-colors duration-200">
                Read the full case study
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section - Redesigned -->
    <section class="relative py-20 overflow-hidden">
      <!-- Background gradient -->
      <div class="absolute inset-0 bg-gradient-to-br from-[#1e0933] to-[#5b4b8a]"></div>
      <!-- Pattern overlay -->
      <div class="absolute inset-0 opacity-5">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <pattern id="dotGrid" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
              <circle cx="10" cy="10" r="1" fill="#fff" />
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#dotGrid)" />
        </svg>
      </div>
      
      <!-- Decorative elements -->
      <div class="absolute top-0 left-0 w-full h-4 bg-[#a67c5b]"></div>
      <div class="absolute -top-16 -right-16 w-64 h-64 bg-[#c9b3e3] rounded-full opacity-10 blur-3xl"></div>
      <div class="absolute -bottom-20 -left-20 w-72 h-72 bg-[#a67c5b] rounded-full opacity-10 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative">
        <div class="max-w-5xl mx-auto">
          <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-10 md:p-14 shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 items-center">
              <!-- Left content: 3 columns -->
              <div class="lg:col-span-3 space-y-8">
                <div>
                  <h2 class="text-3xl lg:text-4xl font-bold text-white leading-tight">
                    Ready to <span class="text-[#c9b3e3]">transform</span> your business operations?
                  </h2>
                  <div class="h-1 w-24 bg-[#a67c5b] mt-6"></div>
                </div>
                
                <p class="text-lg text-[#e2d2f4] leading-relaxed">
                  Our comprehensive CRM solution helps business owners streamline operations, increase revenue, and provide exceptional customer experiences—all from a single platform.
                </p>
                
                <!-- Feature pills -->
                <div class="flex flex-wrap gap-3">
                  <div class="bg-white/10 px-4 py-2 rounded-full text-sm text-white font-medium">
                    <span class="text-[#a67c5b] mr-1">✓</span> All-in-one solution
                  </div>
                  <div class="bg-white/10 px-4 py-2 rounded-full text-sm text-white font-medium">
                    <span class="text-[#a67c5b] mr-1">✓</span> One-time fee
                  </div>
                  <div class="bg-white/10 px-4 py-2 rounded-full text-sm text-white font-medium">
                    <span class="text-[#a67c5b] mr-1">✓</span> 24/7 support
                  </div>
                </div>
              </div>
              
              <!-- Right pricing panel: 2 columns -->
              <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-xl p-8">
                  <div class="text-center mb-6">
                    <h3 class="text-xl font-bold text-[#1e0933] mb-1">All In One Marketing CRM</h3>
                    <div class="flex items-center justify-center">
                      <span class="text-4xl font-bold text-[#a67c5b]">$97</span>
                      <span class="text-[#2f1652] ml-2">one-time payment</span>
                    </div>
                    <p class="text-[#5b4b8a] text-sm mt-2">Unlimited usage • No subscriptions</p>
                  </div>
                  
                  <ul class="space-y-3 mb-6">
                    <li class="flex items-start">
                      <svg class="w-5 h-5 text-[#5b4b8a] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      <span class="text-[#2f1652]">Replace dozens of separate tools</span>
                    </li>
                    <li class="flex items-start">
                      <svg class="w-5 h-5 text-[#5b4b8a] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      <span class="text-[#2f1652]">Save thousands per year</span>
                    </li>
                    <li class="flex items-start">
                      <svg class="w-5 h-5 text-[#5b4b8a] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      <span class="text-[#2f1652]">Lifetime access to updates</span>
                    </li>
                  </ul>
                  
                  <a 
                    href="/automate" 
                    class="block w-full py-3 px-4 bg-[#5b4b8a] hover:bg-[#4a3d73] text-white font-medium text-center rounded-lg transition-colors duration-200"
                  >
                    Start Now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Mission Section -->
    <section class="bg-white py-20 relative overflow-hidden">
      <!-- Decorative elements -->
      <div class="absolute left-0 top-0 w-64 h-64 bg-[#f8f5fc] rounded-full -translate-x-1/2 -translate-y-1/2"></div>
      <div class="absolute right-0 bottom-0 w-96 h-96 bg-[#f8f5fc] rounded-full translate-x-1/3 translate-y-1/3"></div>
      
      <div class="container mx-auto px-4 relative">
        <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left Content -->
            <div>
              <div class="inline-block mb-6">
                <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
                <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Our Purpose</span>
              </div>
              
              <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-8 leading-tight">
                Empowering entrepreneurs to achieve <span class="relative inline-block">
                  <span class="relative z-10">unprecedented growth</span>
                  <span class="absolute bottom-1 left-0 w-full h-3 bg-[#c9b3e3] opacity-30"></span>
                </span>
              </h2>
              
              <div class="space-y-6 text-lg text-[#2f1652] leading-relaxed">
                <p>
                  With over <strong>100 years of combined experience</strong> in the digital marketing space, we recognized a critical issue facing entrepreneurs: the overwhelming complexity of managing dozens of disparate tools to operate a business efficiently.
                </p>
                
                <p>
                  This insight led to the creation of the All In One Marketing Platform—a comprehensive solution that integrates what would otherwise require multiple expensive subscriptions and complex workflows.
                </p>
                
                <div class="pt-6">
                  <div class="flex items-center gap-4 border-l-4 border-[#5b4b8a] pl-6">
                    <div class="text-4xl font-bold text-[#a67c5b]">1000s</div>
                    <p class="text-[#2f1652]">of business owners helped to increase revenue while reducing operational costs</p>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Right Content -->
            <div>
              <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                <!-- Image overlay for brand color -->
                <div class="absolute inset-0 bg-gradient-to-tr from-[#1e0933]/40 via-transparent to-[#5b4b8a]/20 z-10"></div>
                
                <!-- Mission Statement Card -->
                <div class="absolute bottom-0 right-0 m-8 bg-white/95 backdrop-blur-sm rounded-xl p-8 shadow-lg max-w-sm z-20">
                  <div class="flex items-center mb-4">
                    <div class="w-12 h-12 rounded-full bg-[#e2d2f4] flex items-center justify-center mr-4">
                      <svg class="w-6 h-6 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                      </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#1e0933]">Our Mission</h3>
                  </div>
                  <p class="text-[#2f1652] italic">
                    "To provide entrepreneurs and business owners with powerful, integrated tools that simplify operations, enhance customer relationships, and drive sustainable growth."
                  </p>
                </div>
                
                <!-- Main image -->
                <img 
                  src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" 
                  alt="Team collaboration" 
                  class="w-full h-[500px] object-cover"
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Value Proposition Section - Redesigned -->
    <section class="bg-gradient-to-br from-[#1e0933] to-[#2f1652] py-24 relative overflow-hidden">
      <!-- Background pattern -->
      <div class="absolute inset-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
          <pattern id="diagonal-lines" width="40" height="40" patternUnits="userSpaceOnUse" patternTransform="rotate(45)">
            <line x1="0" y1="20" x2="40" y2="20" stroke="#ffffff" stroke-width="1"/>
          </pattern>
          <rect width="100%" height="100%" fill="url(#diagonal-lines)" />
        </svg>
      </div>
      
      <!-- Decorative elements -->
      <div class="absolute top-10 right-10 w-64 h-64 rounded-full bg-[#5b4b8a] opacity-20 blur-3xl"></div>
      <div class="absolute bottom-10 left-10 w-80 h-80 rounded-full bg-[#a67c5b] opacity-20 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-5xl mx-auto">
          <div class="text-center mb-16">
            <div class="inline-block mb-4">
              <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
              <span class="text-[#c9b3e3] uppercase font-bold tracking-wider text-sm">Platform Integration</span>
              <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
            </div>
            
            <h2 class="text-3xl lg:text-5xl font-bold mb-8 text-white">
              Unparalleled<span class="text-[#c9b3e3]"> Business Optimization</span>
            </h2>
            
            <p class="text-lg text-[#e2d2f4] max-w-3xl mx-auto mb-12">
              Our integrated CRM and marketing automation tools work seamlessly together to create a powerful ecosystem that drives revenue growth and operational efficiency.
            </p>
          </div>
          
          <!-- Feature Cards -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Card 1 -->
            <div class="bg-white bg-opacity-5 backdrop-blur-sm rounded-xl p-8 border border-white border-opacity-10 hover:bg-opacity-10 transition-all duration-300 group">
              <div class="flex items-center justify-center w-14 h-14 bg-[#a67c5b] bg-opacity-20 rounded-lg mb-6 group-hover:bg-opacity-30 transition-all duration-300">
                <svg class="w-7 h-7 text-[#c9b3e3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-white mb-3">System Integration</h3>
              <p class="text-[#e2d2f4] font-light">Connect customer data, marketing campaigns, and sales processes in one cohesive system.</p>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white bg-opacity-5 backdrop-blur-sm rounded-xl p-8 border border-white border-opacity-10 hover:bg-opacity-10 transition-all duration-300 group">
              <div class="flex items-center justify-center w-14 h-14 bg-[#a67c5b] bg-opacity-20 rounded-lg mb-6 group-hover:bg-opacity-30 transition-all duration-300">
                <svg class="w-7 h-7 text-[#c9b3e3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-white mb-3">Revenue Growth</h3>
              <p class="text-[#e2d2f4] font-light">Enhanced conversion rates through automated follow-ups and personalized customer journeys.</p>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-white bg-opacity-5 backdrop-blur-sm rounded-xl p-8 border border-white border-opacity-10 hover:bg-opacity-10 transition-all duration-300 group">
              <div class="flex items-center justify-center w-14 h-14 bg-[#a67c5b] bg-opacity-20 rounded-lg mb-6 group-hover:bg-opacity-30 transition-all duration-300">
                <svg class="w-7 h-7 text-[#c9b3e3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-white mb-3">Cost Efficiency</h3>
              <p class="text-[#e2d2f4] font-light">Eliminate the need for multiple subscriptions while gaining more functionality and control.</p>
            </div>
          </div>
          
          <!-- CTA Button -->
          <div class="text-center">
            <a 
              href="/automate" 
              class="inline-flex items-center px-8 py-4 bg-[#a67c5b] hover:bg-[#8e6849] text-white font-medium text-lg rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl"
            >
              Explore Our Complete Solution
              <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
            <p class="text-[#c9b3e3] mt-4">One-time fee of $97 • No monthly subscriptions</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Growth Section -->
    <section class="py-20 bg-[#c9b3e3] relative overflow-hidden">
      <!-- Decorative background elements -->
      <div class="absolute top-0 left-0 w-full h-16 bg-gradient-to-b from-white to-transparent"></div>
      <div class="absolute -top-40 -right-40 w-[400px] h-[400px] rounded-full bg-[#e2d2f4] opacity-50 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Client Success</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            Transforming Businesses <span class="text-[#a67c5b]">At Scale</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            Our comprehensive approach has helped companies of all sizes streamline operations, increase revenue, and grow their customer base.
          </p>
        </div>
      
        <!-- Results Metrics Row -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
          <!-- Metric 1 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="bg-[#1e0933] py-6 px-8 text-center">
              <span class="text-4xl font-bold text-white">100+</span>
            </div>
            <div class="p-6 text-center">
              <h3 class="text-lg font-bold text-[#1e0933] mb-2">Years Combined Experience</h3>
              <p class="text-[#5b4b8a] text-sm">Digital marketing expertise</p>
            </div>
          </div>
          
          <!-- Metric 2 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="bg-[#5b4b8a] py-6 px-8 text-center">
              <span class="text-4xl font-bold text-white">1000s</span>
            </div>
            <div class="p-6 text-center">
              <h3 class="text-lg font-bold text-[#1e0933] mb-2">Client Businesses</h3>
              <p class="text-[#5b4b8a] text-sm">Successfully transformed</p>
            </div>
          </div>
          
          <!-- Metric 3 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="bg-[#a67c5b] py-6 px-8 text-center">
              <span class="text-4xl font-bold text-white">30+</span>
            </div>
            <div class="p-6 text-center">
              <h3 class="text-lg font-bold text-[#1e0933] mb-2">Tools Integrated</h3>
              <p class="text-[#5b4b8a] text-sm">Into one seamless platform</p>
            </div>
          </div>
          
          <!-- Metric 4 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="bg-[#e2d2f4] py-6 px-8 text-center">
              <span class="text-4xl font-bold text-[#1e0933]">24/7</span>
            </div>
            <div class="p-6 text-center">
              <h3 class="text-lg font-bold text-[#1e0933] mb-2">Support Access</h3>
              <p class="text-[#5b4b8a] text-sm">Whenever you need assistance</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Support Features Section - Redesigned -->
    <section class="py-20 bg-[#e2d2f4] relative overflow-hidden">
      <!-- Decorative background elements -->
      <div class="absolute top-0 left-0 w-full h-12 bg-gradient-to-b from-[#c9b3e3] to-transparent"></div>
      <div class="absolute bottom-0 right-0 w-full h-12 bg-gradient-to-t from-white to-transparent"></div>
      <div class="absolute -bottom-40 -left-40 w-[400px] h-[400px] rounded-full bg-[#c9b3e3] opacity-50 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <div class="inline-block mb-4">
            <div class="h-1 w-12 bg-[#a67c5b] inline-block mr-2"></div>
            <span class="text-[#5b4b8a] uppercase font-bold tracking-wider text-sm">Client Support</span>
            <div class="h-1 w-12 bg-[#a67c5b] inline-block ml-2"></div>
          </div>
          
          <h2 class="text-3xl lg:text-4xl font-bold text-[#1e0933] mb-4">
            Comprehensive <span class="text-[#a67c5b]">Support Network</span>
          </h2>
          <p class="text-lg text-[#2f1652] max-w-3xl mx-auto">
            When you join All In One Marketing, you gain access to expert support and a community of like-minded business owners.
          </p>
        </div>
      
        <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Left Side: Main Support Feature -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
              <div class="p-10">
                <div class="flex items-center mb-8">
                  <div class="w-16 h-16 rounded-full bg-[#c9b3e3] flex items-center justify-center mr-6">
                    <svg class="w-8 h-8 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                  </div>
                  <div>
                    <h3 class="text-2xl font-bold text-[#1e0933]">24/7 Technical Support</h3>
                    <p class="text-[#5b4b8a]">Assistance whenever you need it</p>
                  </div>
                </div>
                
                <p class="text-[#2f1652] leading-relaxed mb-8">
                  Our dedicated support team is available around the clock to help you navigate the platform, troubleshoot any issues, and optimize your marketing strategy for maximum results.
                </p>
                
                <!-- Support Features -->
                <div class="space-y-5">
                  <div class="flex items-start">
                    <div class="bg-[#f8f5fc] rounded-lg p-2 mr-4">
                      <svg class="w-5 h-5 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                      </svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-[#1e0933] mb-1">Live Chat Support</h4>
                      <p class="text-sm text-[#2f1652]">Get instant answers to your questions through our real-time chat system.</p>
                    </div>
                  </div>
                  
                  <div class="flex items-start">
                    <div class="bg-[#f8f5fc] rounded-lg p-2 mr-4">
                      <svg class="w-5 h-5 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                      </svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-[#1e0933] mb-1">Email Support</h4>
                      <p class="text-sm text-[#2f1652]">Submit detailed inquiries and receive comprehensive responses within hours.</p>
                    </div>
                  </div>
                  
                  <div class="flex items-start">
                    <div class="bg-[#f8f5fc] rounded-lg p-2 mr-4">
                      <svg class="w-5 h-5 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                      </svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-[#1e0933] mb-1">Knowledge Base</h4>
                      <p class="text-sm text-[#2f1652]">Access our extensive library of guides, tutorials, and best practices.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Right Side: Business Network -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
              <div class="p-10">
                <div class="flex items-center mb-8">
                  <div class="w-16 h-16 rounded-full bg-[#c9b3e3] flex items-center justify-center mr-6">
                    <svg class="w-8 h-8 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v2m10-2v2M7 20c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                  </div>
                  <div>
                    <h3 class="text-2xl font-bold text-[#1e0933]">Business Owner Community</h3>
                    <p class="text-[#5b4b8a]">Connect with like-minded entrepreneurs</p>
                  </div>
                </div>
                
                <p class="text-[#2f1652] leading-relaxed mb-8">
                  Join our exclusive network of successful business owners to share insights, strategies, and form valuable connections that can accelerate your growth and open new opportunities.
                </p>
                
                <!-- Community Features -->
                <div class="space-y-5">
                  <div class="flex items-start">
                    <div class="bg-[#f8f5fc] rounded-lg p-2 mr-4">
                      <svg class="w-5 h-5 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                      </svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-[#1e0933] mb-1">Mastermind Events</h4>
                      <p class="text-sm text-[#2f1652]">Regular virtual and in-person gatherings with high-achieving entrepreneurs.</p>
                    </div>
                  </div>
                  
                  <div class="flex items-start">
                    <div class="bg-[#f8f5fc] rounded-lg p-2 mr-4">
                      <svg class="w-5 h-5 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                      </svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-[#1e0933] mb-1">Private Forum</h4>
                      <p class="text-sm text-[#2f1652]">Exclusive online community for sharing ideas and asking questions.</p>
                    </div>
                  </div>
                  
                  <div class="flex items-start">
                    <div class="bg-[#f8f5fc] rounded-lg p-2 mr-4">
                      <svg class="w-5 h-5 text-[#5b4b8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                      </svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-[#1e0933] mb-1">Strategy Workshops</h4>
                      <p class="text-sm text-[#2f1652]">Regular training sessions focused on business growth and marketing tactics.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Final CTA Section - Redesigned -->
    <section class="relative py-20 overflow-hidden">
      <!-- Background gradient -->
      <div class="absolute inset-0 bg-gradient-to-br from-[#a67c5b] to-[#8e6849]"></div>
      
      <!-- Decorative elements -->
      <div class="absolute top-0 left-0 w-full h-2 bg-[#5b4b8a]"></div>
      <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-[#5b4b8a] opacity-10 blur-3xl"></div>
      <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-[#1e0933] opacity-10 blur-3xl"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-5xl mx-auto text-center">
          <h2 class="text-3xl lg:text-5xl font-bold text-white mb-6 leading-tight">
            Transform Your Business with <span class="text-[#e2d2f4]">All-In-One Marketing</span>
          </h2>
          
          <p class="text-xl text-[#e2d2f4] max-w-3xl mx-auto mb-12">
            Join thousands of successful entrepreneurs who have revolutionized their operations, enhanced customer relationships, and increased revenue.
          </p>
          
          <!-- Value Pills -->
          <div class="flex flex-wrap justify-center gap-4 mb-12">
            <div class="bg-white bg-opacity-10 backdrop-blur-sm px-6 py-3 rounded-full">
              <div class="flex items-center">
                <svg class="w-5 h-5 text-[#e2d2f4] mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-white font-medium">30+ Tools in One Platform</span>
              </div>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-sm px-6 py-3 rounded-full">
              <div class="flex items-center">
                <svg class="w-5 h-5 text-[#e2d2f4] mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-white font-medium">One-Time Payment</span>
              </div>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-sm px-6 py-3 rounded-full">
              <div class="flex items-center">
                <svg class="w-5 h-5 text-[#e2d2f4] mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-white font-medium">24/7 Premium Support</span>
              </div>
            </div>
          </div>
          
          <!-- CTA Button -->
          <div class="inline-block">
            <div class="group relative">
              <div class="absolute -inset-0.5 bg-gradient-to-r from-[#c9b3e3] to-[#5b4b8a] rounded-lg blur opacity-50 group-hover:opacity-100 transition duration-300"></div>
              <a 
                href="/automate" 
                class="relative flex items-center justify-center px-8 py-4 bg-white hover:bg-[#f8f5fc] text-[#1e0933] font-bold text-lg rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl"
              >
                Get Started for Just $97
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </a>
            </div>
            <p class="text-[#e2d2f4] text-sm mt-4">One-time fee • No monthly subscriptions • Lifetime access</p>
          </div>
        </div>
      </div>
    </section>
  </MarketingLayout>
</template>

<style scoped>
/* Custom styles if needed */
</style>