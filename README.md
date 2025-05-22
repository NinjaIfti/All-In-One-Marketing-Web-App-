# PB&J Solutions Web App

## Project Overview
This project is a modern web application built with Laravel, Inertia.js, and Vue.js. It replicates the functionality and design of allinonemarketing.com, providing an all-in-one marketing solution with CRM capabilities, email automation, landing pages, and more.

## Architecture & Technology Stack
- **Backend**: Laravel 12.x
- **Frontend**: Vue.js 3.x with Composition API
- **Routing**: Inertia.js (Server-side routing with client-side rendering)
- **CSS Framework**: Tailwind CSS
- **State Management**: Vue's Composition API with Pinia (optional)
- **Asset Bundling**: Vite

## Directory Structure Standards

### Main Application Structure
```
all-in-one-marketing/
├── app/                       # Laravel backend code
│   ├── Http/
│   │   ├── Controllers/       # API and web controllers
│   │   │   ├── Admin/         # Admin panel controllers
│   │   │   ├── Api/           # API controllers
│   │   │   └── Marketing/     # Marketing page controllers
│   │   └── Middleware/        # Custom middleware
│   ├── Models/                # Eloquent models
│   ├── Services/              # Business logic services
│   └── Providers/             # Service providers
├── config/                    # Application configuration
├── database/                  # Migrations, factories, seeders
├── public/                    # Publicly accessible assets
├── resources/                 # Frontend assets
│   ├── css/                   # Global CSS files
│   ├── js/                    # JavaScript/Vue files
│   │   ├── Components/        # Reusable Vue components
│   │   │   ├── Common/        # Common UI components
│   │   │   ├── Dashboard/     # Dashboard UI components
│   │   │   ├── Forms/         # Form components
│   │   │   └── Marketing/     # Marketing site components
│   │   ├── Layouts/           # Page layouts
│   │   │   ├── AdminLayout.vue       # Admin dashboard layout
│   │   │   └── MarketingLayout.vue   # Public marketing site layout
│   │   ├── Pages/             # Inertia page components
│   │   │   ├── Admin/         # Admin pages
│   │   │   ├── Auth/          # Authentication pages
│   │   │   └── Marketing/     # Public marketing pages
│   │   ├── Composables/       # Vue composables (shared logic)
│   │   └── Utils/             # Utility functions
│   └── views/                 # Blade templates (minimal use)
│       └── app.blade.php      # Main app template for Inertia
├── routes/                    # Application routes
│   ├── api.php                # API routes
│   ├── channels.php           # Broadcasting channels
│   ├── console.php            # Console routes
│   └── web.php                # Web routes
└── tests/                     # Automated tests
```

### Vue Component Organization

#### Page Components (`resources/js/Pages/`)
Each page component should:
- Be in a subdirectory corresponding to its section
- Use PascalCase naming
- Have a clear purpose (one page = one component)

Example:
```
resources/js/Pages/Marketing/Home.vue     # Homepage
resources/js/Pages/Admin/Dashboard.vue    # Admin dashboard
resources/js/Pages/Auth/Login.vue         # Login page
```

#### Reusable Components (`resources/js/Components/`)
Reusable components should:
- Be grouped by function/purpose
- Use PascalCase naming
- Be focused on a single responsibility

Example:
```
resources/js/Components/Forms/TextInput.vue
resources/js/Components/Marketing/FeatureCard.vue
resources/js/Components/Dashboard/MetricsWidget.vue
```

### Laravel Controllers Organization

Controllers should:
- Be grouped by function/purpose
- Follow PSR-4 naming conventions
- Use RESTful methods when appropriate

Example:
```
app/Http/Controllers/Marketing/HomeController.php
app/Http/Controllers/Admin/UserController.php
app/Http/Controllers/Api/LeadController.php
```

## Naming Conventions

### Files and Directories
- **Vue Components**: PascalCase (e.g., `LeadForm.vue`, `PricingTable.vue`)
- **Composables**: camelCase, prefixed with "use" (e.g., `useAuth.js`, `useNotification.js`)
- **Utility Functions**: camelCase (e.g., `formatDate.js`, `validateEmail.js`)
- **Laravel Controllers**: PascalCase, suffixed with "Controller" (e.g., `HomeController.php`)
- **Laravel Models**: PascalCase, singular (e.g., `User.php`, `Contact.php`)
- **Laravel Migrations**: snake_case with timestamp prefix (e.g., `2023_06_01_create_contacts_table.php`)

### CSS Classes
- Use kebab-case for CSS classes (e.g., `feature-card`, `nav-item`)
- Follow a BEM-like naming convention:
  - Block: `card`
  - Element: `card__title`
  - Modifier: `card--featured`

## Code Style Guidelines

### Vue Components
- Use Composition API with `<script setup>` syntax
- Organize component sections in this order:
  1. Script setup (imports, props, emits, variables, computed, methods)
  2. Template
  3. Style (if needed)
- Use props validation
- Use clear, descriptive variable and function names
- Add comments for complex logic

Example:
```vue
<script setup>
import { ref, computed, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import LeadForm from '@/Components/Forms/LeadForm.vue';

// Props definition
const props = defineProps({
  testimonials: {
    type: Array,
    required: true
  }
});

// State
const isLoading = ref(false);

// Computed properties
const featuredTestimonials = computed(() => {
  return props.testimonials.filter(item => item.featured);
});

// Methods
const handleSubmit = () => {
  // Implementation
};

// Lifecycle hooks
onMounted(() => {
  // Implementation
});
</script>

<template>
  <Head title="All-In-One Marketing - Home" />
  
  <MarketingLayout>
    <!-- Component template -->
    <section class="hero-section">
      <!-- Content -->
    </section>
    
    <LeadForm @submitted="handleSubmit" />
  </MarketingLayout>
</template>
```

### Laravel Controllers
- Use type hints for method parameters and return types
- Use dependency injection
- Keep controllers thin, move business logic to services
- Use resource controllers for CRUD operations

Example:
```php
namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Services\LeadService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeadController extends Controller
{
    protected $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $lead = $this->leadService->createLead($validated);

        return redirect()->back()->with('success', 'Thank you for your submission!');
    }
}
```

## State Management
- For simple state, use Vue's Composition API with `ref` and `reactive`
- For global state, use Pinia stores
- For form handling, use Inertia's built-in form helpers

Example Pinia store:
```js
// stores/useAuthStore.js
import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useAuthStore = defineStore('auth', () => {
  const user = ref(null);
  const isAuthenticated = computed(() => !!user.value);

  function setUser(userData) {
    user.value = userData;
  }

  function logout() {
    user.value = null;
  }

  return {
    user,
    isAuthenticated,
    setUser,
    logout
  };
});
```

## API Communication
- Use Inertia.js for most page-to-server communication
- For additional AJAX requests, use Axios
- Structure API endpoints consistently in `routes/api.php`
- Use API resources for JSON responses

## Form Handling
- Use Inertia's form helpers for form submissions
- Validate forms both on client and server side
- Use Laravel's form request classes for complex validation

Example:
```vue
<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
  email: '',
  phone: ''
});

const submit = () => {
  form.post(route('leads.store'));
};
</script>

<template>
  <form @submit.prevent="submit">
    <!-- Form fields -->
    <div>
      <label for="name">Name</label>
      <input id="name" v-model="form.name" type="text" />
      <div v-if="form.errors.name" class="error">{{ form.errors.name }}</div>
    </div>
    
    <!-- More fields -->
    
    <button type="submit" :disabled="form.processing">Submit</button>
  </form>
</template>
```

## Error Handling
- Use try/catch blocks for error handling in JavaScript
- Use Laravel's exception handler for backend errors
- Display user-friendly error messages
- Log errors appropriately

## Testing Standards
- Write tests for critical functionality
- Use Laravel's testing tools for backend tests
- Use Vue Test Utils for component tests
- Follow AAA pattern (Arrange, Act, Assert)

## Performance Considerations
- Lazy load components when appropriate
- Use pagination for large datasets
- Optimize images and assets
- Use caching where appropriate

## Security Best Practices
- Validate all input data
- Use Laravel's CSRF protection
- Implement proper authorization checks
- Sanitize output to prevent XSS
- Use HTTPS
- Follow Laravel's security best practices

## Deployment Process
- Build assets for production:
  ```bash
  npm run build
  ```
- Use Laravel's deployment tools or CI/CD pipelines
- Run database migrations
- Clear caches
- Check for errors in production logs

## Development Workflow
1. Pull the latest changes from the repository
2. Install dependencies if needed
3. Run migrations if DB schema changed
4. Start the development server:
   ```bash
   php artisan serve
   ```
5. Start the Vite development server:
   ```bash
   npm run dev
   ```
6. Access the application at http://localhost:8000

## Git Workflow
- Use feature branches for new features
- Use pull requests for code reviews
- Write descriptive commit messages
- Follow conventional commits format:
  ```
  feat: add lead capture form
  fix: correct validation error in contact form
  docs: update README with new setup instructions
  ```

By following these standards, we ensure a consistent, maintainable, and high-quality codebase that can be easily understood and extended by all team members.